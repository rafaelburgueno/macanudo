<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'texto', 'comentarioable_id', 'comentarioable_type', 'calificacion', 'activo'];


    /**
     * Devuelve un elemento al que apunta el Comentario
     * 
     * testeado tinker exitoso
     * 
     */
    public function comentarioable(){
        return $this->morphTo();
    }


    /**
     * Devuelve el nombre o titulo del elemento al que apunta el Comentario
     * ya sea un Post, Comentario o un Producto
     * 
     * testeado tinker exitoso
     * 
     */
    public function getElementoAlQueApunta(){
        /*TODO: hacer que devuelva el nombre o titulo del elemento 
        al que apunta el Comentario, ya sea un Post, Comentario o un Producto*/

        if($this->comentarioable_type == "App\Models\Post"){
            return 'Post: ' . $this->comentarioable->titulo;
            //return Post::find($this->comentarioable_id)->titulo;
        }elseif($this->comentarioable_type == "App\Models\Producto"){
            return 'Producto: ' . $this->comentarioable->nombre;
        }else{
            return $this->comentarioable_type;

        }
        
        //return "holander";
        
    }


}
