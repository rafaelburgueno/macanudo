@extends('layouts.plantilla')

@section('title', 'Banner')
@section('meta-description', 'metadescripción de la pagina de Banner')


@section('content')
    

<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">BANNER</h1>
</div>


    <!-- Carousel -->
    <div class="d-flex justify-content-center">
        <div class="w-50 my-3">
            @include('partials.banner')
        </div>
    </div>
    



    <div class="container text-dark">
        @foreach ($banner as $imagen)

        <div class="card m-1 mb-3 negroo shadown-gris" style="background-color: #e1e1e1;">
            <div class="card-body row">
                <div class="col-md-4 card-img">
                    <img src="{{$imagen->url}}" class="img-fluid shadown rounded-3" alt="{{ $imagen->descripcion }}">
                    <p><small class="">Id: {{$imagen->id}}</small></p>
                </div>
            
                <div class="col-md-8">
                    <form class="" action="{{route('banner.update', $imagen)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="descripcion">Descripción</label>
                                    <textarea required class="form-control" id="descripcion" name="descripcion" rows="3">{{ $imagen->descripcion }}</textarea>
                                    @error('descripcion')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror

                                    {{--<div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked( $imagen->imagen_con_info )>
                                        <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información del evento?</label>
                                    </div>--}}

                                </div>
                                
                                <!-- input para el campo 'link',  que se usa para el boton de accion del link-->
                                <div class="form-group mb-3">
                                    <label for="link">Link <small>(opcional)</small></label>
                                    <textarea class="form-control" id="link" name="link" rows="3">{{ $imagen->link }}</textarea>
                                    @error('link')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="relevancia">Relevancia</label>
                                    <input type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{ $imagen->relevancia }}" min="1" style="width: 100%;">
                                    @error('relevancia')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked( $imagen->activo )>
                                    <label class="form-check-label" for="activo">Publicar</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-secondary btn-block btn-sm btn_spin_giratorio_actualizar">Actualizar imagen</button>

                    </form>


                    <form action="{{ route('banner.destroy', $imagen) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger mt-3 float-right btn-sm btn_spin_giratorio_eliminar">Eliminar imagen</button>
                    </form>


                </div>
            </div>
        </div>    

        @endforeach
        
    </div>


    <!-- FORMULARIO PARA AGREGAR IMAGENER AL BANNER CAROUSEL -->
    <!-- FORMULARIO PARA AGREGAR IMAGENER AL BANNER CAROUSEL -->
    <!-- FORMULARIO PARA AGREGAR IMAGENER AL BANNER CAROUSEL -->
    <div class="container mt-5">
        <h3 id="" class="text-center pt-2">Agregar imagen</h3>
        <hr>
        <div class="row mb-5">
            <div class="col-md-12">
                
                <form class="p-3" action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
    
                    <div class="row">
                        <div class="col col-md-6">
       
                            <div class="form-group mb-3">
                                <label for="descripcion">Descripción <small>(Se usa para completar el texto alternativo a las imagenes)</small></label>
                                <textarea required class="form-control" id="descripcion" name="descripcion" rows="4" maxlength="255">{{old('descripcion')}}</textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- input para el campo 'link',  que se usa para el boton de accion del link-->
                            <div class="form-group mb-3">
                                <label for="link">Link <small>(opcional. Se usa para definir el boton de accion)</small></label>
                                <textarea class="form-control" id="link" name="link" rows="4" maxlength="255">{{old('link')}}</textarea>
                                @error('link')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
    
                        </div>
                    
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="relevancia">Relevancia <br><small>(determina el orden en el que aparecen las imagenes)</small></label>
                                <input type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{old('relevancia')}}" min="1" max="100" style="width: 100%;">
                                @error('relevancia')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="imagen">Imagen</label>
                                <input required type="file" class="form-control p-1" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                                @error('imagen')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                                
                                {{--<div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info'))>
                                    <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información?</label>
                                </div>--}}

                                <div class="form-check mb-2 mt-3">
                                    <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                                    <label class="form-check-label" for="activo">Publicar</label>
                                </div>

                            </div>
                        </div>
    
                                
                    </div>
            
                    <button type="submit" class="btn btn-outline-secondary btn-block btn-spin-giratorio">Subir imagen</button>
                </form>
            </div>
        </div>

   
    </div>



    <script>
        $(document).ready(function(){
            $('.btn-spin-giratorio').click(function(){
                
                if(
                    document.getElementById("descripcion").value != '' &&
                    document.getElementById("imagen").value != '' 
                ){
                    let timerInterval
                    Swal.fire({
                    title: 'Guardando...',
                    html: 'Por favor espere.',
                    //timer: 10000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                    })
                }
        
            });


            $('.btn_spin_giratorio_actualizar').click(function(){
                
                if(document.getElementById("descripcion").value != ''){
                    let timerInterval
                    Swal.fire({
                    title: 'Guardando...',
                    html: 'Por favor espere.',
                    //timer: 10000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                    })
                }
        
            });


            $('.btn_spin_giratorio_eliminar').click(function(){
                let timerInterval
                Swal.fire({
                title: 'Eliminando...',
                html: 'Por favor espere.',
                //timer: 10000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
                })
            });


        });
        
        </script>


@endsection

