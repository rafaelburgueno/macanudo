<div>
    
    <div class="">


        <!-- Foto -->
        <div class="form-group mb-3">
            <label for="photo" class="negro">Foto de perfil: </label>
            
            @if ($photo)
                <div class="text-center mb-2">
                    <img class="w-25 rounded-circle" id="imagen_de_perfil_temporal" src="{{ $photo->temporaryUrl() }}">
                </div>
            @endif
                
            @if($usuario->profile_photo_path)
                <div class="mb-2">
                    <p class="my-0 py-0 small text-danger eliminar_foto" wire:click="eliminar_foto">¿Eliminar tu foto de perfil?</p>
                </div>                
            @endif

            @if (session()->has('foto_eliminada'))
                <div class="text-center">
                    <div class="my-3 alert alert-success">
                        {{ session('foto_eliminada') }}
                    </div>
                </div>
            @endif

            <input type="file" class="form-control p-1 m-0" wire:model="photo">

            @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        





        <!-- Nombre -->
        <div class="form-group mb-3">
            <label for="nombre" class="negro">Nombre completo: </label>
            <input type="text" pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{6,100}" class="form-control" name="nombre" wire:model="nombre" id="nombre" placeholder="Ingrese su nombre completo">
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
            <label for="email" class="negro">Email: </label>
            <input type="email" class="form-control" name="email" wire:model="email" id="email" placeholder="Ingrese su Email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>


        <!-- Fecha de Nacimiento -->
        <div class="form-group mb-3">
            <label for="fecha_de_nacimiento" class="negro">Fecha de nacimiento:</label>
            <input type="date" class="form-control" min="{{ date('Y-m-d', strtotime('-120 years')) }}" max="{{ date('Y-m-d', strtotime('-18 years')) }}" name="fecha_de_nacimiento" wire:model="fecha_de_nacimiento" id="fecha_de_nacimiento" placeholder="Ingrese su fecha de nacimiento">
            @error('fecha_de_nacimiento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Ingredientes que no consumo -->
        <div class="form-group mb-3">
            <label for="ingredientes_que_no_consumo" class="negro">
                    Si hay algún ingrediente que no quieres o no puedes consumir indícanos cuál es así lo 
                    podremos tener en cuenta al armar tus pedidos:
            </label>
            <textarea type="text" class="form-control" id="ingredientes_que_no_consumo" name="ingredientes_que_no_consumo" wire:model="ingredientes_que_no_consumo" rows="2" placeholder="Por ejemplo: No consumo ajo, no puedo consumir semillas enteras, no me gusta el roquefort."></textarea>
        </div>



        {{-- TODO: desarrollar el guardado de estos datos --}}
        {{--<div class="form-group mb-3">
            <label for="nContacto">Número de contacto: </label>
            <input type="text" class="form-control" id="nContacto"
                placeholder="Ingrese su número de contacto" required>
        </div>
        <div class="form-group mb-3">
            <label for="nContactoAlt">Contacto alternativo: </label>
            <input type="text" class="form-control" id="nContactoAlt"
                placeholder="Ingrese su número de contacto" required>
        </div>
        <div class="form-group mb-3">
            <label for="nCedula">Número de cédula: </label>
            <input type="text" class="form-control" id="nCedula"
                placeholder="Ingrese su número de contacto" required>
        </div>--}}




        <label for="password" class="negro">Contraseña: </label>
        <div class="form-row mb-3">
            <div class="col-sm-6 form-group mb-0">
                <input type="password" class="mx-0 form-control password_confirmacion" name="password" wire:model="password" id="password" placeholder="Contraseña">
            </div>
            
            <div class="col-sm-6 form-group mb-0 mt-1">
                <input type="password" class="mx-0 form-control password_confirmacion " wire:model="password_confirmation" placeholder="Confirmar contraseña">
            </div>
            @error('password') <span class="mx-1 text-danger">{{ $message }}</span> @enderror
        </div>
        
        <hr class="w-50 mt-4">

        <div class="text-center">
            {{--{!! $respuesta !!}--}}
            @if (session()->has('exito'))
                <div class="my-3 alert alert-success">
                    {{ session('exito') }}
                </div>
            @endif

            <button class="btn1 btn-azul shadown btn-procesando actualizar_nombre" wire:click="guardar">Guardar</button>
        </div>

        

        
    </div>



    {{--
    <div class="mb-4 mt-5">
        <hr class="w-50 mt-4">

        <div class="text-center">
            <button class="btn1 btn-azul  shadown btn-procesando" wire:click="actualizar_contrasena">Actualizar contraseña</button>
        </div>
    </div>
    --}}




</div>
