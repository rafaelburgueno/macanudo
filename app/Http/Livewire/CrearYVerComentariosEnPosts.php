<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use App\Models\Post;


class CrearYVerComentariosEnPosts extends Component
{

    public $post;
    public $comentarios;

    public function render()
    {
        return view('livewire.crear-y-ver-comentarios-en-posts');
    }


    public function mount(Post $post){
        $this->post = $post;
        $this->comentarios = $post->comentarios;

    }



}
