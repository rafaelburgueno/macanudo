<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use Illuminate\Validation\Rule;

class EditarComentario extends Component
{

    public $comentarioId;
    public $comentario;
    public $nombre;
    public $email;
    public $texto;
    public $calificacion;
    public $activo; 


    public function mount($comentarioId){
        $this->comentarioId = $comentarioId;

        $comentario = Comentario::find($comentarioId);
        $this->comentario = $comentario;
        $this->nombre = $comentario->nombre;
        //$this->nombre = "aca estoy";

        $this->email = $comentario->email;
        $this->texto = $comentario->texto;
        $this->calificacion = $comentario->calificacion;
        $this->activo = $comentario->activo;
        

    }



    public function updateComentario(){
        $this->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'texto' => 'required',
            'calificacion' => 'required',
            //'activo' => 'required',
        ]);

        $comentario = Comentario::find($this->comentarioId);
        $this->comentario->update([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'texto' => $this->texto,
            'calificacion' => $this->calificacion,
            'activo' => $this->activo,
        ]);

        //$this->nombre = "aca estoy topu!!!!!!!!!!!";

        $this->emit('comentarioActualizado');
    }


    public function render(){
        return view('livewire.editar-comentario');
    }

    
}
