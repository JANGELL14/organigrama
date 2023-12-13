@extends('adminlte::page')

@section('title', 'Detalles del Personal')

@section('content_header')
    <h1 class="text-center mb-4">Detalles del Personal</h1>
@stop

@section('content')
<div class="row justify-content-center align-items-center" style="height: 80vh;">
    <div class="col-md-6">
        <div class="card border border-dark d-flex flex-column h-100" style="border-color: #000;">
            <div class="card-header">
                <h5 class="card-title text-center">Información del Personal</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item border" style="border-color: #000;"><strong>Área:</strong> {{ $staffMember->area }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Descripción:</strong> {{ $staffMember->description }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Nivel:</strong> {{ $staffMember->level }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Tipo de Área:</strong> {{ $staffMember->areaType }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Titular:</strong> {{ $staffMember->titular }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ route('staffs.index') }}" class="btn btn-primary">Regresar a la lista</a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop
