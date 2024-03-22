<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'texto', 'comentarioable_id', 'comentarioable_type'];


    /**
     * Devuelve un elemento al que apunta el Comentario
     * 
     * testeado tinker exitoso
     * 
     */
    public function comentarioable(){
        return $this->morphTo();
    }


}
