<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        return $this->belongsToMany('App\Models\Producto')->withPivot('unidades');;
    }



    /**
     * Devuelve un array de strings con la lista de elementos del modelo Producto que se vinculan a esta instancia de Pedido
     * 
     * NO SE ESTA USANDO ESTE METODO
     * @var array String
     */
    public function listaDeProductos(){

        $pedido = Pedido::with('productos')->find($this->id); 
        $lista_de_productos = $pedido->productos; 

        //$lista_de_productos = array();

        //$pedido_producto = $this->belongsToMany('App\Models\Producto');
        //$productos_del_pedido = DB::table('pedido_producto')->where('pedido_id', $this->id)->get();


        //dd($productos_del_pedido);
        //var_dump($productos_del_pedido);

        /*foreach($productos_del_pedido as $producto){

            array_push($lista_de_productos, $producto->producto_id);

            /*if (!in_array($producto->nombre, $lista_de_productos)) {
                array_push($lista_de_productos, $producto->nombre);
            }*/

        //}

        //return $productos_del_pedido;
        return $lista_de_productos;

    }



}
