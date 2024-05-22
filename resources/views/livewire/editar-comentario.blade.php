<div>
    
    {{--<tr>
        <td>
            <a class="btn btn-light" data-toggle="modal" data-target="#modal_editar_comentario_{{ $comentario->id }}">{{ $comentario->id }}</a>
        </td>
        <td><small>{{ $nombre }}</small></td>
        <td><small>{{ $email }}</small></td>
        <td><small>{{ Str::limit($texto, 30, '...') }}</small> </td>
        <td><small>{{ $comentario->getElementoAlQueApunta()}}</small></td>
        <td>{{ $calificacion }}</td>
        <td>
            @if($activo)
            SI
            @else
            NO
            @endif
        </td>
        <td><small>{{ $comentario->created_at }}</small></td>
    </tr>--}}

    <!--MODAL para editar el comentario-->
    {{--<div class="modal fade" id="modal_editar_comentario_{{ $comentario->id }}" tabindex="-1" role="dialog" aria-labelledby="modal_editar_comentario_{{ $comentario->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content negro">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="modal_editar_comentario_{{ $comentario->id }}Label">{{$comentario->created_at}} | id:{{$comentario->id}}</h5><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                
                <div class="modal-body ">
                    
                    <small>
                        <p>Nombre: <strong>{{ $nombre }}</strong></p>
                        <p>Email: <strong>{{ $email }}</strong></p>
                        <p>Texto: {{ $texto }}</p>
                        <p>Calificación: {{ $calificacion }}</p>
                        <p>Activo: {{ $activo }}</p>
                    </small>

--}}

                    <form wire:submit.prevent="updateComentario">
                        <div class="row">

                            <!-- editar Nombre -->
                            <div class="col-md-6 form-group ">
                                <label for="nombre_{{ $comentario->id }}">Nombre</label>
                                <input type="text" class="form-control" wire:model="nombre" id="nombre_{{ $comentario->id }}" name="nombre" value="{{$nombre}}">
                                @error('nombre')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- editar Email -->
                            <div class="col-md-6 form-group ">
                                <label for="email_{{ $comentario->id }}">Email</label>
                                <input type="text" class="form-control" wire:model="email" id="email_{{ $comentario->id }}" name="email" value="{{$email}}">
                                @error('email')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- editar Texto -->
                            <div class="col-md-12 form-group ">
                                <label for="texto_{{ $comentario->id }}">Texto</label>
                                <textarea rows="4" class="form-control" wire:model="texto" id="texto_{{ $comentario->id }}" name="texto">{{ $texto }}</textarea>
                                @error('texto')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- editar Calificación -->
                            <div class="col-md-6 form-group ">
                                <label for="calificacion_{{ $comentario->id }}">Calificación</label>
                                <input type="number" class="form-control w-100" min="-128" max="127" wire:model="calificacion" id="calificacion_{{ $comentario->id }}" name="calificacion" value="{{ $calificacion }}">
                                @error('calificacion')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- editar Activo -->
                            <div class="col-md-6 form-group ">
                                <label for="activo_{{ $comentario->id }}">Activo</label>
                                <input type="checkbox" class="form-control w-100" wire:model="activo" id="activo_{{ $comentario->id }}" name="activo" {{--value="{{ $activo }}"--}} @checked(old('activo', $activo))>
                                @error('activo')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
        
                        <button type="submit" class="btn btn-outline-secondary">Guardar</button>
                        
                    </form>
                    
                    {{--<a class="btn btn-success" wire:click="updateComentario">Ejecutar</a>--}}

                    {{--
                </div>

            </div>
        </div>

    </div>
--}}


</div>
