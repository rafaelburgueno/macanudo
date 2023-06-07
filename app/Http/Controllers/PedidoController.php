<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\Canasta;
use App\Models\Producto;
use App\Models\Costo_de_envio;
use App\Models\Cupon;
use App\Models\Suscripcion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidosMail;
use App\Mail\PedidoClienteMail;
use Exception;
//use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PedidoNotificationCliente;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

class PedidoController extends Controller
{
    




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // el siguiente bloque de codigo es una prueba del algoritmo para generar un nuevo pedido 
        // automaticamente cuando se cumple un mes de la fecha de creacion del ultimo pedido
        
        //##########################################################
        /* seudo codigo: 
        paso 1- traer pedidos->tipo == 'club del queso'
        paso 2- traer traer los pedidos de un mes atras
        paso 3- consultar la suscripcion de cada pedido y ver si esta activa
        paso 4- si la suscripcion esta activa, crear un nuevo pedido con los datos del pedido anterior
        */
        /*$pedidos = Pedido::where('tipo', 'club del queso')
            //->whereDate('created_at', '>', Carbon::now()->subMonth())
            ->whereDate('created_at', '=', Carbon::now()->subDays(31))
            ->where('tipo_de_cliente', '=', 'suscripción - último pedido')
            ->whereHas('suscripcion', function ($query) {
                $query->where('activo', 1);
            })->get();

        foreach ($pedidos as $pedido) {
            $nuevo_pedido = new Pedido();
            $nuevo_pedido->status = 'sin productos';
            $nuevo_pedido->tipo = 'club del queso';
            $nuevo_pedido->user_id = $pedido->suscripcion->user_id;
            $nuevo_pedido->nombre = $pedido->suscripcion->user->name;
            $nuevo_pedido->email = $pedido->suscripcion->user->email;
            $nuevo_pedido->telefono = $pedido->suscripcion->telefono;
            $nuevo_pedido->direccion = $pedido->suscripcion->direccion_de_entrega;
            $nuevo_pedido->medio_de_pago = $pedido->medio_de_pago;
            // el monto se calcula en base al precio de la suscripcion, porque si se cambia el tipo de suscripcion entre pedidos, debe tomar siempre el precio de la suscripcion
            $nuevo_pedido->monto = $pedido->suscripcion->precio;
            //$nuevo_pedido->monto = $pedido->monto;
            $nuevo_pedido->recibir_novedades = $pedido->recibir_novedades;

            $nuevo_pedido->tipo_de_cliente = 'suscripción - último pedido';
            $pedido->tipo_de_cliente = 'suscripcion';
            $pedido->save();

            // el numero de factura es 66 porque es el numero de factura que se le asigna a los pedidos que se generan automaticamente
            $nuevo_pedido->numero_de_factura = 66; //rand(1000, 9999);
             
            $nuevo_pedido->estado_del_pago = 'pendiente';
            $nuevo_pedido->suscripcion_id = $pedido->suscripcion_id;


            //$nuevo_pedido->canasta_id = $pedido->canasta_id;
            //$nuevo_pedido->costo_de_envio_id = $pedido->costo_de_envio_id;
            //$nuevo_pedido->cupon_id = $pedido->cupon_id;
            $nuevo_pedido->save();

            // en la suscripcion relativa al nuevo pedido, se actualiza el campo 'fecha_de_renovacion' con un date
            $suscripcion = $pedido->suscripcion;
            $suscripcion->fecha_de_renovacion = now();
            $suscripcion->save();

            // Envia a pedro o a mi un email con el pedido
            //Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rburg@vivaldi.net'))->cc(env('MAIL_REGISTROS', 'rburg@vivaldi.net'))
            //->queue(new PedidosMail($nuevo_pedido));
            Mail::to(env('MAIL_DESARROLLADOR', 'rburg@vivaldi.net'))->cc(env('MAIL_REGISTROS', 'rburg@vivaldi.net'))
            ->queue(new PedidosMail($nuevo_pedido));

        }*/

        //#########################################################
        
        // ********************************
        $pedidos = Pedido::get(); //esta linea tiene que ser descomentada despues de hacer el algoritmo para traer pedidos de un mes atras
        // ********************************
        //$pedidos = Pedido::where('medio_de_pago', '!=', 'sin definir')->where('status', '!=', 'entregado')->get();
        $canastas = Canasta::where('activo', true)->get();
        $lista_de_productos = Producto::where('activo', true)->get();
        $costos_de_envio = Costo_de_envio::where('activo', true)->get();
        $cupones = Cupon::where('activo', true)->get();
        $suscripciones = Suscripcion::all();
            
