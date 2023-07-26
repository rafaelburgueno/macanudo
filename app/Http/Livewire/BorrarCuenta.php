<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BorrarCuenta extends Component
{

    public $password;
    public $respuesta = '';

    public function verificar()
    {
        if (Hash::check($this->password, Auth::user()->password)) {
            
            $this->respuesta = '<div class="mt-3 text-center"><p>¿Está seguro de que desea eliminar su cuenta?</p><button class="btn1 btn-rojo shadown" wire:click="borrarCuenta">Si, eliminar</button></div><script>$(document).ready(function(){$(".btn-borrar-cuenta").hide();});</script>';

        } else {
            $this->addError('password', 'Contraseña incorrecta');
        }
    }

    public function borrarCuenta()
    {
        if (Hash::check($this->password, Auth::user()->password)) {
            Auth::user()->delete();
            
            session()->flash('exito', 'Su cuenta fue borrada exitosamente.');
            return redirect('/');
        } else {
            $this->addError('password', 'Contraseña incorrecta');
        }
    }

    


    public function render()
    {
        return view('livewire.borrar-cuenta');
    }
}
