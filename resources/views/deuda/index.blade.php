@extends('adminlte::page')

@section('title', 'Todas las deudas')

@section('content_header')
    <h1>Deudas</h1>
@stop

@section('content')
    <table class="table table-light table-stripped mt-4">
        <thead>
            <tr>
                <th scope="col">IDdeuda</th>
                <th scope="col">Cliente</th>
                <th scope="col">Monto total</th>
                <th scope="col">FechaRegistro</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deudas as $item)
                <tr>
                    <td>{{ $item->iddeuda }}</td>
                    <td>{{ $item->idcliente->nombre }} {{ $item->idcliente->apellidos }}</td>
                    <td>{{ $item->montototal }}</td>
                    <td>{{ $item->fecharegistro }}</td>
                    <td>
                        <button class="btn btn-primary">Pagar</button>
                        <a href="/detallesdeuda/{{ $item->iddeuda }}" class="btn btn-warning">Ver Detalle</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
