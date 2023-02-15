<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cupon;
use App\Models\Pedido;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class CuponController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cupones = Cupon::get();
        //$pedidos = Pedido::where('cupon_id', '!=', NULL )->get();
        $pedidos = Pedido::whereNotNull('cupon_id')->get();
            
        return view('cupones.index')->with('cupones', $cupones)->with('pedidos', $pedidos);
        //return view('cupones');
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
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'codigo' => 'required|max:50',
            'descripcion' => 'max:100',
            'cantidad' => 'required|numeric',
            'descuento' => 'required|numeric',
            'vencimiento' => 'date|nullable',
            //'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        
        $cupon = new Cupon();

        $cupon->codigo = $request->codigo;
        $cupon->descripcion = $request->descripcion;
        $cupon->cantidad = $request->cantidad;
        $cupon->descuento = $request->descuento;
        $cupon->vencimiento = $request->vencimiento;

        if($request->activo){
            $cupon->activo = true;
        }else{
            $cupon->activo = false;
        }

        //$cupon->categorias = $request->categorias;

        $cupon -> save();


        session()->flash('exito', 'El cupón fue creado.');
        return redirect() -> route('cupones.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupon $cupon)
    {
        return view('cupones.edit', compact('cupon'));
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupon $cupon)
    {
        //debe llamarse tienda porque es el nombre especificado en la ruta (php artisan route:list)
        //return $request->all();
        $request->validate([
            'codigo' => 'required|max:50',
            'descripcion' => 'max:100',
            'cantidad' => 'required|numeric',
            'descuento' => 'required|numeric',
            'vencimiento' => 'date|nullable',
            //'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        //TODO actualizar el campo slug
        //$cupon = Cupon::findOrFail($id);
        $cupon->codigo = $request->codigo;
        $cupon->descripcion = $request->descripcion;
        $cupon->cantidad = $request->cantidad;
        $cupon->descuento = $request->descuento;
        $cupon->vencimiento = $request->vencimiento;

        if($request->activo){
            $cupon->activo = true;
        }else{
            $cupon->activo = false;
        }

        $cupon -> save();
        

        session()->flash('exito', 'El cupón fue editado.');
        return redirect() -> route('cupones.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupon $cupon)
    {

        $cupon->delete();
        session()->flash('exito', 'El cupón fue eliminado.');

        //$tienda->activo = 0;
        //$tienda -> save();
        //session()->flash('exito', 'El cupon fue desactivado.');

        return redirect() -> route('cupones.index');
    }


}
