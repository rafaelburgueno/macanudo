<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Validation\Rule;


class CrearYVerComentariosEnPosts extends Component
{

    public $post;
    public $comentarios;

    // variables necesarias para crear el comentario
    public $nombre;
    public $email;
    public $texto;



    public function render()
    {
        return view('livewire.crear-y-ver-comentarios-en-posts');
    }


    public function mount(Post $post){
        $this->post = $post;
        $this->comentarios = $post->comentarios;

        $this->nombre = "";
        $this->email = "";
        $this->texto = "";


    }



    protected function rules()
    {
        return [
            'nombre' => [
                'required',
                'max:255',
                //Rule::unique('categorias', 'nombre')
            ],
            'email' => 'required|email',
            'texto' => 'required|max:255',
        ];
    }


    // **************************************************
    // Crear comentario
    // **************************************************
    public function save()
    {
        $this->validate();
        
        Comentario::create([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'texto' => $this->texto,
        ]);
        
        // emite evento para informar a la vista de que se ha creado una nueva categoria
        $this->emit('comentarioCreado');
        
        
        //$this->categorias_collection = Categoria::all();

        $this->nombre = "";
        $this->email = "";
        $this->texto = "";
    }



}
