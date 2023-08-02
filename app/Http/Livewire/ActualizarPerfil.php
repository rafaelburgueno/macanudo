<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
//use Creativeorange\Gravatar\Facades\Gravatar;
//use Gravatar;


class ActualizarPerfil extends Component
{

    use WithFileUploads;
    public $photo;
    
    public $usuario;
    public $nombre;
    public $email;
    public $password;
    public $password_confirmation;
    public $fecha_de_nacimiento;
    public $ingredientes_que_no_consumo;
    public $respuesta = '';
    //public $gravatar;

    

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
            'photo' => 'nullable|image|max:2048',
        ];
    }

    public function mount()
    {
        //$this->usuario = User::find(auth()->id());
        $usuario = Auth::user();

        $this->usuario = $usuario;
        $this->nombre = $usuario->name;
        $this->email = $usuario->email;
        $this->fecha_de_nacimiento = $usuario->fecha_de_nacimiento;
        $this->ingredientes_que_no_consumo = $usuario->ingredientes_que_no_consumo;
        //$this->photo = $usuario->profile_photo_path;
        //$this->gravatar = Gravatar::get(Auth::user()->email, ['size' => 100]);
    }
 





    public function guardar()
    {
        $this->validate();



        if ($this->photo) {
            $this->usuario->update([
                'profile_photo_path' => $this->photo->store('profile-photos', 'public'),
            ]);
        }


        //si el usuario escribe un password, revisa que coincida con la confirmacion
        if($this->password != '' && $this->password == $this->password_confirmation){
            $this->usuario->update([
                'password' => Hash::make($this->password),
            ]);
        }


        // si la fecha de nacimiento no es tipo date o es null, la convierte a null
        if($this->fecha_de_nacimiento != null){
            $this->fecha_de_nacimiento = date('Y-m-d', strtotime($this->fecha_de_nacimiento));
        }else{
            $this->fecha_de_nacimiento = null;
        }



        $this->usuario->update([
            'name' => $this->nombre,
            'email' => $this->email,
            'fecha_de_nacimiento' => $this->fecha_de_nacimiento,
            'ingredientes_que_no_consumo' => $this->ingredientes_que_no_consumo,
        ]);
        
        $this->respuesta = '<div class="my-3 text-success"><strong>Perfil actualizado exitosamente.</strong></div>';
    
        session()->flash('exito', 'Perfil actualizado exitosamente.');
        
    }


    // metodo para eliminar la foto de perfil
    public function eliminar_foto()
    {
        // elimina la foto de la carpeta storage/app/public/profile-photos
        \Storage::disk('public')->delete($this->usuario->profile_photo_path);
        

        $this->usuario->update([
            'profile_photo_path' => null,
        ]);

        $usuario = Auth::user();
        $this->usuario = $usuario;

        $this->photo = null;
        session()->flash('foto_eliminada', 'La foto de perfil fue aliminada.');
    }
       



    public function render()
    {
        return view('livewire.actualizar-perfil');
    }
}
