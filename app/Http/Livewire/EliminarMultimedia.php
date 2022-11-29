<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class EliminarMultimedia extends Component
{

    public $multimedia;
    // este metodo es necesario para traer una variable desde el frontend
    public function mount(Multimedia $multimedia)
    {
        $this->multimedia = $multimedia;
    }


    public function eliminar(){
        //se cambia la url relativa por la url del directorio
        $url = str_replace('storage', 'public', $this->multimedia->url);
            
        // elimina de la carpeta
        Storage::delete($url);

        // Se eliminan de la base de datos las imagenes relacionadas al producto
        $this->multimedia->delete();
    }


    public function render()
    {
        return view('livewire.eliminar-multimedia');
    }
}
