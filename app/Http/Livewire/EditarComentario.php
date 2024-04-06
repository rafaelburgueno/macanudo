<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;

class EditarComentario extends Component
{

    public $comentario;

    public function mount(Comentario $comentario){

        $this->comentario = $comentario;
    }

    public function render()
    {
        return view('livewire.editar-comentario');
    }
}
