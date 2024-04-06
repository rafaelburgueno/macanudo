<div>
    <td>
        <a class="btn btn-light" data-toggle="modal" data-target="#modal_editar_comentario_{{ $comentario->id }}">{{ $comentario->id }}</a>
    </td>
    <td><small>{{ $comentario->nombre }}</small></td>
    <td><small>{{ $comentario->email }}</small></td>
    <td><small>{{ Str::limit($comentario->texto, 30, '...') }}</small> </td>
    <td><small>{{ $comentario->getElementoAlQueApunta()}}</small></td>
    <td>{{ $comentario->calificacion }}</td>
    <td>
        @if($comentario->activo)
        SI
        @else
        NO
        @endif
    </td>
    <td><small>{{ $comentario->created_at }}</small></td>


    <!--MODAL para editar el comentario-->
    <div class="modal fade" id="modal_editar_comentario_{{ $comentario->id }}" tabindex="-1" role="dialog" aria-labelledby="modal_editar_comentario_{{ $comentario->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content negro">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="modal_editar_comentario_{{ $comentario->id }}Label">{{$comentario->created_at}} | id:{{$comentario->id}}</h5><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{--<h4 class="text-center rojo">{{ $comentario->monto }} $</h4><br>--}}
                
                <div class="modal-body ">
                    
                    <p>Nombre: <strong>{{ $comentario->nombre }}</strong></p>
                    <p>Email: <strong>{{ $comentario->email }}</strong></p>
                    <p>Texto: {{ $comentario->texto }}</p>
                    <p>Calificación: {{ $comentario->calificacion }}</p>
                    <p>Activo: {{ $comentario->activo }}</p>
                    
                </div>

            </div>
        </div>

    </div>



</div>
