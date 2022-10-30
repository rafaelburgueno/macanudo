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


}
