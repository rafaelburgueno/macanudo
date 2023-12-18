<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CrearYEditarCategorias extends Component
{

    public $nombreCategoria;
    public $descripcionCategoria;
    public $category_id;
    public $categorias_collection;
    public $respuestaCategoria = "";
    public $categoriaable_id;
    public $categoriaable_type;

    

    public function render(){
        return view('livewire.crear-y-editar-categorias');
    }

    public function mount($categoriaable_id, $categoriaable_type){
        //$this->categorias_collection = $categorias_collection;
        $this->categorias_collection = Categoria::all();
        $this->categoriaable_id = $categoriaable_id;
        $this->categoriaable_type = $categoriaable_type;
    }



    protected function rules()
    {
        return [
            'nombreCategoria' => [
                'required',
                'max:50',
                Rule::unique('categorias', 'nombre')
            ],
            'descripcionCategoria' => 'nullable|max:100',
        ];
    }



    // **************************************************
    // Crear
    // **************************************************
    public function save()
    {
        //session()->forget('exitoNuevaCategoria');
        
        $this->validate();

        Categoria::create([
            'nombre' => $this->nombreCategoria,
            'descripcion' => $this->descripcionCategoria,
        ]);

        // emite evento para informar a la vista de que se ha creado una nueva categoria
        $this->emit('categoriaCreada', $this->nombreCategoria);
        
        $this->categorias_collection = Categoria::all();
    }



    // **************************************************
    // Eliminar
    // **************************************************
    public function delete($id)
    {
        
        $category = Categoria::find($id);
        $nombreCategoria = $category->nombre;
        $category->delete();

        $this->emit('categoriaEliminada', $nombreCategoria);

        $this->categorias_collection = Categoria::all();
    }


    // **************************************************
    // vincular / desvincular
    // TODO: emitir repetidamente una alerta de exito
    // **************************************************
    public function vincularDesvincular($id)
    {
        $categoriaable = DB::table('categoriaables')
            ->where('categoria_id', $id)
            ->where('categoriaable_id', $this->categoriaable_id)
            ->where('categoriaable_type', $this->categoriaable_type)
            ->first();




        if($categoriaable){
            DB::table('categoriaables')->where('id', $categoriaable->id)->delete();
            
            $this->emit('vincularDesvincular', 'Desvinculado correctamente.');

        }else{
            DB::table('categoriaables')->insert([
                'categoria_id' => $id,
                'categoriaable_id' => $this->categoriaable_id,
                'categoriaable_type' => $this->categoriaable_type,
            ]);

            $this->emit('vincularDesvincular', 'Vinculado correctamente.');
            
        }
    }


}
