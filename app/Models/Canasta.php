<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canasta extends Model
{
    use HasFactory;


    /**
     * Devuelve un array de elementos del modelo Pedido que se vinculan a esta instancia de Canasta
     * relacion uno a muchos
     * testeado tinker exitoso
     * @var array Pedido
     */
    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }



    /**
     * Devuelve un array de elementos del modelo Producto que forman parte de esta instancia de Canasta
     * relacion muchos a muchos
     * testeado tinker exitoso
     * @var array Producto
     */
    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }



    /**
     * Devuelve un array de elementos del modelo Comentario que se vinculan a esta instancia de Canasta
     * relacion uno a muchos polimorfica
     * testeado tinker exitoso
     * @var array Comentario
     */
    public function comentarios(){
        return $this->morphMany('App\Models\Comentario', 'comentarioable');
    }



    /**
     * Devuelve un array de elementos del modelo Multimedia que se vinculan a esta instancia de Canasta
     * relacion uno a muchos polimorfica
     * testeado tinker exitoso
     * @var array Multimedia
     */
    public function multimedias(){
        return $this->morphMany('App\Models\Multimedia', 'multimediaable');
    }



    /**
     * Devuelve un array de elementos del modelo Categoria que se vinculan a esta instancia de Canasta
     * relacion uno a muchos polimorfica
     * testeado tinker exitoso
     * @var array Categoria
     */
    public function categorias(){
        return $this->morphToMany('App\Models\Categoria', 'categoriaable');
    }    


}
