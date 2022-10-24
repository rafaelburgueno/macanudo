<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;



    /**
     * Devuelve un array de elementos del modelo Pedido, asociados a esa instancia de Cupon
     * relacion uno a muchos
     * testeado tinker exitoso
     * @var array Pedido
     */
    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }



}
