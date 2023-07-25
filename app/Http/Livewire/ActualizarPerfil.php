<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ActualizarPerfil extends Component
{

    
    public $nombre;
    public $email;
    public $password;
    public $password_confirmation;
    public $fecha_de_nacimiento;
    public $ingredientes_que_no_consumo;
    public $respuesta = '';

    protected function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->id())
            ],
            'fecha_de_nacimiento' => 'nullable|date',
            'password' => 'nullable|min:8|confirmed',
        ];
    }

    public function mount()
    {
        $usuario = User::find(auth()->id());

        $this->nombre = $usuario->name;
        $this->email = $usuario->email;
        $this->fecha_de_nacimiento = $usuario->fecha_de_nacimiento;
        $this->ingredientes_que_no_consumo = $usuario->ingredientes_que_no_consumo;
    }
 





    public function guardar()
    {
        $this->validate();

        $usuario = User::find(auth()->id());

        // revisa si el email ya existe en la base de datos
        /*$email_existe = User::where('email', $this->email)->first();
        if($email_existe){
            if($email_existe->id != $usuario->id){
                $this->respuesta = '<div class="my-3 text-danger"><strong>El email ya existe en nuestra base de datos.</strong></div>';
                return;
            }
        }*/


        //si el usuario escribe un password, revisa que coincida con la confirmacion
        if($this->password != '' && $this->password == $this->password_confirmation){
            $usuario->update([
                'password' => Hash::make($this->password),
            ]);
        }


        // si la fecha de nacimiento no es tipo date o es null, la convierte a null
        if($this->fecha_de_nacimiento != null){
            $this->fecha_de_nacimiento = date('Y-m-d', strtotime($this->fecha_de_nacimiento));
        }else{
            $this->fecha_de_nacimiento = null;
        }



        $usuario->update([
            'name' => $this->nombre,
            'email' => $this->email,
            'fecha_de_nacimiento' => $this->fecha_de_nacimiento,
            'ingredientes_que_no_consumo' => $this->ingredientes_que_no_consumo,
        ]);
        
        $this->respuesta = '<div class="my-3 text-success"><strong>Perfil actualizado exitosamente.</strong></div>';
    
        session()->flash('exito', 'Perfil actualizado exitosamente.');
        
    }

    
    /*public function actualizar_contrasena($usuario){
        //$usuario = User::find(auth()->id());
        if(($this->password != '') && ($usuario->password == $usuario->password_confirmation)){
            //$password = Hash::make($request->password);
            $usuario->update([
            'password' => Hash::make($this->password),
            ]);
        }
    }*/




    public function render()
    {
        return view('livewire.actualizar-perfil');
    }
}