        return view('pedidos.index')
            ->with('pedidos', $pedidos)
            ->with('canastas', $canastas)
            ->with('lista_de_productos', $lista_de_productos)
            ->with('costos_de_envio', $costos_de_envio)
            ->with('cupones', $cupones)
            ->with('suscripciones', $suscripciones);
        //return view('pedidos');
    }
    // ******************************************************************************************************************




    





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reparto()
    {
        
        //$pedidos = Pedido::where('status', '!=', 'entregado')->get();
        $pedidos = Pedido::where('medio_de_pago', '!=', 'sin definir')->where('status', '!=', 'entregado')->where('direccion', '!=', 'el pedido se retira en la planta')->get();
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
    // ***************************************************************************************************************************











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

        // si hay una sesion de usuario, se guarda el id del usuario en el campo 'user_id' de la tabla 'pedidos'
        if(Auth::check()){
            $pedido->user_id =  auth()->id();
        } 


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
    // **********************************************************************************************************************












    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $canastas = Canasta::where('activo', true)->get();
        //$canastas = Canasta::get();
        //$lista_de_productos = Producto::where('activo', true)->get();
        $lista_de_productos = Producto::get();
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
    // **********************************************************************************************************************










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

        $pedido->canasta_id = $request->canasta_id;
        // si el pedido es de tipo canasta, se asigna la canasta, se borran los productos y se emite una notificacion al cliente(email)
        if($request->canasta_id && $pedido->status == 'pedido'){
            $pedido->canasta_id = $request->canasta_id;
            // si no vienen productos desde el formulario se borran los productos del pedido
            if(!$request->productos){
                $pedido->productos()->detach();
            }
            
            $pedido -> save();
            
            // Envia a pedro o a mi un email con el pedido
            Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->cc(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))
            ->queue(new PedidosMail($pedido));

            try {
                // Envia un email al cliente con el pedido // TODO:un try catch por si falla el envio de email
                Mail::to(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))->queue(new PedidoClienteMail($pedido));
                //$user->notify(new SuscripcionNotification($suscripcion));
                Notification::route('mail', $pedido->email)->notify(new PedidoNotificationCliente($pedido));
                session()->flash('exito', 'El pedido con id:'.$pedido->id.' fue editado correctamente. Se envio un email con el detalle del pedido.');
                return redirect() -> route('pedidos.index');
            } catch (Exception $e) {
                $error = $e->getMessage();
                //session()->flash('error', 'Ha ocurrido un error con la dirección de email suministrada.');
                session()->flash('error', 'Ha ocurrido un error con el email: '. $error);
                return redirect() -> route('pedidos.index');
            }

        }



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

        // si se editan los productos del pedido, se envian los emails
        if($request->productos){

            // TODO: borrar los registros previos
            DB::table('pedido_producto')->where('pedido_id', $pedido->id)->delete();

            $cantidades = $request->cantidades;

            $created_at = now();
    
            foreach($request->productos as $key => $producto){
    
                $cantidad_del_producto = (int)($cantidades[$key]);
                //dd($cantidad_del_producto);
    
                DB::table('pedido_producto')->insert([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $producto,
                    'unidades' => $cantidad_del_producto,
                    'created_at' => $created_at
                ]);
                
            } 


            //TODO: si el status del pedido es distinto a 'entregado', se envia un email al usuario
            if($pedido->status != 'entregado'){
                
                // Envia a pedro o a mi un email con el pedido
                Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->cc(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))
                ->queue(new PedidosMail($pedido));
                

                try {
                    // Envia un email al cliente con el pedido // TODO:un try catch por si falla el envio de email
                    Mail::to(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))->queue(new PedidoClienteMail($pedido));
                    //$user->notify(new SuscripcionNotification($suscripcion));
                    Notification::route('mail', $pedido->email)->notify(new PedidoNotificationCliente($pedido));
                
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    //session()->flash('error', 'Ha ocurrido un error con la dirección de email suministrada.');
                    session()->flash('error', 'Ha ocurrido un error con el email: '. $error);
                    return redirect() -> route('pedidos.index');
                }
            }

            
            // llamaos al metodo que actualiza el stock
            //$this->actualizarCuponYStock($pedido);
            $pedido->actualizarCuponYStock();

            if($pedido->status != 'entregado'){
                session()->flash('exito', 'El pedido con id:'.$pedido->id.' fue editado correctamente. Se envio un email con el detalle del pedido.');
            }else{
                session()->flash('exito', 'El pedido con id:'.$pedido->id.' fue editado correctamente.');
            }
            return redirect() -> route('pedidos.index');

            /* Ha ocurrido un error con el email: Attempt to read property "dia_de_entrega" on null (View: /home/vagrant/code/macanudonoqueso/resources/views/emails/pedido_cliente_mail.blade.php) */

        }


        session()->flash('exito', 'El pedido con id:'.$pedido->id.' fue editado correctamente.');
        return redirect() -> route('pedidos.index');
    }
    // ************************************************************************************************************











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
    // ************************************************************************************************************
    










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
    // ************************************************************************************************************









    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function confirmar_cancelacion_de_pedido(Request $request, pedido $pedido)
    {
        
        if (! $request->hasValidSignature()) {
            abort(401); // lanza un pantallazo : 401 UNAUTHORIZED
            /*session()->flash('error', 'Esta intentando acceder a un recurso no autorizado.');
            return redirect() -> route('home');*/
        }else{
            if($pedido->status == 'cancelado'){
                session()->flash('error', 'El pedido ya fue cancelado previamente.');
                return redirect() -> route('home');
            }else{

                return view('confirmar_cancelacion')->with('pedido', $pedido);
            }
            
        }
    }
    // *********************************************************************************************************************










    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function cancelar_pedido(Request $request, Pedido $pedido)
    {
        
        if (! $request->hasValidSignature()) {
            abort(401); // lanza un pantallazo : 401 UNAUTHORIZED
            /*session()->flash('error', 'Esta intentando acceder a un recurso no autorizado.');
            return redirect() -> route('home');*/
        }else{

            // TODO: reestablecer el stock de los productos

            if($pedido->status == 'pedido'){
                $pedido->status = 'cancelado';
                $pedido->save();

                session()->flash('exito', 'El pedido se canceló con éxito');
                return redirect() -> route('home');
            }
            elseif($pedido->status == 'entregado'){
                session()->flash('error', 'No se puede cancelar un pedido que ya fue entregado.');
                return redirect() -> route('home');
            }elseif($pedido->status == 'cancelado'){
                session()->flash('error', 'El pedido ya fue cancelado.');
                return redirect() -> route('home');
            }elseif($pedido->status == 'en viaje' || $pedido->status == 'despachado'){
                session()->flash('error', 'No se puede cancelar un pedido a pocos dias de ser entregado.');
                return redirect() -> route('home');
            }
            
            

            
            //return view('mostrar_pedido')->with('pedido', $pedido);
        }
    }




}
