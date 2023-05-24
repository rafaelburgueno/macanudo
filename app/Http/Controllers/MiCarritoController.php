<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Costo_de_envio;
use App\Models\Pedido;
use App\Models\Cupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MiCarritoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        $productos = Producto::where('activo', true)->get();
        $costos_de_envio = Costo_de_envio::where('activo', true)->get();

        return view('mi_carrito')->with('productos', $productos)->with('costos_de_envio', $costos_de_envio);
    }




    /**
     * recalcula los datos del carrito y si los datos de costos son correctos redirige a la ruta de realizar pago 
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function verificar_carrito(Request $request)
    {
        //return $request->all();
        $request->validate([ 
            //'status' => 'required|max:50',
            'tipo' => 'nullable|max:50',
            //'canasta_id' => 'nullable|numeric',
            'nombre' => 'required|max:255',
            'email' => 'required|max:255',
            'documento_de_identidad' => 'nullable|max:20',
            'telefono' => 'nullable|max:20',
            'direccion' => 'required|max:100',
            'localidad' => 'nullable|max:50',
            //'departamento' => 'nullable|max:50',
            //'pais' => 'nullable|max:50',
            'costo_de_envio_id' => 'nullable|numeric',
            //'cupon_id' => 'nullable|numeric',
            'nombre_del_cupon' => 'nullable',
            'medio_de_pago' => 'nullable|max:50',
            'monto' => 'numeric',
            'tipo_de_cliente' => 'nullable|max:50',
            //'numero_de_factura' => 'nullable|numeric',
            'productos' => 'required',
            'cantidades' => 'required',
        ]);
        
        $pedido = new Pedido();

        //$pedido->status =  $request->status;
        $pedido->status =  'verificado';
        $pedido->tipo = $request->tipo;

        /*if($request->canasta_id){
            $pedido->canasta_id = $request->canasta_id;
        }*/

        // si hay una sesion de usuario, se guarda el id del usuario en el campo 'user_id' de la tabla 'pedidos'
        if(Auth::check()){
            $pedido->user_id =  auth()->id();
        } 
        //$pedido->user_id =  auth()->id();
        $pedido->nombre = $request->nombre;
        $pedido->email = $request->email;
        $pedido->documento_de_identidad = $request->documento_de_identidad;
        $pedido->telefono = $request->telefono;
        $pedido->direccion = $request->direccion;
        $pedido->localidad = $request->localidad;

        //TODO: definir el departamento y el pais segun el costo de envio
        /*$pedido->departamento = $request->departamento;*/

        // TODO: el costo de envio llega null si no se modifica al momento de hacer la compra
        $costo_de_envio = 0;
        if($request->costo_de_envio_id){
            $pedido->costo_de_envio_id = $request->costo_de_envio_id;

            $costos_de_envio = Costo_de_envio::where('activo', true)->where('id', $request->costo_de_envio_id)->first();


            $pedido->departamento = $costos_de_envio->departamento;
            $costo_de_envio = $costos_de_envio->costo_de_envio;
        }else{
            $pedido->costo_de_envio_id = Costo_de_envio::where('activo', true)->where('costo_de_envio', 0)->first()->id;
        }


        $descuento_por_cupon = 0;
        if($request->nombre_del_cupon){
            // 
            $cupon = Cupon::where('activo', true)->where('cantidad', '>', 0)->where('codigo', $request->nombre_del_cupon)->first();
            $pedido->cupon_id = $cupon->id;
            $descuento_por_cupon = $cupon->descuento;
            //$cupon->cantdad = (int)$cupon->cantdad -1;
            //$cupon->save();
        }

        $pedido->medio_de_pago = 'sin definir';
        //$pedido->estado_del_pago = 'pendiente';


        // los datos del request llegan como un array dentro del primer elemento de un array
        // por eso lo reconvertimos usando el index [0]
        $productos = explode(",", $request->productos[0]);
        $cantidades = explode(",", $request->cantidades[0]);

        // Recalcula el monto para asegurarse que no haya un hackeo en el frontend
        //$pedido->monto = $request->monto;
        $monto_desde_el_front = $request->monto;
        $suma_de_productos = 0;
        //$monto = 0;
        
        foreach($productos as $key => $producto_id){
            $producto = Producto::find($producto_id);
            $suma_de_productos = $suma_de_productos + ((int)$cantidades[$key] * (int)$producto->precio);
        }

        $suma_de_productos_con_descuento = $suma_de_productos - (($suma_de_productos*$descuento_por_cupon)/100);

        $total_de_la_compra = $suma_de_productos_con_descuento + $costo_de_envio;
        //dd($total_de_la_compra);

        //=============================================================
        // Aca se hace la verificacion final del los datos que llegan
        //=============================================================
        if($total_de_la_compra != $monto_desde_el_front){
            session()->flash('error', 'La compra fue rechazada por incongruencia de los datos.');
            return redirect() -> route('mi_carrito');
        }


        $pedido->monto = $total_de_la_compra;

        //restamos una unidad en el cupon utilizado
        // TODO: este algoritmo que resta un cupon debe hcerse despues de determinar el medio de pago
        /*if($request->nombre_del_cupon){
            $cupon->cantidad = (((int)$cupon->cantidad) -1);
            $cupon->save();
        }*/

        if($request->recibir_novedades){
            $pedido->recibir_novedades = true;
        }else{
            $pedido->recibir_novedades = false;
        }

        $pedido->tipo_de_cliente = $request->tipo_de_cliente;

        // el numero de factura debe definirse manualmente al momento de emitir la factura.
        // queda determinado que un pedido con numero_de_factura = 5 , es un pedido verificado, 
        // por lo tanto esta incompleto, queda por definir el medio de pago
        // numero_de_factura = 55 , es un pedido con medio_de_pago = 'pagar al recibir'
        $pedido->numero_de_factura = 5;


        // ****************************************************************
        // asociar elementos de a uno (crea un registro en la tabla pivote)
        //$pedido->productos()->attach($producto->id);
        
        // elimina registros en la tabla pivote
        //$pedido->productos()->detach($producto->id);

        //agrega varios elementos a la tabla pivote
        //$pedido->productos()->attach([$producto->id, $producto2->id, $producto3->id]);

        // borra los previos y agrega los que mandamos en el array
        //$pedido->productos()->sync([$producto->id, $producto2->id, $producto3->id]);
        // ****************************************************************


        $pedido->save();


        /*
        * Este es el algoritmo para crear los registros en la tabla pivote 'pedido_producto'
        */
        $created_at = now();

        foreach($productos as $key => $producto){

            DB::table('pedido_producto')->insert([
                'pedido_id' => $pedido->id,
                'producto_id' => $producto,
                'unidades' => $cantidades[$key],
                'created_at' => $created_at,
            ]);

        }

        //session()->flash('exito', 'La compra fue realizada con exito. En breve recibira nuestra visita.');
        //return redirect() -> route('nuestros_productos');
        session()->flash('exito', 'El pedido fue realizado. Ya solo queda realizar el pago');
        return  redirect()->route('realizar_pago', compact('pedido'));
    }




}
