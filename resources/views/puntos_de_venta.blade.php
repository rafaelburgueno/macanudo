@extends('layouts.plantilla')

@section('title', 'Puntos de venta')
@section('meta-description', 'metadescripcion para la pagina Puntos de venta')
    
    
@section('content')


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2 h2">PUNTOS DE VENTA</h1>
</div>



<div class="container">
    <div class="card map-responsive">
        <iframe src="https://www.google.com/maps/d/embed?mid=1ycvQhsZ8ift8jHkpa9kqeslwAOlTNis&ehbc=2E312F" height="640"></iframe>
        <!--<h5 class="m-1 text-center text-dark">Mapa de los puntos de Venta</h5>-->
    </div>
</div>


@endsection


