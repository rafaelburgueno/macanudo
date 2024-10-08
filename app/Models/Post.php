<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Post extends Model
{
    use HasFactory;



    /**
     * Get the route key for the model.
     * Esto es para que el slug sea el nombre del post en la url
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }



    /**
     * Devuelve un array de elementos del modelo Comentario, asociados a esa instancia de Post
     * relacion uno(Post) a muchos(Comentario) polimorfica
     * testeado tinker exitoso
     * @var array Comentario
     */
    public function comentarios(){
        return $this->morphMany('App\Models\Comentario', 'comentarioable');
    }


    /**
     * Devuelve un array de elementos del modelo Comentario, asociados a esa instancia de Post, siempre y cuando el campo activo sea true
     * relacion uno(Post) a muchos(Comentario) polimorfica
     * se filtran los comentarios activos
     * testeado tinker exitoso
     * @var array Comentario
     */
    public function comentariosActivos(){
        return $this->morphMany('App\Models\Comentario', 'comentarioable')->where('activo', true)->orderBy('calificacion', 'desc');
    }



    /**
     * Devuelve un array de elementos del modelo Multimedia, asociados a esa instancia de Post
     * relacion uno a muchos polimorfica
     * testeado tinker exitoso
     * @var array Multimedia
     */
    public function multimedias(){
        return $this->morphMany('App\Models\Multimedia', 'multimediaable');
    }



    /**
     * Devuelve un array de elementos del modelo Categoria, asociados a esa instancia de Post
     * relacion uno a muchos polimorfica
     * testeado tinker exitoso
     * @var array Categoria
     */
    public function categorias(){
        return $this->morphToMany('App\Models\Categoria', 'categoriaable');
    }    



    /**
     * Devuelve una coleccion de elementos del modelo Producto, asociados a esa instancia de Post
     * se traen las categrias asignadas al post y luego se buscan los productos asociados a esas categorias
     * se eliminan los duplicados y se devuelve la coleccion
     */
    public function productos_asociados(){
        $categorias = $this->categorias;
        $productos = collect();
        foreach ($categorias as $categoria) {
            $productos = $productos->merge($categoria->productos);
        }
        $productos = $productos->unique('id');

        // la lista de productos que se manda al front deben ser productos activos
        $productos = $productos->where('activo', true);

        //la lista de productos que se manda al front deben ser productos con stock
        $productos = $productos->where('stock', '>', 0);
        
        // La lista de productos que se manda al front debe contener al menos 3 elementos
        // si no hay 3 elementos, se agregan productos
        if($productos->count() < 3){
            $i = 0;
            while($productos->count() < 3){
                // se agregan productos al azar
                $productos = $productos->merge(Producto::inRandomOrder()->where('activo', true)->where('stock', '>', 0)->limit(3)->get());

                $productos = $productos->unique('id');

                // si no sale del bucle en 10 iteraciones, se sale del bucle
                $i++;
                if($i > 15){
                    break;
                }

            }
        }

        // limitar la cantidad de productos a 3
        $productos = $productos->take(3);

        // reordena de forma aleatoria los elementos de la coleccion $productos
        $productos = $productos->shuffle();

        
        return $productos;
    }


    /**
     * el siguiente metodo se utiliza para obtener el posts inmediatamente anterior y posterior segun la fecha de creacion de un post dado
    */
    public function getPreviousPost(){
        return Post::where('created_at', '<', $this->created_at)->orderBy('created_at', 'desc')->first();
    }

    public function getNextPost(){
        return Post::where('created_at', '>', $this->created_at)->orderBy('created_at', 'asc')->first();
    }


    /** 
     * el siguiente metodo se utiliza para obtener tres posts distintos al post dado
     */
    public function getThreeDifferentPosts(){
        return Post::where('id', '!=', $this->id)->inRandomOrder()->limit(3)->get();
    }



}
