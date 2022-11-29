<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class ProductoController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $productos = Producto::orderBy('nombre','desc')->get();
            
        return view('productos.index')->with('productos', $productos);
        //return view('productos');
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
            'tipo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'precio' => 'required|numeric',
            'stock' => 'numeric|nullable',
            'ingredientes' => 'max:255|nullable',
            'peso_neto' => 'numeric|nullable',
            'informacion_nutricional' => 'max:1000|nullable',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'color' => 'nullable|max:20',
            'relevancia' => 'numeric',
        ]);
        
        $producto = new Producto();

        $producto->nombre = $request->nombre;
        $producto->slug = Str::slug($request->nombre, '-');
        $producto->tipo = $request->tipo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->ingredientes = $request->ingredientes;
        $producto->peso_neto = $request->peso_neto;
        $producto->informacion_nutricional = $request->informacion_nutricional;

        if($request->activo){
            $producto->activo = true;
        }else{
            $producto->activo = false;
        }

        if($request->relevancia){
            $producto->relevancia = $request->relevancia;
        }/*else{
            $producto->relevancia = 1;
        }*/

        if($request->color){
            $producto->color = $request->color;
        }

        //$producto->categorias = $request->categorias;

        $producto -> save();


        //IMAGEN
        //se guarda en la carpeta storage/app/public/productos/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/productos');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => 'no se',
                'tipo' => 'imagen',
                'tamano' => 'no se',
                'multimediaable_id' => $producto->id,
                'multimediaable_type' => 'App\Models\Producto',
                'activo' => true,
            ]);
   
        }

        session()->flash('exito', 'El producto fue creado.');
        return redirect() -> route('productos.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //debe llamarse tienda porque es el nombre especificado en la ruta (php artisan route:list)
        //return $request->all();
        $request->validate([
            'nombre' => 'required|max:255',
            'tipo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'precio' => 'required|numeric',
            'stock' => 'numeric|nullable',
            'ingredientes' => 'max:255|nullable',
            'peso_neto' => 'numeric|nullable',
            'informacion_nutricional' => 'max:1000|nullable',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'color' => 'nullable|max:20',
            'relevancia' => 'numeric',
        ]);

        //TODO actualizar el campo slug
        //$producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->slug = strtolower(str_replace(' ', '-', $request->nombre));
        $producto->tipo = $request->tipo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->ingredientes = $request->ingredientes;
        $producto->peso_neto = $request->peso_neto;
        $producto->informacion_nutricional = $request->informacion_nutricional;

        if($request->activo){
            $producto->activo = true;
        }else{
            $producto->activo = false;
        }

        if($request->relevancia){
            $producto->relevancia = $request->relevancia;
        }/*else{
            $producto->relevancia = 1;
        }*/

        if($request->color){
            $producto->color = $request->color;
        }

        $producto -> save();
        

        //IMAGEN
        //se guarda en la carpeta storage/app/public/productos/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/productos');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => 'no se',
                'tipo' => 'imagen',
                'tamano' => 'no se',
                'multimediaable_id' => $producto->id,
                'multimediaable_type' => 'App\Models\Producto',
                'activo' => true,
            ]);

        }

        session()->flash('exito', 'El producto fue editado.');
        return redirect() -> route('productos.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        
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


        $producto->delete();
        session()->flash('exito', 'El producto fue eliminado.');

        //$tienda->activo = 0;
        //$tienda -> save();
        //session()->flash('exito', 'El producto fue desactivado.');

        return redirect() -> route('productos.index');
    }


}
