<div>
    
    <div class="container text-white">
        <h3>Actualizar tus datos</h3>
        <p>auth()->user()->name: {{auth()->user()->name}}</p>
        <p>nombre: {{$name}}</p>
        <p>email: {{$email}}</p>

        <input type="text" wire:model="name" value="{{auth()->user()->name}}">
        <input type="text" wire:model="email" value="{{auth()->user()->email}}">
        
        <button class="btn btn-outline-success" wire:click="guardar">Guardar</button>
        
    </div>



    <div class="container text-white">
        <h3>Cambiar contraseña</h3>
        <input type="text" wire:model="password" placeholder="nueva contraseña">
        <input type="text" wire:model="password_confirmation" placeholder="confirmar la nueva contraseña">

        <button class="btn btn-outline-success" wire:click="actualizar_contrasena">actualizar contraseña</button>

    </div>




</div>
