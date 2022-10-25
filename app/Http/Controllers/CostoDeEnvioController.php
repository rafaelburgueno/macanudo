<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Costo_de_envio;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
//use App\Models\Multimedia;

class CostoDeEnvioController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $costos_de_envio = Costo_de_envio::get();
            
        return view('costos_de_envio.index')->with('costos_de_envio', $costos_de_envio);
        //return view('costos_de_envio');
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
            'region' => 'max:100|nullable',
            'departamento' => 'max:50|nullable',
            'dias_de_demora' => 'numeric|max:127|nullable',
            'dia_de_entrega' => 'max:50|nullable',
            'hora_de_entrega' => 'max:20|nullable',
            'costo_de_envio' => 'numeric|max:32767|nullable',
        ]);
        
        $costo_de_envio = new Costo_de_envio();

        $costo_de_envio->region = $request->region;
        $costo_de_envio->departamento = $request->departamento;
        $costo_de_envio->dias_de_demora = $request->dias_de_demora;
        $costo_de_envio->dia_de_entrega = $request->dia_de_entrega;
        $costo_de_envio->hora_de_entrega = $request->hora_de_entrega;
        $costo_de_envio->costo_de_envio = $request->costo_de_envio;

        if($request->activo){
            $costo_de_envio->activo = true;
        }else{
            $costo_de_envio->activo = false;
        }

        $costo_de_envio -> save();


        session()->flash('exito', 'El costo de envío fue creado.');
        return redirect() -> route('costos_de_envio.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costo_de_envio  $costo_de_envio
     * @return \Illuminate\Http\Response
     */
    public function edit(Costo_de_envio $costo_de_envio)
    {
        return view('costos_de_envio.edit', compact('costo_de_envio'));
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costo_de_envio $costo_de_envio)
    {
        //debe llamarse tienda porque es el nombre especificado en la ruta (php artisan route:list)
        //return $request->all();
        $request->validate([
            'region' => 'max:100|nullable',
            'departamento' => 'max:50|nullable',
            'dias_de_demora' => 'numeric|max:127|nullable',
            'dia_de_entrega' => 'max:50|nullable',
            'hora_de_entrega' => 'max:20|nullable',
            'costo_de_envio' => 'numeric|max:32767|nullable',
        ]);

        $costo_de_envio->region = $request->region;
        $costo_de_envio->departamento = $request->departamento;
        $costo_de_envio->dias_de_demora = $request->dias_de_demora;
        $costo_de_envio->dia_de_entrega = $request->dia_de_entrega;
        $costo_de_envio->hora_de_entrega = $request->hora_de_entrega;
        $costo_de_envio->costo_de_envio = $request->costo_de_envio;

        if($request->activo){
            $costo_de_envio->activo = true;
        }else{
            $costo_de_envio->activo = false;
        }

        $costo_de_envio -> save();
        

        session()->flash('exito', 'El costo de envío fue editado.');
        return redirect() -> route('costos_de_envio.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costo_de_envio $costo_de_envio)
    {

        $costo_de_envio->delete();
        session()->flash('exito', 'El costo de envío fue eliminado.');

        //$tienda->activo = 0;
        //$tienda -> save();
        //session()->flash('exito', 'El costo_de_envio fue desactivado.');

        return redirect() -> route('costos_de_envio.index');
    }



}
