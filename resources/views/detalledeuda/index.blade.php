@extends('adminlte::page')

@section('title', 'Todos los detalles')

@section('content_header')
    <h1>Detalles de deudas</h1>
@stop

@section('content')
    <h2> Detalles de la deuda</h2>
    <b>Cliente:</b> {{ $detallesdeuda[0]->iddeuda->idcliente->nombre }}
    {{ $detallesdeuda[0]->iddeuda->idcliente->apellidos }}
    <br>
    <b>Descripcion de la deuda:</b> {{ $detallesdeuda[0]->iddeuda->descripcion }}
    <br>
    <b>Fecha:</b> {{ $detallesdeuda[0]->iddeuda->fecharegistro }}

    <table class="table table-light table-stripped mt-4">
        <thead>
            <tr>
                <th scope="col">Descripcion de la deuda</th>
                <th scope="col">Concepto</th>
                <th scope="col">Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detallesdeuda as $item)
                <tr>
                    <td>{{ $item->iddeuda->descripcion }}</td>
                    <td>{{ $item->idconcepto->nombre }}</td>
                    <td>{{ $item->monto }}</td>
                </tr>
            @endforeach
            <tr class="table-info">
                <th scope="row" colspan="2">Importe Total</td>
                <th scope="row">{{ $item->iddeuda->montototal }}</td>
            </tr>
        </tbody>
    </table>

    <a href="/deudas/{{ $item->iddeuda->idcliente->idcliente }}" class="btn btn-warning">Volver</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
