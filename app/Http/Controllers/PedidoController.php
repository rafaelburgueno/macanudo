<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\Canasta;
use App\Models\Producto;
use App\Models\Costo_de_envio;
use App\Models\Cupon;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pedidos = Pedido::get();
        //$pedidos = Pedido::where('medio_de_pago', '!=', 'sin definir')->where('status', '!=', 'entregado')->get();
        $canastas = Canasta::where('activo', true)->get();
        $lista_de_productos = Producto::where('activo', true)->get();
        $costos_de_envio = Costo_de_envio::where('activo', true)->get();
        $cupones = Cupon::where('activo', true)->get();
            
        return view('pedidos.index')
            ->with('pedidos', $pedidos)
            ->with('canastas', $canastas)
            ->with('lista_de_productos', $lista_de_productos)
            ->with('costos_de_envio', $costos_de_envio)
            ->with('cupones', $cupones);
        //return view('pedidos');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reparto()
    {
        
        //$pedidos = Pedido::where('status', '!=', 'entregado')->get();
        $pedidos = Pedido::where('medio_de_pago', '!=', 'sin definir')->where('status', '!=', 'entregado')->get();
        $canastas = Canasta::where('activo', true)->get();
        $lista_de_productos = Producto::where('activo', true)->get();
        $costos_de_envio = Costo_de_envio::where('activo', true)->get();
        $cupones = Cupon::where('activo', true)->get();
            
        return view('pedidos.reparto')
            ->with('pedidos', $pedidos)
            ->with('canastas', $canastas)
            ->with('lista_de_productos', $lista_de_productos)
            ->with('costos_de_envio', $costos_de_envio)
            ->with('cupones', $cupones);
        //return 'pagina de reparto';
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([ 
            //'status' => 'required|max:50',
            'tipo' => 'nullable|max:50',
            'canasta_id' => 'nullable|numeric',
            'nombre' => 'required|max:255',
            'email' => 'required|max:255',
            'documento_de_identidad' => 'nullable|max:20',
            'telefono' => 'nullable|max:20',
            'direccion' => 'required|max:100',
            'localidad' => 'nullable|max:50',
            'departamento' => 'nullable|max:50',
            'pais' => 'nullable|max:50',
            'costo_de_envio_id' => 'nullable|numeric',
            'cupon_id' => 'nullable|numeric',
            'medio_de_pago' => 'nullable|max:50',
            'monto' => 'numeric',
            'tipo_de_cliente' => 'nullable|max:50',
            'numero_de_factura' => 'nullable|numeric',
            'productos' => 'required',
            'cantidades' => 'required',
        ]);
        
        $pedido = new Pedido();

        $pedido->status = 'verificado';
        $pedido->tipo = $request->tipo;

        if($request->canasta_id){
            $pedido->canasta_id = $request->canasta_id;
        }

        //$pedido->user_id =  auth()->id();
        $pedido->nombre = $request->nombre;
        $pedido->email = $request->email;
        $pedido->documento_de_identidad = $request->documento_de_identidad;
        $pedido->telefono = $request->telefono;
        $pedido->direccion = $request->direccion;
        $pedido->localidad = $request->localidad;
        $pedido->departamento = $request->departamento;
        $pedido->pais = $request->pais;

        if($request->costo_de_envio_id){
            $pedido->costo_de_envio_id = $request->costo_de_envio_id;
        }

        if($request->cupon_id){
            $pedido->cupon_id = $request->cupon_id;
        }

        $pedido->medio_de_pago = 'sin definir';
        $pedido->monto = $request->monto;
        
        if($request->recibir_novedades){
            $pedido->recibir_novedades = true;
        }else{
            $pedido->recibir_novedades = false;
        }

        $pedido->tipo_de_cliente = $request->tipo_de_cliente;
        $pedido->numero_de_factura = $request->numero_de_factura;


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

        /*foreach($request->productos as $producto){

        }*/

        $pedido->save();

        /*
        * Este es el algoritmo para crear los registros en la tabla pivote 'pedido_producto'
        */
        $productos_totales_del_pedido = [];

        $cantidades = $request->cantidades;
        //elimina los valores que tienen "0"
        $cantidades = array_diff($cantidades, ["0"]);
        
        $cant = [];
        // esta linea corrije el defasaje de los index del array
        array_push($cant, array_values($cantidades));

        $created_at = now();

        foreach($request->productos as $key => $producto){

            $cantidad_del_producto = (int)($cant[0][$key]);
            //dd($cantidad_del_producto);

            DB::table('pedido_producto')->insert([
                'pedido_id' => $pedido->id,
                'producto_id' => $producto,
                'unidades' => $cantidad_del_producto,
                'created_at' => $created_at
            ]);
            //$article = Article::create(['title' => 'Traveling to Europe']);


            /*for($i = 1; $i <= $cantidad_del_producto; $i++){
                array_push($productos_totales_del_pedido, $producto);
            }*/
            //dd($productos_totales_del_pedido);
        }

        //$pedido->productos()->sync($productos_totales_del_pedido);
        //$pedido->productos()->attach($productos_totales_del_pedido);
        

        session()->flash('exito', 'El pedido fue creado.');
        return redirect() -> route('pedidos.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $canastas = Canasta::where('activo', true)->get();
        $lista_de_productos = Producto::where('activo', true)->get();
        $costos_de_envio = Costo_de_envio::where('activo', true)->get();
        $cupones = Cupon::where('activo', true)->get();

        if($pedido->medio_de_pago == 'mercadopago'){

            $payment_id = $pedido->numero_de_factura;

            $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=".env('MP_ACCESS_TOKEN'));
            //$response = json_decode($response);

            return view('pedidos.edit')
            ->with('pedido', $pedido)
            ->with('canastas', $canastas)
            ->with('lista_de_productos', $lista_de_productos)
            ->with('costos_de_envio', $costos_de_envio)
            ->with('cupones', $cupones)
            ->with('mercadopago', json_decode($response));
            //->with('json', $response);

        }else{

            return view('pedidos.edit')
            ->with('pedido', $pedido)
            ->with('canastas', $canastas)
            ->with('lista_de_productos', $lista_de_productos)
            ->with('costos_de_envio', $costos_de_envio)
            ->with('cupones', $cupones);
            //return view('pedidos.edit', compact('pedido'));
        }
        
    }




     /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //return $request->all();
        $request->validate([ 
            'status' => 'nullable|max:50',
            //'tipo' => 'nullable|max:50',
            'canasta_id' => 'nullable|numeric',
            //'nombre' => 'required|max:255',
            //'email' => 'required|max:255',
            //'documento_de_identidad' => 'nullable|max:20',
            'telefono' => 'nullable|max:20',
            'direccion' => 'required|max:100',
            'localidad' => 'nullable|max:50',
            'departamento' => 'nullable|max:50',
            //'pais' => 'nullable|max:50',
            //'costo_de_envio_id' => 'nullable|numeric',
            //'cupon_id' => 'nullable|numeric',
            'medio_de_pago' => 'nullable|max:50',
            'estado_del_pago' => 'nullable|max:50',
            //'monto' => 'numeric',
            //'tipo_de_cliente' => 'nullable|max:50',
            'numero_de_factura' => 'nullable|numeric',
            'factura_dgi' => 'nullable|numeric|max:4294967294',
            //'productos' => 'required',
            //'cantidades' => 'required',
        ]);

        
        $pedido->status = $request->status;
        //$pedido->tipo = $request->tipo;

        if($request->canasta_id){
            $pedido->canasta_id = $request->canasta_id;
        }

        //$pedido->user_id =  auth()->id();
        //$pedido->nombre = $request->nombre;
        //$pedido->email = $request->email;
        //$pedido->documento_de_identidad = $request->documento_de_identidad;
        $pedido->telefono = $request->telefono;
        $pedido->direccion = $request->direccion;
        $pedido->localidad = $request->localidad;
        $pedido->departamento = $request->departamento;
        //$pedido->pais = $request->pais;

        /*if($request->costo_de_envio_id){
            $pedido->costo_de_envio_id = $request->costo_de_envio_id;
        }*/

        /*if($request->cupon_id){
            $pedido->cupon_id = $request->cupon_id;
        }*/

        $pedido->medio_de_pago = $request->medio_de_pago;
        $pedido->estado_del_pago = $request->estado_del_pago;
        //$pedido->monto = $request->monto;
        
        if($request->recibir_novedades){
            $pedido->recibir_novedades = true;
        }else{
            $pedido->recibir_novedades = false;
        }

        //$pedido->tipo_de_cliente = $request->tipo_de_cliente;
        if($pedido->medio_de_pago != 'mercadopago'){
            $pedido->numero_de_factura = $request->numero_de_factura;
        }

        //if($request->factura_dgi){
            $pedido->factura_dgi = $request->factura_dgi;
        //}

        //$pedido->recibir_novedades = $request->recibir_novedades;

        $pedido -> save();
        
        //elimina los registros previos en la tabla pivot
        //DB::table('pedido_producto')->where('pedido_id', $pedido->id)->delete();


        /*
        * Este es el algoritmo para crear los registros en la tabla pivote 'pedido_producto'
        */

        //$cantidades = $request->cantidades;
        //elimina los valores que tienen "0"
        //$cantidades = array_diff($cantidades, ["0"]);
        
        //$cant = [];
        // esta linea corrije el defasaje de los index del array
        //array_push($cant, array_values($cantidades));

        //$updated_at = now();

        /*foreach($request->productos as $key => $producto){

            $cantidad_del_producto = (int)($cant[0][$key]);
            //dd($cantidad_del_producto);

            DB::table('pedido_producto')->insert([
                'pedido_id' => $pedido->id,
                'producto_id' => $producto,
                'unidades' => $cantidad_del_producto,
                'created_at' => $pedido->created_at,
                'updated_at' => $updated_at,
            ]);
            //$article = Article::create(['title' => 'Traveling to Europe']);


            //for($i = 1; $i <= $cantidad_del_producto; $i++){
            //    array_push($productos_totales_del_pedido, $producto);
            //}
            //dd($productos_totales_del_pedido);
        }*/


        session()->flash('exito', 'El pedido fue editado.');
        return redirect() -> route('pedidos.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        /*
        // buscamos todos los registros multimedia asociados a ese producto
        // Multimedia::where('multimediaable_type', 'App\Models\Producto')->where('multimediaable_id', $producto->id)->delete();
        $multimedias = Multimedia::where('multimediaable_type', 'App\Models\Producto')->where('multimediaable_id', $producto->id)->get();
        
        foreach($multimedias as $multimedia ) {
            //se cambia la url relativa por la url del directorio
            $url = str_replace('storage', 'public', $multimedia->url);
            
            // elimina de la carpeta
            Storage::delete($url);

            // Se eliminan de la base de datos las imagenes relacionadas al producto
            $multimedia->delete();
            
        }
        */

        $pedido->delete();
        session()->flash('exito', 'El pedido fue eliminado.');

        //$tienda->activo = 0;
        //$tienda -> save();
        //session()->flash('exito', 'El pedido fue desactivado.');

        return redirect() -> route('pedidos.index');
    }
        



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function mostrarPago(Pedido $pedido)
    {
        return view('mostrar_pago')->with('pedido', $pedido);
        //return view('pedidos.edit', compact('pedido'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pedido $pedido)
    {
        
        if (! $request->hasValidSignature()) {
            abort(401); // lanza un pantallazo : 401 UNAUTHORIZED
            /*session()->flash('error', 'Esta intentando acceder a un recurso no autorizado.');
            return redirect() -> route('home');*/
        }else{

            return view('mostrar_pedido')->with('pedido', $pedido);
            //return view('pedidos.edit', compact('pedido'));
        }
    }





}
