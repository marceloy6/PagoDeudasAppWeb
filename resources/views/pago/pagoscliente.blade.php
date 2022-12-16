@extends('adminlte::page')

@section('title', 'Pagos realizados por el cliente')

@section('content_header')
    <h1>Pagos realizados por el cliente</h1>
@stop

@section('content')
    <b>Cliente:</b> {{ $cliente->nombre }} {{ $cliente->apellidos }}
    <br>
    <b>NIT/CI:</b> {{ $cliente->nit_ci }}
    <br>
    <b>Telefono:</b> {{ $cliente->telefono }}
    <br>
    <b>Direccion:</b> {{ $cliente->direccion }}
    <br>
    <b>Correo:</b> {{ $cliente->correo }}

    <table class="table table-light table-stripped mt-4">
        <thead>
            <tr>
                <th scope="col">IDPago</th>
                <th scope="col">Descripcion de la deuda</th>
                <th scope="col">ID Deuda</th>
                <th scope="col">Lugar de Pago</th>
                <th scope="col">Monto</th>
                <th scope="col">Moneda</th>
                <th scope="col">Tipo de Pago</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @if (count($pagos) > 0)
                @foreach ($pagos as $item)
                    <tr>
                        <td>{{ $item->idpago }}</td>
                        <td>{{ $item->iddeuda->descripcion }}</td>
                        <td>{{ $item->iddeuda->iddeuda }}</td>
                        <td>{{ $item->lugarpago }}</td>
                        <td>{{ $item->monto }}</td>
                        <td>{{ $item->moneda }}</td>
                        <td>{{ $item->tipopago }}</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($item->fechapago)) }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <a href="/clientes" class="btn btn-warning">Volver a clientes</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
