<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Favorito;

class EstablecerFavorito extends Component
{

    public $producto;
    public $user_id;

    // creo una variable para determinar si un elemento es favorito o no
    public $esFavorito = false;


    public function mount(Producto $producto, $user_id)
    {
        $this->producto = $producto;
        $this->user_id = $user_id;

        // verifico si el producto es favorito
        $this->esFavorito = $producto->esFavorito($user_id);

    }


    public function agregarAFavoritos()
    {
        // verifico si el producto es favorito
        if($this->esFavorito){
            // si es favorito lo elimino
            Favorito::where('favoritable_type', 'App\Models\Producto')->where('favoritable_id', $this->producto->id)
                ->where('user_id', $this->user_id)
                ->delete();
            $this->esFavorito = false;
        }else{
            // si no es favorito lo agrego
            Favorito::create([
                'favoritable_id' => $this->producto->id,
                'favoritable_type' => 'App\Models\Producto',
                'user_id' => $this->user_id,
            ]);
            $this->esFavorito = true;
        }
        //$this->esFavorito = ! $this->esFavorito;
    }









    public function render()
    {
        return view('livewire.establecer-favorito');
    }








}
