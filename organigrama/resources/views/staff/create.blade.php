@extends('adminlte::page')

@section('title', 'Agregar Personal')

@section('content_header')
@stop

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="bg-white rounded p-4 border border-2 border-dark">
                <h1 class="text-center h3">Formulario para Agregar Personal</h1>
                <p class="text-center mb-4">Completa el formulario con la información del nuevo miembro del personal</p>

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('staffs.store') }}" method="POST">
                    @csrf

                    <!-- Area -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-workspace"></i></span>
                            <input
                                id="area"
                                name="area"
                                class="form-control form-control-lg"
                                placeholder="Área"
                                value="{{ old('area') }}"
                                type="text">
                        </div>
                        @error('area')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-card-text"></i></span>
                            <textarea
                                id="description"
                                name="description"
                                class="form-control form-control-lg"
                                placeholder="Descripción"
                                rows="3">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Level -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3"><i class="bi bi-arrow-up-circle"></i></span>
                            <input
                                id="level"
                                name="level"
                                class="form-control form-control-lg"
                                placeholder="Nivel"
                                value="{{ old('level') }}"
                                type="number"
                                inputmode="numeric">
                        </div>
                        @error('level')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- AreaType -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon4"><i class="bi bi-info-square"></i></span>
                            <input
                                id="areaType"
                                name="areaType"
                                class="form-control form-control-lg"
                                placeholder="Tipo de Área"
                                value="{{ old('areaType') }}"
                                type="number"
                                inputmode="numeric">
                        </div>
                        @error('areaType')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Titular -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon5"><i class="bi bi-person"></i></span>
                            <input
                                id="titular"
                                name="titular"
                                class="form-control form-control-lg"
                                placeholder="Titular"
                                value="{{ old('titular') }}"
                                type="text">
                        </div>
                        @error('titular')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
