<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suscripcion;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Pedido;
use Illuminate\Support\Facades\Mail;
use App\Mail\GraciasPorSuscribirte;
use App\Mail\FormularioDelClubMacanudo;
use App\Notifications\SuscripcionNotification;
use App\Mail\EmailDeControl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class SuscripcionController extends Controller
{
    
    
    
    
    
    
    //metodo que responde al formulario de suscripcion, donde se recibenlos siguientes datos: 'tipo', 'precio', 'user_id', 'direccion_de_entrega', 'telefono', 'cantidad_de_canastas', 'fecha_de_inicio', 'fecha_de_renovacion', 'cantidad_de_quesos', 'dia_de_entrega', 'activo'.
    public function suscribirse(Request $request)
    {
        
        //return $request->all(); // ->merge(['clave' => 'valor']);
        if (env('APP_ENV') == 'production') {
            // se preparan las variables para el email de control
            $request_para_el_email_de_control = $request->except(['_token', 'password', 'password_confirmacion', '_method', 'terminos_y_condiciones_del_club']);
            $request_para_el_email_de_control['APP_ENV'] = env('APP_ENV');
            $request_para_el_email_de_control['instancia_del_email'] = 'previo a la validacion de los datos';
            $request_para_el_email_de_control['coincidencia_de_passwords'] = $request->password == $request->password_confirmacion ? 'si' : 'no';
            //envia un email al administrador con los datos del formulario
            Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl(  $request_para_el_email_de_control  ));
        }

        //validacion de los datos
        $request->validate([
            //'tipo' => 'required',
            //'precio' => 'nullable',
            //'user_id' => 'nullable',
            'nombre' => 'required',
            //'correo' => 'nullable',
            'email' => 'required|email|has_no_subscription',
            'password' => 'required|same:password_confirmacion',
            'direccion_de_entrega' => 'required',
            'telefono' => 'required|min:8',
            'fecha_de_nacimiento' => 'nullable',
            'ingredientes_que_no_consumo' => 'nullable',
            'cantidad_de_quesos' => 'required',
            'dia_de_entrega' => 'required',
            //'cantidad_de_canastas' => 'nullable',
            //'fecha_de_inicio' => 'nullable',
            //'fecha_de_renovacion' => 'nullable',
            //'activo' => 'nullable',
        ], [
            'email.has_no_subscription' => 'Solo se permite una suscripción activa por usuario. En caso de querer suscribirse a una segunda canasta o de querer comprar puntualmente una canasta adicional, deberá comunicarse al teléfono de contacto',
            'password.same' => 'El campo contraseña y el campo confirmación de contraseña deben coincidir',
        ]);

        // TODO: validar que el usuario solo tenga una suscripcion activa

        // si el entorno es de produccion, se envia un email al usuario con los datos del formulario
        if (env('APP_ENV') == 'production') { // env('APP_ENV') == 'local'
            $request_para_el_email_de_control['instancia_del_email'] = 'posterior a la validacion de los datos';
            Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($request_para_el_email_de_control));
        }
        
        //return $request->all();

        $suscripcion = new Suscripcion();
        //$suscripcion->tipo = $request->tipo;
        $suscripcion->tipo = 'ilimitada';
        
        //se calcula el precio de la suscripcion, segun la cantidad de quesos y el tipo de suscripcion
        //$suscripcion->precio = $this->calcularPrecio($request->cantidad_de_quesos, $request->tipo);
        $suscripcion->precio = $this->calcularPrecio($request->cantidad_de_quesos, 'Un mes');

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

            
            if(User::where('email', $request->email)->first()){
                
                $credentials = $request->only('email', 'password');

                if (Auth::attempt($credentials)) {
                    // Las credenciales son válidas
                    // Iniciar sesión y crear una sesión para el usuario
                    $user = Auth::user();
                    Auth::login($user);
                    // Redirigir al usuario a la página deseada
                } else {
                    // Las credenciales no son válidas
                    // Mostrar un mensaje de error
                    return redirect()->route('club_macanudo')->withErrors('El correo y la contraseña no coinciden')->withInput();

                    //emite una notificacion flash
                    //session()->flash('error', 'El cooreo y la contraseña no coinciden');
                    //return redirect()->route('club_macanudo');
                }
                
            }else{

                $user = new User();
                $user->name = $request->nombre;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->rol = 'suscriptor';
                $user->save();
                
                //envia el correo de confirmacion de registro
                $user->sendEmailVerificationNotification();
                
            }

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
        /*if ($request->tipo == 'Un mes') {
            $suscripcion->cantidad_de_canastas = 1;
        } elseif ($request->tipo == 'Tres meses') {
            $suscripcion->cantidad_de_canastas = 3;
        } elseif ($request->tipo == 'Seis meses') {
            $suscripcion->cantidad_de_canastas = 6;
        } elseif ($request->tipo == 'Doce meses') {
            $suscripcion->cantidad_de_canastas = 12;
        }*/

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


        //enviar un email a Pedro
        Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->cc(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))
            ->queue(new FormularioDelClubMacanudo($suscripcion));

        // envia una a la cuenta de registros una copia del email que se envió al usuario
        Notification::route('mail', env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))->notify(new SuscripcionNotification($suscripcion));

        //enviar un email al cliente
        /*Mail::to($user->email)->cc(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))
            ->queue(new GraciasPorSuscribirte($suscripcion));*/
            /*$data = [
                'user' => $user,
                'suscripcion' => $suscripcion,
                'pedido' => $pedido,
            ];*/
        $user->notify(new SuscripcionNotification($suscripcion));



        //emite una notificacion flash
        session()->flash('exito', 'La suscripción se realizó con éxito');

        return redirect()->route('club_macanudo');
    }
    // *********************************************************************************************************************










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
        //$pedido->monto = $suscripcion->precio;
        //el monto del pedido se calcula segun la cantidad de quesos, el precio unitario del queso y el desacuento que se le hace al precio unitario del queso, segun el tipo de suscripcion
        $pedido->monto = $this->calcularPrecio($suscripcion->cantidad_de_quesos, 'Un mes');


        //$pedido->canasta_id = 11; //TODO: resolver como se le asigna la canasta al pedido
        $pedido->save();

        return $pedido;
        
    }
    // *********************************************************************************************************************











    //metodo que calcula el precio de la suscripcion, segun la cantidad de quesos y el tipo de suscripcion. el metodo posee dos variables, una variable define el precio unitario del queso, y otra variable define el descuento que se le hace al precio unitario del queso, segun el tipo de suscripcion
    public function calcularPrecio($cantidad_de_quesos, $tipo)
    {
        $precio_unitario = 380;
        $descuento_por_tres_quesos = 0.85; // 15% de descuento
        $descuento_por_cinco_quesos = 0.82; // 18% de descuento


        if ($cantidad_de_quesos == 3) {
            //$precio = $cantidad_de_quesos * $precio_unitario * $descuento_por_tres_quesos;
            $precio = 969;
        } elseif ($cantidad_de_quesos == 5) {
            //$precio = $cantidad_de_quesos * $precio_unitario * $descuento_por_cinco_quesos;
            $precio = 1599;
        }


        /*if ($tipo == 'Un mes') {
            $precio = $precio * 1;
        } elseif ($tipo == 'Tres meses') {
            $precio = $precio * 3;
        } elseif ($tipo == 'Seis meses') {
            $precio = $precio * 6;
        } elseif ($tipo == 'Doce meses') {
            $precio = $precio * 12;
        }*/

        return $precio;
    }
    // *********************************************************************************************************************











    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function confirmar_cancelacion_de_suscripcion(Request $request, Suscripcion $suscripcion)
    {
        if (! $request->hasValidSignature()) {
            abort(401); // lanza un pantallazo : 401 UNAUTHORIZED
            /*session()->flash('error', 'Esta intentando acceder a un recurso no autorizado.');
            return redirect() -> route('home');*/
        }else{
            
            // verifique si la fecha de hoy esta a mas de 5 dias del primer jueves del mes
            // si es asi, entonces no se puede cancelar la suscripcion
            // si no es asi, entonces se puede cancelar la suscripcion
            $hoy = time();

            $primerDiaDelMes = strtotime(date('Y-m-01'));

            
            if( str_contains($suscripcion->dia_de_entrega , 'Primer jueves')){
                // primer jueves del mes
                $primerJuevesDelMes = strtotime('first thursday of ' . date('F Y', $primerDiaDelMes));
                $diasEntreFechas = round(($primerJuevesDelMes - $primerDiaDelMes) / (60 * 60 * 24));
            }elseif( str_contains($suscripcion->dia_de_entrega, 'Tercer jueves')){
                // tercer jueves del mes
                $tercerJuevesDelMes = strtotime('third thursday of ' . date('F Y', $primerDiaDelMes));
                $diasEntreFechas = round(($tercerJuevesDelMes - $primerDiaDelMes) / (60 * 60 * 24));
            }

            if ($diasEntreFechas > 5) {
                // La fecha de hoy está a más de 5 días del primer jueves del mes.
                //session()->flash('error', 'La suscripcion SI puede ser cancelada porque la fecha de hoy está a más de 5 días del primer jueves del mes.');
                
                if($suscripcion->activo == 0){
                    session()->flash('error', 'La suscripcion ya fue cancelada previamente.');
                    return redirect() -> route('home');
                }else{
                    return view('confirmar_cancelacion')->with('suscripcion', $suscripcion);
                }
            
            } else {
                // La fecha de hoy está a menos de 5 días del primer jueves del mes.
                session()->flash('error', 'La suscripción NO puede ser cancelada porque faltan menos de cinco días para la entrega.');
                return redirect() -> route('home');
            }


            /*if($suscripcion->activo == 0){
                session()->flash('error', 'La suscripcion ya fue cancelada previamente.');
                return redirect() -> route('home');
            }else{
                return view('confirmar_cancelacion')->with('suscripcion', $suscripcion);
            }*/
        }
    }
    // *********************************************************************************************************************










    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function cancelar_suscripcion(Request $request, Suscripcion $suscripcion)
    {
        
        if (! $request->hasValidSignature()) {
            abort(401); // lanza un pantallazo : 401 UNAUTHORIZED
            /*session()->flash('error', 'Esta intentando acceder a un recurso no autorizado.');
            return redirect() -> route('home');*/
        }else{

            $suscripcion->activo = 0;
            $suscripcion->save();

            //cancela los pedidos asociados a la suscripcion
            $pedidos = $suscripcion->pedidos;
            foreach ($pedidos as $pedido) {
                if($pedido->status == 'pedido'){
                    $pedido->status = 'cancelado';
                    $pedido->save();
                }
            }

            session()->flash('exito', 'La suscripción se canceló con éxito');
            return redirect() -> route('home');
            
            //return view('confirmar_cancelacion')->with('suscripcion', $suscripcion);
        }
    }
    // *********************************************************************************************************************





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscripcion $suscripcion)
    {
        
        $suscripcion->delete();
        session()->flash('exito', 'La suscripcion fue eliminada.');

        return redirect() -> route('pedidos.index');
    }




}
