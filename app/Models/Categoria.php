<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;


    /**
     * Devuelve un array de elementos del modelo Canasta, asociados a esa instancia de categoria
     * relacion muchos a muchos polimorfica inversa
     * testeado tinker exitoso
     * @var array Canasta
     */
    public function canastas(){
        return $this->morphedByMany('App\Models\Canasta', 'categoriaable');
    }



    /**
     * Devuelve un array de elementos del modelo Post, asociados a esa instancia de categoria
     * relacion muchos a muchos polimorfica inversa
     * testeado tinker exitoso
     * @var array Post
     */
    public function posts(){
        return $this->morphedByMany('App\Models\Post', 'categoriaable');
    }



    /**
     * Devuelve un array de elementos del modelo Producto, asociados a esa instancia de categoria
     * relacion muchos a muchos polimorfica inversa
     * testeado tinker exitoso
     * @var array Producto
     */
    public function productos(){
        return $this->morphedByMany('App\Models\Producto', 'categoriaable');
    }


}
