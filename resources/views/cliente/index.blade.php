@extends('adminlte::page')

@section('title', 'PAGOS DEUDAS')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
    <a href="clientes/create" class="btn btn-primary mb-3">Agregar cliente</a>

    <table id="clientes" class="table table-light table-stripped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">NIT/CI</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $item)
                <tr>
                    <td>{{ $item->idcliente }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->apellidos }}</td>
                    <td>{{ $item->nit_ci }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>

                        <form action="{{ route('clientes.destroy', $item->idcliente) }}" method="POST">
                            <a href="/clientes/{{ $item->idcliente }}/edit" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a href="/deudas/{{ $item->idcliente }}" class="btn btn-warning">Deudas</a>
                            <a href="/pagos/{{ $item->idcliente }}" class="btn btn-primary">Pagos Realizados</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#clientes').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "Todo"]
                ]
            });
        });
    </script>
@stop
