<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costo_de_envio extends Model
{
    use HasFactory;



    /**
     * Devuelve un array de elementos del modelo Pedido, asociados a esa instancia de Costo_de_envio
     * esta funcion es necesaria para poder hacer consultas de los pedidos que se han realizado desde una zona especifica
     * relacion uno a muchos
     * testeado tinker exitoso
     * @var array Pedido
     */
    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }


}
