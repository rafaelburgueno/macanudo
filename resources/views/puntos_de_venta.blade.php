@extends('layouts.plantilla')

@section('title', 'Puntos de venta')
@section('meta-description', 'metadescripcion para la pagina Puntos de venta')
    
    
@section('content')


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">PUNTOS DE VENTA</h1>
</div>



<div class="container">
    <div class="card map-responsive">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=13Y16rpsNzvf6A2ybMbV-TEEtXPgdehY&ehbc=2E312F" height="640"></iframe>
        <h5 class="m-1 text-center text-dark">Mapa de los puntos de Venta</h5>
    </div>
</div>



{{--<div class="container">
    <h3 class="text-center" style="color: #e1e1e1"> Este sitio se encuentra en construcción <br><svg
            xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-android"
            viewBox="0 0 16 16">
            <path
                d="M2.76 3.061a.5.5 0 0 1 .679.2l1.283 2.352A8.94 8.94 0 0 1 8 5a8.94 8.94 0 0 1 3.278.613l1.283-2.352a.5.5 0 1 1 .878.478l-1.252 2.295C14.475 7.266 16 9.477 16 12H0c0-2.523 1.525-4.734 3.813-5.966L2.56 3.74a.5.5 0 0 1 .2-.678ZM5 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm6 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" />
        </svg>
    </h3>
</div>--}}





    
    



@endsection


