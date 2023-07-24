<div class="">
    
    <div class="">
        {{--<h3>Actualizar tus datos</h3>
        <p>auth()->user()->name: {{auth()->user()->name}}</p>
        <p>nombre: {{$name}}</p>
        <p>email: {{$email}}</p>--}}

        <div class="form-group mb-4">
            <label for="name" class="negro">Nombre y apellido <small>(Obligatorio)</small>: </label>
            <input type="text" pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{6,100}" class="form-control" name="name" wire:model="name">
        </div>

        <div class="form-group mb-4">
            <label for="email" class="negro">Email <small>(Obligatorio)</small>: </label>
            <input type="email" class="form-control" name="email" wire:model="email">
        </div>



        
        <div class="form-group mb-4">
            <label for="nContacto">Número de contacto: </label>
            <input type="text" class="form-control" id="nContacto"
                placeholder="Ingrese su número de contacto" required>
        </div>
        <div class="form-group mb-4">
            <label for="nContactoAlt">Contacto alternativo: </label>
            <input type="text" class="form-control" id="nContactoAlt"
                placeholder="Ingrese su número de contacto" required>
        </div>
        <div class="form-group mb-4">
            <label for="nCedula">Número de cédula: </label>
            <input type="text" class="form-control" id="nCedula"
                placeholder="Ingrese su número de contacto" required>
        </div>
        
        





        <button class="btn1 btn-azul shadown btn-procesando btn-block" wire:click="guardar">Guardar</button>
        
    </div>



    <div class="my-4">
        <div class="form-group mb-3">
            <label for="password" class="negro">Contraseña: </label>
            <input type="password" class="form-control password_confirmacion" wire:model="password" placeholder="nueva contraseña">
        </div>

        <div class="form-group mb-3">
            <input type="password" class="form-control password_confirmacion " wire:model="password_confirmation" placeholder="confirmar la nueva contraseña">
        </div>

        <button class="btn1 btn-azul shadown btn-procesando btn-block" wire:click="actualizar_contrasena">actualizar contraseña</button>

    </div>




</div>
