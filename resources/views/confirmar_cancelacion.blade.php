@extends('layouts.plantilla')

@section('title', 'confirmar cancelacion')
@section('meta-description', 'metadescripcion para la pagina de ver pedido')
    
    
@section('content')


<div class="container text-white">

    <div class="m-5 p-5">
    
    @if(isset($pedido))
    

        <div class="m-5 border rounded">
            {{--<h4 class="text-center pt-2">Pedido id: {{$pedido->id}}</h4>--}}
            <h3 class="text-center pt-5">¿Realmente quiere cancelar el pedido?</h3>
            <div class="row">
                <div class="col-md-6 text-center">
                    <a href="{{URL::signedRoute('cancelar_pedido', ['pedido' => $pedido->id])}}">
                        <button class="m-5 btn btn-lg btn-danger">Si</button>
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <a href="{{route('home')}}">
                        <button class="m-5 btn btn-lg btn-success">No</button>
                    </a>
                </div>
            </div>
        </div>

        
    @elseif(isset($suscripcion))
        

        <div class="m-5 border rounded">
            {{--<h4 class="text-center pt-2">Suscripcion id: {{$suscripcion->id}}</h4>--}}
            <h3 class="text-center pt-5">¿Realmente quiere cancelar la suscripción?</h3>
            <div class="row">
                <div class="col-md-6 text-center">
                    <a href="{{URL::signedRoute('cancelar_suscripcion', ['suscripcion' => $suscripcion->id])}}">
                        <button class="m-5 btn btn-lg btn-danger">Si</button>
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <a href="{{route('home')}}">
                        <button class="m-5 btn btn-lg btn-success">No</button>
                    </a>
                </div>
            </div>
        </div>

        
    @endif

    </div>


</div>


@endsection


