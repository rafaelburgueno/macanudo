<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;
use App\Models\Producto;

class PostController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::get();
            
        return view('posts.index')->with('posts', $posts);
        //return view('posts');
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
            'titulo' => 'required|max:255',
            'descripcion' => 'max:255|nullable',
            'texto' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        
        $post = new Post();

        $post->titulo = $request->titulo;
        $post->slug = strtolower(Str::slug($request->titulo, '-'));
        $post->descripcion = $request->descripcion;
        $post->texto = $request->texto;
        
        if($request->activo){
            $post->activo = true;
        }else{
            $post->activo = false;
        }


        $post->save();


        //IMAGEN
        //se guarda en la carpeta storage/app/public/canastas/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/posts');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => 'no se',
                'tipo' => 'imagen',
                'tamano' => 'no se',
                'multimediaable_id' => $post->id,
                'multimediaable_type' => 'App\Models\Post',
                'activo' => true,
            ]);
   
        }

        session()->flash('exito', 'El post fue creado.');
        return redirect() -> route('posts.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //return view('posts.edit', compact('post'));
        return view('posts.edit')->with('post', $post);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //return $request->all();
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'max:255|nullable',
            'texto' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $post->titulo = $request->titulo;
        $post->slug = strtolower(Str::slug($request->titulo, '-'));
        $post->descripcion = $request->descripcion;
        $post->texto = $request->texto;

        if($request->activo){
            $post->activo = true;
        }else{
            $post->activo = false;
        }

        $post -> save();
        

        //IMAGEN
        //se guarda en la carpeta storage/app/public/posts/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/posts');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->titulo,
                'relevancia' => 1,
                'resolucion' => 'no se',
                'tipo' => 'imagen',
                'tamano' => 'no se',
                'multimediaable_id' => $post->id,
                'multimediaable_type' => 'App\Models\Post',
                'activo' => true,
            ]);

        }

        session()->flash('exito', 'El post fue editado.');
        return redirect() -> route('posts.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        // buscamos todos los registros multimedia asociados a ese post
        // Multimedia::where('multimediaable_type', 'App\Models\Post')->where('multimediaable_id', $post->id)->delete();
        $multimedias = Multimedia::where('multimediaable_type', 'App\Models\Canasta')->where('multimediaable_id', $post->id)->get();
        
        foreach($multimedias as $multimedia ) {
            //se cambia la url relativa por la url del directorio
            $url = str_replace('storage', 'public', $multimedia->url);
            
            // elimina de la carpeta
            Storage::delete($url);

            // Se eliminan de la base de datos las imagenes relacionadas al producto
            $multimedia->delete();
            
        }


        $post->delete();
        session()->flash('exito', 'El post fue eliminado.');

        return redirect() -> route('posts.index');
    }




}
