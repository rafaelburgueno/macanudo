<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\Canasta;
use App\Models\Producto;
use App\Models\Costo_de_envio;
use App\Models\Cupon;

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
            //'productos' => 'nullable',
        ]);
        
        $pedido = new Pedido();

        $pedido->status = 'pedido';
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

        $pedido->medio_de_pago = $request->medio_de_pago;
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

        if($request->productos){
            $pedido->productos()->sync($request->productos);
        }


        session()->flash('exito', 'El pedido fue creado.');
        return redirect() -> route('pedidos.index');
    }





}
