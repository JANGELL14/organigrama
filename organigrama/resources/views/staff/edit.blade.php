@extends('adminlte::page')

@section('title', 'Editar Personal')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar Personal</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('staffs.update', $staff) }}">
                @method("PUT")
                @csrf

                <div class="form-group">
                    <label for="area">Área</label>
                    <input type="text" name="area" id="area" class="form-control" value="{{ old('area', $staff->area) }}">
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $staff->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="level">Nivel</label>
                    <input type="number" name="level" id="level" class="form-control" value="{{ old('level', $staff->level) }}">
                </div>

                <div class="form-group">
                    <label for="areaType">Tipo de Área</label>
                    <input type="number" name="areaType" id="areaType" class="form-control" value="{{ old('areaType', $staff->areaType) }}">
                </div>

                <div class="form-group">
                    <label for="titular">Titular</label>
                    <input type="text" name="titular" id="titular" class="form-control" value="{{ old('titular', $staff->titular) }}">
                </div>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
