<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class CrearYEditarCategorias extends Component
{

    public $nombreCategoria;
    public $category_id;
    public $categorias;

    

    public function render(){
        return view('livewire.crear-y-editar-categorias');
    }

    public function mount($categorias){
        $this->categorias = $categorias;
    }



    // **************************************************
    // Crear
    // **************************************************
    public function save()
    {
        /*$this->validate([
            'nombreCategoria' => 'required',
        ]);

        if ($this->category_id) {
            $category = Category::find($this->category_id);
            $category->update([
                'nombreCategoria' => $this->nombreCategoria,
            ]);
        } else {
            Category::create([
                'nombreCategoria' => $this->nombreCategoria,
            ]);
        }

        // Reset fields
        $this->reset(['nombreCategoria', 'category_id']);*/
    }



    // **************************************************
    // Editar
    // **************************************************
    public function edit($id)
    {
        /*$category = Category::find($id);
        $this->nombreCategoria = $category->nombreCategoria;
        $this->category_id = $category->id;*/
    }





}
