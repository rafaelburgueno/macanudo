<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;


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
        // la siguiente instruccion obtiene todos los comentarios de un post
        //$this->comentarios = $post->comentarios;
        // la siguiente instruccion obtiene todos los comentarios activos de un post
        $this->comentarios = $post->comentariosActivos;

        $this->nombre = "";
        $this->email = "";
        $this->texto = "";


    }



    protected function rules()
    {
        return [
            /*'nombre' => [
                'required',
                'max:255',
                //Rule::unique('categorias', 'nombre')
            ],
            'email' => 'required|email',*/
            'texto' => 'required|max:255',
        ];
    }


    // **************************************************
    // Crear comentario
    // **************************************************
    public function save()
    {
        $this->validate();
        
        // obtengo el nombre del usuario logueado
        $this->nombre = auth()->user()->name;
        // obtengo el email del usuario logueado
        $this->email = auth()->user()->email;

        Comentario::create([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'texto' => $this->texto,
            'comentarioable_id' => $this->post->id,
            'comentarioable_type' => 'App\Models\Post',
            'activo' => '0',
            'calificacion' => '0',
        ]);

        // Log para resgistrar la creacion de un comentario
        Log::notice('Nuevo comentario en el blog. Nombre: ' . $this->nombre . '. Email: ' . $this->email . '. Texto: ' . $this->texto . '.');
        
        // emite evento para informar a la vista de que se ha creado una nueva categoria
        $this->emit('comentarioCreado');
        
        
        //$this->categorias_collection = Categoria::all();

        $this->nombre = "";
        $this->email = "";
        $this->texto = "";
    }



}
