@extends('layouts.plantilla')

@section('title', 'Mostrar Pago')
@section('meta-description', 'metadescripcion para la pagina de mostrar pago')
    
    
@section('content')


<div class="container text-white">

    <div class="text-center text-white mt-5">
        <h2 class="text-center pt-2">mostrar pago del pedido id:{{$pedido->id}}</h2>
    </div>

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            <ul>
                <li>id: {{$pedido->id}}</li>
                <li>estatus: {{$pedido->status}}</li>
                <li>tipo: {{$pedido->tipo}}</li>
                <li>nombre: {{$pedido->nombre}}</li>
                <li>email: {{$pedido->email}}</li>
                <li>monto: {{$pedido->monto}}</li>                
                <li>tipo_de_cliente: {{$pedido->tipo_de_cliente}}</li>      
                <li>numero_de_factura: {{$pedido->numero_de_factura}}</li>
            </ul>


        </div>
    </div>


</div>


@endsection


