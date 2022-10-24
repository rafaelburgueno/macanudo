<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $guarded = [];

    use HasFactory;



    /**
     * Devuelve el elementos que se vincula a esta instancia de Multimedia
     * 
     * testeado tinker exitoso
     * @var 
     */
    public function multimediaable(){
        return $this->morphTo();
    }


}
