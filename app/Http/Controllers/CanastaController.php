<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Canasta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;
use App\Models\Producto;

class CanastaController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $canastas = Canasta::get();
        $lista_completa_de_productos = Producto::get();
            
        return view('canastas.index')->with('canastas', $canastas)->with('lista_completa_de_productos', $lista_completa_de_productos);
        //return view('canastas');
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
            'nombre' => 'required|max:255',
            'descripcion' => 'max:255',
            'precio' => 'required|numeric',
            'stock' => 'numeric|nullable',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'productos' => 'required',
        ]);
        
        $canasta = new Canasta();

        $canasta->nombre = $request->nombre;
        $canasta->descripcion = $request->descripcion;
        $canasta->precio = $request->precio;
        $canasta->stock = $request->stock;
        
        if($request->activo){
            $canasta->activo = true;
        }else{
            $canasta->activo = false;
        }


        // ****************************************************************
        // asociar elementos de a uno (crea un registro en la tabla pivote)
        //$canasta->productos()->attach($producto->id);
        
        // elimina registros en la tabla pivote
        //$canasta->productos()->detach($producto->id);

        //agrega varios elementos a la tabla pivote
        //$canasta->productos()->attach([$producto->id, $producto2->id, $producto3->id]);

        // borra los previos y agrega los que mandamos en el array
        //$canasta->productos()->sync([$producto->id, $producto2->id, $producto3->id]);
        // ****************************************************************

        /*foreach($request->productos as $producto){

        }*/

        $canasta->save();

        $canasta->productos()->sync($request->productos);

        //IMAGEN
        //se guarda en la carpeta storage/app/public/canastas/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/canastas');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => 'no se',
                'tipo' => 'imagen',
                'tamano' => 'no se',
                'multimediaable_id' => $canasta->id,
                'multimediaable_type' => 'App\Models\Canasta',
                'activo' => true,
            ]);
   
        }

        session()->flash('exito', 'La canasta fue creada.');
        return redirect() -> route('canastas.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Canasta $canasta)
    {
        $lista_completa_de_productos = Producto::get();

        //return view('canastas.edit', compact('canasta'));
        return view('canastas.edit')->with('canasta', $canasta)->with('lista_completa_de_productos', $lista_completa_de_productos);
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Canasta $canasta)
    {
        //debe llamarse tienda porque es el nombre especificado en la ruta (php artisan route:list)
        //return $request->all();
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'max:255',
            'precio' => 'required|numeric',
            'stock' => 'numeric|nullable',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'productos' => 'required',
        ]);

        $canasta->nombre = $request->nombre;
        $canasta->descripcion = $request->descripcion;
        $canasta->precio = $request->precio;
        $canasta->stock = $request->stock;

        if($request->activo){
            $canasta->activo = true;
        }else{
            $canasta->activo = false;
        }

        $canasta->productos()->sync($request->productos);

        $canasta -> save();
        

        //IMAGEN
        //se guarda en la carpeta storage/app/public/canastas/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/canastas');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => 'no se',
                'tipo' => 'imagen',
                'tamano' => 'no se',
                'multimediaable_id' => $canasta->id,
                'multimediaable_type' => 'App\Models\Canasta',
                'activo' => true,
            ]);

        }

        session()->flash('exito', 'La canasta fue editada.');
        return redirect() -> route('canastas.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Canasta  $canasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Canasta $canasta)
    {
        
        // buscamos todos los registros multimedia asociados a ese canasta
        // Multimedia::where('multimediaable_type', 'App\Models\Canasta')->where('multimediaable_id', $canasta->id)->delete();
        $multimedias = Multimedia::where('multimediaable_type', 'App\Models\Canasta')->where('multimediaable_id', $canasta->id)->get();
        
        foreach($multimedias as $multimedia ) {
            //se cambia la url relativa por la url del directorio
            $url = str_replace('storage', 'public', $multimedia->url);
            
            // elimina de la carpeta
            Storage::delete($url);

            // Se eliminan de la base de datos las imagenes relacionadas al producto
            $multimedia->delete();
            
        }


        $canasta->delete();
        session()->flash('exito', 'La canasta fue eliminada.');

        return redirect() -> route('canastas.index');
    }



}
