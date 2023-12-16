<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        // TODO: la lista de productos que se manda al front debe contener al menos 3 elementos
        
        return $productos;
    }


}
