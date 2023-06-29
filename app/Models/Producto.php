<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Favorito;

class Producto extends Model
{
    use HasFactory;


    /**
     * Devuelve un array de elementos del modelo Canasta que se vinculan a esta instancia de Producto
     * relacion muchos a muchos
     * testeado tinker exitoso
     * @var array Canasta
     */
    public function canastas(){
        return $this->belongsToMany('App\Models\Canasta');
    }



    /**
     * Devuelve un array de elementos del modelo Pedido que se vinculan a esta instancia de Producto
     * relacion muchos a muchos
     * testeado tinker exitoso
     * @var array Pedido
     */
    public function pedidos(){
        return $this->belongsToMany('App\Models\Pedido');
    }



    /**
     * Devuelve un array de elementos del modelo Comentario que se vinculan a esta instancia de Producto
     * relacion uno a muchos polimorfica
     * testeado tinker exitoso
     * @var array Comentario
     */
    public function comentarios(){
        return $this->morphMany('App\Models\Comentario', 'comentarioable');
    }



    /**
     * Devuelve un array de elementos del modelo Multimedia que se vinculan a esta instancia de Producto
     * relacion uno a muchos polimorfica
     * testeado tinker exitoso
     * @var array Multimedia
     */
    public function multimedias(){
        return $this->morphMany('App\Models\Multimedia', 'multimediaable');
    }


    /**
     * Devuelve un array de elementos del modelo Categoria que se vinculan a esta instancia de Producto
     * relacion uno a muchos polimorfica
     * testeado tinker exitoso
     * @var array Categoria
     */
    public function categorias(){
        return $this->morphToMany('App\Models\Categoria', 'categoriaable');
    }    

    /*
        este metodo devuelve true o false si el producto es favorito o no
        recibe como parametro el id del usuario
    */
    public function esFavorito($user_id){
        // verifico si el producto es favorito
        $favorito = Favorito::where('favoritable_type', 'App\Models\Producto')->where('favoritable_id', $this->id)
            ->where('user_id', $user_id)
            ->first();

        if ($favorito) {
            return true;
        } else {
            return false;
        }
    }

     /**
     * Devuelve un int con el campo 'unidades' de la tabla pivote pedido_producto
     * relacion uno a muchos polimorfica
     * testeado tinker exitoso
     * @var int
     */
    /*public function unidades($pedido_id){

        $unidades = DB::table('pedido_producto')->where('producto_id', $this->id)->where('pedido_id', $pedido_id)->first()->unidades;
        //dd($unidades);
        return $unidades;
    }   */ 


}
