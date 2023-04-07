<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\User;

class Suscripcion extends Model
{
    use HasFactory;


    protected $fillable = [
        'tipo',
        'precio',
        'user_id',
        'direccion_de_entrega',
        'telefono',
        'cantidad_de_canastas',
        'fecha_de_inicio',
        'fecha_de_renovacion',
        'cantidad_de_quesos',
        'dia_de_entrega',
        'activo',
    ];


    
    public function user()
    {
        return $this->belongsTo(User::class);
        //return $this->belongsTo('App\Models\User'); //esta forma de llamar al modelo tambien funciona
    }


    /**
     * Devuelve un array de elementos del modelo Pedido que se vinculan a esta instancia de Suscripcion
     * relacion uno a muchos
     * @var array Pedido
     */
    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }


}
