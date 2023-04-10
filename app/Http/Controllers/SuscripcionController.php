<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suscripcion;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Pedido;


class SuscripcionController extends Controller
{
    //metodo que responde al formulario de suscripcion, donde se recibenlos siguientes datos: 'tipo', 'precio', 'user_id', 'direccion_de_entrega', 'telefono', 'cantidad_de_canastas', 'fecha_de_inicio', 'fecha_de_renovacion', 'cantidad_de_quesos', 'dia_de_entrega', 'activo'.
    public function suscribirse(Request $request)
    {

        //return $request->all();

        //validacion de los datos
        $request->validate([
            'tipo' => 'required',
            //'precio' => 'nullable',
            //'user_id' => 'nullable',
            'nombre' => 'nullable',
            //'correo' => 'nullable',
            'email' => 'nullable|email|unique:users',
            'password' => 'nullable',
            'direccion_de_entrega' => 'required',
            'telefono' => 'required',
            'fecha_de_nacimiento' => 'nullable',
            'ingredientes_que_no_consumo' => 'nullable',
            'cantidad_de_quesos' => 'required',
            'dia_de_entrega' => 'required',
            //'cantidad_de_canastas' => 'nullable',
            //'fecha_de_inicio' => 'nullable',
            //'fecha_de_renovacion' => 'nullable',
            //'activo' => 'nullable',
        ]);

        //return $request->all();
        
        $suscripcion = new Suscripcion();
        $suscripcion->tipo = $request->tipo;
        
        //se calcula el precio de la suscripcion, segun la cantidad de quesos y el tipo de suscripcion
        $suscripcion->precio = $this->calcularPrecio($request->cantidad_de_quesos, $request->tipo);

        //consulta si hay un usuario logueado, si no hay, se crea un usuario
        if (auth()->user()) {
            $suscripcion->user_id = auth()->user()->id;

            //asigna el rol de suscriptor al usuario
            $user = User::find(auth()->user()->id);
            //si el usuario tiene el rol de administrador, no se le cambia el rol
            if ($user->rol != 'administrador') {
                $user->rol = 'suscriptor';
            }
            $user->save();

        } else {
            $user = new User();
            $user->name = $request->nombre;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->rol = 'suscriptor';
            $user->save();

            //envia el correo de confirmacion de registro
            $user->sendEmailVerificationNotification();

            $suscripcion->user_id = $user->id;
        }


        //si el user no tiene definida una fecha_de_nacimiento, se le asigna la fecha quellega en la request
        if (auth()->user()) {
            if (auth()->user()->fecha_de_nacimiento == null) {
                $user = User::find(auth()->user()->id);
                $user->fecha_de_nacimiento = $request->fecha_de_nacimiento;
                $user->save();
            }
        } else {
            $user = User::find($user->id);
            $user->fecha_de_nacimiento = $request->fecha_de_nacimiento;
            $user->save();
        }

        
        $suscripcion->direccion_de_entrega = $request->direccion_de_entrega;
        $suscripcion->telefono = $request->telefono;
        //si llega un valor de ingredientes_que_no_consumo, se asigna al usuario
        if ($request->ingredientes_que_no_consumo) {
            $user->ingredientes_que_no_consumo = $request->ingredientes_que_no_consumo;
        }

        //la cantidad de canastas se define por el tipo de suscripcion
        //$suscripcion->cantidad_de_canastas = 12;  
        if ($request->tipo == 'Un mes') {
            $suscripcion->cantidad_de_canastas = 1;
        } elseif ($request->tipo == 'Tres meses') {
            $suscripcion->cantidad_de_canastas = 3;
        } elseif ($request->tipo == 'Seis meses') {
            $suscripcion->cantidad_de_canastas = 6;
        } elseif ($request->tipo == 'Doce meses') {
            $suscripcion->cantidad_de_canastas = 12;
        }

        //la fecha de inicio es la fecha actual
        $suscripcion->fecha_de_inicio = now();
        //$suscripcion->fecha_de_renovacion = $request->fecha_de_renovacion;
        $suscripcion->cantidad_de_quesos = $request->cantidad_de_quesos;
        $suscripcion->dia_de_entrega = $request->dia_de_entrega;
        //$suscripcion->activo = $request->activo;
        $suscripcion->save();
        $user->save();

        //creamos el pedido
        $pedido = $this->crearPedido($suscripcion->id);

        //TODO: enviar un email al cliente y a pedro con el pedido


        //emite una notificacion flash
        session()->flash('exito', 'La suscripción se realizó con éxito');

        return redirect()->route('club_macanudo');
    }






    //metodo que crea un pedido con los datos del usuario y de la suscripcion
    public function crearPedido($id)
    {
        $suscripcion = Suscripcion::find($id);
        $user = User::find($suscripcion->user_id);

        $pedido = new Pedido();
        $pedido->status = 'pedido';
        $pedido->tipo = 'club del queso';
        $pedido->user_id = $user->id;
        $pedido->suscripcion_id = $suscripcion->id;

        $pedido->nombre = $user->name;
        $pedido->email = $user->email;
        $pedido->direccion = $suscripcion->direccion_de_entrega;
        $pedido->telefono = $suscripcion->telefono;
        
        $pedido->medio_de_pago = 'pagar al recibir';
        $pedido->estado_del_pago = 'pendiente';
        $pedido->monto = $suscripcion->precio;
        //$pedido->canasta_id = 11; //TODO: resolver como se le asigna la canasta al pedido
        $pedido->save();

        return $pedido;
        
    }



    //metodo que calcula el precio de la suscripcion, segun la cantidad de quesos y el tipo de suscripcion. el metodo posee dos variables, una variable define el precio unitario del queso, y otra variable define el descuento que se le hace al precio unitario del queso, segun el tipo de suscripcion
    public function calcularPrecio($cantidad_de_quesos, $tipo)
    {
        $precio_unitario = 380;
        $descuento_por_tres_quesos = 0.85; // 15% de descuento
        $descuento_por_cinco_quesos = 0.82; // 18% de descuento


        if ($cantidad_de_quesos == 3) {
            $descuento = $descuento_por_tres_quesos;
        } elseif ($cantidad_de_quesos == 5) {
            $descuento = $descuento_por_cinco_quesos;
        }

        $precio = $cantidad_de_quesos * $precio_unitario * $descuento;

        if ($tipo == 'Un mes') {
            $precio = $precio * 1;
        } elseif ($tipo == 'Tres meses') {
            $precio = $precio * 3;
        } elseif ($tipo == 'Seis meses') {
            $precio = $precio * 6;
        } elseif ($tipo == 'Doce meses') {
            $precio = $precio * 12;
        }

        return $precio;
    }


}
