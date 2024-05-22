@extends('layouts.plantilla')

@section('title', 'Puntos de venta')
@section('meta-description', 'Descubre donde puedes encontrar nuestros productos y experimenta el sabor de los Alimentos Macanudo.')
    
    
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


