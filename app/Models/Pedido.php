<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;



    /**
     * Devuelve un elemento del modelo Canasta que se vinculan a esta instancia de Pedido
     * relacion uno a muchos (inversa)
     * testeado tinker exitoso
     * @var Canasta
     */
    public function canasta(){
        return $this->belongsTo('App\Models\Canasta');
    }



    /**
     * Devuelve un elemento del modelo User que se vinculan a esta instancia de Pedido
     * relacion uno a muchos (inversa)
     * testeado tinker exitoso
     * @var User
     */
    // Relacion uno a muchos (inversa)
    // testeado tinker exitoso
    public function user(){
        //$user = User::where('id', $this->user_id)->first();
        //return $this->belongsTo('App\Models\User', 'id', $this->user_id);
        return $this->belongsTo('App\Models\User');
    }



    /**
     * Devuelve un elemento del modelo Costo_de_envio que se vinculan a esta instancia de Pedido
     * relacion uno a muchos (inversa)
     * testeado tinker exitoso
     * @var Costo_de_envio
     */
    // Relacion uno a muchos (inversa)
    // testeado tinker exitoso
    public function costo_de_envio(){
        return $this->belongsTo('App\Models\Costo_de_envio');
    }



    /**
     * Devuelve un elemento del modelo Cupon que se vinculan a esta instancia de Pedido
     * relacion uno a muchos (inversa)
     * testeado tinker exitoso
     * @var Cupon
     */
    public function cupon(){
        return $this->belongsTo('App\Models\Cupon');
    }



    /**
     * Devuelve un array de elementos del modelo Producto que se vinculan a esta instancia de Pedido
     * relacion muchos a muchos
     * testeado tinker exitoso
     * @var array Producto
     */
    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }


}
