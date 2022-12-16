@extends('adminlte::page')

@section('title', 'Deudas del Cliente')

@section('content_header')
    <h1>Deudas del cliente</h1>
@stop

@section('content')
    <h5><b>Cliente:</b> {{ $cliente->nombre }} {{ $cliente->apellidos }}</h5>
    <br>

    <table class="table table-light table-stripped mt-4">
        <thead>
            <tr>
                <th scope="col">IDdeuda</th>
                <th scope="col">Cliente</th>
                <th scope="col">Monto total</th>
                <th scope="col">Moneda</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha de Registro</th>
                <th scope="col">Vencimiento</th>
                <th scope="col">Pagado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if (count($deudas) > 0)
                @foreach ($deudas as $item)
                    @if (!(bool) $item->pagado)
                        <tr>
                            <td>{{ $item->iddeuda }}</td>
                            <td>{{ $item->idcliente->nombre }} {{ $item->idcliente->apellidos }}</td>
                            <td>{{ $item->montototal }}</td>
                            <td>{{ $item->moneda }}</td>
                            <td>{{ $item->descripcion }}</td>
                            {{-- <td>{{ $item->fecharegistro }}</td> --}}
                            <td>{{ date('Y-m-d H:i:s', strtotime($item->fecharegistro)) }}</td>
                            <td>{{ date('Y-m-d', strtotime($item->fechavencimiento)) }}</td>
                            {{-- <td>{{ (new DateTime($item->fechavencimiento))->format('Y-m-d H:i:s A') }}</td> --}}
                            <td>{{ (bool) $item->pagado ? 'True' : 'False' }}</td>
                            <td>
                                {{-- <button class="btn btn-primary">Pagar</button> --}}
                                <a href="{{ route('pago.pagar', $item->iddeuda) }}" class="btn btn-primary">Pagar</a>
                                <a href="/detallesdeuda/{{ $item->iddeuda }}" class="btn btn-warning">Ver Detalle</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif

        </tbody>
    </table>


    <a href="/clientes" class="btn btn-warning">Volver a Clientes</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
