<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = ['nombre', 'descripcion'];


    /**
     * Devuelve un array de elementos del modelo Canasta, asociados a esa instancia de categoria
     * relacion muchos a muchos polimorfica inversa
     * testeado tinker exitoso
     * @var array Canasta
     */
    public function canastas(){
        return $this->morphedByMany('App\Models\Canasta', 'categoriaable');
    }



    /**
     * Devuelve un array de elementos del modelo Post, asociados a esa instancia de categoria
     * relacion muchos a muchos polimorfica inversa
     * testeado tinker exitoso
     * @var array Post
     */
    public function posts(){
        return $this->morphedByMany('App\Models\Post', 'categoriaable');
    }



    /**
     * Devuelve un array de elementos del modelo Producto, asociados a esa instancia de categoria
     * relacion muchos a muchos polimorfica inversa
     * testeado tinker exitoso
     * @var array Producto
     */
    public function productos(){
        return $this->morphedByMany('App\Models\Producto', 'categoriaable');
    }



    /**
     * Devuelve un booleano indicando si la categoria esta vinculada a un producto, post o canasta dada.
     * recibe como parametros el categoriaable_id y categoriaable_type
     * @var boolean
     */
    public function estaVinculada($categoriaable_id, $categoriaable_type){
        $categoriaable = DB::table('categoriaables')
            ->where('categoria_id', $this->id)
            ->where('categoriaable_id', $categoriaable_id)
            ->where('categoriaable_type', $categoriaable_type)
            ->first();

        /*$categoria = Categoria::whereHasMorph('categoriaable', $categoriaable_type, function ($query) use ($categoriaable_id) {
            $query->where('id', $categoriaable_id);
        })->first();*/
        
        if($categoriaable){
            return true;
        }else{
            return false;
        }

    }



}
