<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class BannerController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Multimedia::where('multimediaable_type', 'banner')->orderBy('relevancia','asc')->get();
        
        
        return view('banner.index', compact('banner'));
        //return view('banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $request->all();

        $request->validate([
            //'relevancia' => 'required|max:100',
            'descripcion' => 'required|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            // validacion del campo 'link'
            'link' => 'nullable|url',
        ]);
            
        //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
        $imagen = $request->file('imagen')-> store('public/banner');
        
        //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
        $url = Storage::url($imagen);

        /*$imagen_con_info = false;
        if($request->imagen_con_info){
            $imagen_con_info = true;
        }*/

        $activo = false;
        if($request->activo){
            $activo = true;
        }

        Multimedia::create([
            'url' => $url,
            'descripcion' => $request->descripcion,
            // TODO: hacer una migracion para recibir el campo 'link'
            'link' => $request->link,
            'relevancia' => $request->relevancia,
            //'imagen_con_info' => $imagen_con_info,
            'resolucion' => 'TODO',
            'tipo' => 'imagen',
            'tamano' => 'TODO',
            //'multimediaable_id' => $evento->id,
            'multimediaable_type' => 'banner',
            'activo' => $activo,
        ]);

        //return 'se guardo todo';
        
        
        session()->flash('exito', 'La imagen fue agregada al banner.');

        return redirect() -> route('banner.index');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multimedia $imagen)
    {
        //return $request->all();

        $request->validate([
            //'relevancia' => 'required|max:100',
            'descripcion' => 'required|max:255',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            // validacion del campo 'link'
            'link' => 'nullable|url',
        ]);
            
        //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
        //$imagen = $request->file('imagen')-> store('public/banner');
        
        //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
        //$url = Storage::url($imagen);

        /*$imagen_con_info = false;
        if($request->imagen_con_info){
            $imagen_con_info = true;
        }*/

        $activo = false;
        if($request->activo){
            $activo = true;
        }

        $imagen->update([
            //'url' => $url,
            'descripcion' => $request->descripcion,
            'relevancia' => $request->relevancia,
            'link' => $request->link,
            //'imagen_con_info' => $imagen_con_info,
            'resolucion' => 'TODO',
            'tipo' => 'imagen',
            'tamano' => 'TODO',
            'activo' => $activo,
            //'multimediaable_id' => $evento->id,
            //'multimediaable_type' => 'banner',
        ]);

        $imagen->save();

        //return 'se guardo todo';
        
        
        session()->flash('exito', 'La imagen fue agregada al banner.');

        return redirect() -> route('banner.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Multimedia $imagen)
    {


        // buscamos todos los registros multimedia asociados a ese producto
        // Multimedia::where('multimediaable_type', 'App\Models\Producto')->where('multimediaable_id', $producto->id)->delete();
        $multimedia = Multimedia::find($imagen->id);
        //se cambia la url relativa por la url del directorio
        $url = str_replace('storage', 'public', $multimedia->url);
        // elimina de la carpeta
        Storage::delete($url);
        // Se eliminan de la base de datos las imagenes relacionadas al producto
        $multimedia->delete();
            
        


        $imagen->delete();
        session()->flash('exito', 'La imagen fue eliminada.');
        
        /*$evento->activo = 0;
        $evento -> save();
        session()->flash('exito', 'El evento fue desactivado.');*/


        return redirect() -> route('banner.index');
    }

}
