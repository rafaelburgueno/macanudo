<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ActualizarPerfil extends Component
{


    public $name;
    public $email;
    public $password;
 
    public function guardar()
    {
        $usuario = User::find(auth()->id());

        $usuario->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }

    
    public function actualizar_contrasena(){
        $usuario = User::find(auth()->id());

        if(($this->password != '') && ($usuario->password == $usuario->password_confirmation)){
            //$password = Hash::make($request->password);
            $usuario->update([
            'password' => Hash::make($this->password),
            ]);
        }

 
    }




    public function render()
    {
        return view('livewire.actualizar-perfil');
    }
}
