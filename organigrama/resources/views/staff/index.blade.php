@extends('adminlte::page')

@section('title', 'Lista de Personal')

@section('content_header')
@stop

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="row my-4">
    <div class="col-12">
        <h1 class="text-center">Lista de Personal</h1>
        <p class="text-end">
            <a href="{{ route('staffs.create') }}">
                <button type="button" class="btn btn-primary" style="margin-right: 5px;">Agregar</button>
            </a>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table id="staffTable" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Área</th>
                    <th scope="col" class="text-center">Descripción</th>
                    <th scope="col" class="text-center">Nivel</th>
                    <th scope="col" class="text-center">Tipo de Área</th>
                    <th scope="col" class="text-center">Titular</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($staffMembers as $staffMember)
                <tr>
                    <td class="text-center">{{ $staffMember->area }}</td>
                    <td class="text-center">{{ $staffMember->description }}</td>
                    <td class="text-center">{{ $staffMember->level }}</td>
                    <td class="text-center">{{ $staffMember->areaType }}</td>
                    <td class="text-center">{{ $staffMember->titular }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="p-2">
                                <a href="{{ route('staffs.edit', $staffMember) }}">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="p-2">
                                <a href="{{ route('staffs.show', $staffMember) }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="p-2">
                                <form action="{{ route('staffs.destroy', $staffMember) }}" method="post" class="formulario-eliminar">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script>
    $(document).ready(function() {
        $('#staffTable').DataTable({
            "language":{
                "search":   "Buscar",
                "lengthMenu":  "Mostrar _MENU_ miembros del personal",
                "info":   "Mostrando página _PAGE_ de _PAGES_",
                "paginate":  {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "first":   "Primero",
                    "last":  "Ultimo"
                }
            }
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás deshacer esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).unbind('submit').submit();
                }
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/839bf29115.js" crossorigin="anonymous"></script>
@stop
