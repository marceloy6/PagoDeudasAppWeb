@extends('adminlte::page')

@section('title', 'Pagar Deuda')

@section('content_header')
    <h1>Pagar Deuda</h1>
@stop

@section('content')
    <b>Cliente:</b> {{ $deuda->idcliente->nombre }} {{ $deuda->idcliente->apellidos }}
    <br>
    <b>NIT/CI:</b> {{ $deuda->idcliente->nit_ci }}
    <br>
    <b>Telefono:</b> {{ $deuda->idcliente->telefono }}
    <br>
    <b>Direccion:</b> {{ $deuda->idcliente->direccion }}
    <br>
    <b>Correo:</b> {{ $deuda->idcliente->correo }}

    {{-- <form action="{{ route('pagos.store') }}" method="POST"> --}}
    <form action="/pagos" method="POST">
        {{-- {{ csrf_field() }} --}}
        @csrf

        <div class="card-body">
            <div class="row">
                <div class="col">

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">IDCliente</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="idcliente" name="idcliente" type="text" placeholder="IDCliente"
                                value="{{ $deuda->idcliente->idcliente }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">IDdeuda</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="iddeuda" name="iddeuda" type="text"
                                placeholder="Id de la deuda" value="{{ $deuda->iddeuda }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Lugar de pago</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="lugarpago" name="lugarpago" type="text"
                                placeholder="Ingrese lugar" value="{{ old('lugarpago') }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Importe Total</label>
                        <div class="col-sm-9">
                            <input class="form-control digits" id="monto" name="monto" type="number"
                                placeholder="Monto" value="{{ $deuda->montototal }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Moneda</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="moneda" name="moneda">
                                <option value="{{ 'Bolivianos' }}" onclick="modo({{ 1 }});"
                                    onselect="modo({{ 1 }});">
                                    Bolivianos
                                </option>

                                <option value="{{ 'Dolares' }}" onclick="modo({{ 0 }});"
                                    onselect="modo({{ 0 }});">
                                    Dolares
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Tipo de pago</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="tipopago" name="tipopago">
                                <option value="{{ 'Efectivo' }}" onclick="modo({{ 1 }});"
                                    onselect="modo({{ 1 }});">
                                    Efectivo
                                </option>

                                <option value="{{ 'Dolares' }}" onclick="modo({{ 0 }});"
                                    onselect="modo({{ 0 }});">
                                    Tarjeta
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Fecha de pago</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="fechapago" name="fechapago" type="text"
                                placeholder="{{ now() }}" value="{{ now() }}" readonly>
                        </div>
                    </div>


                    <hr>

                    <div class="col-sm-9 offset-sm-3">


                        {{-- <button onclick="window.location = '{{ route('deuda.show') }}'" class="btn btn-danger btn-xs"
                        type="button" data-original-title="btn btn-danger btn-xs" title="">
                        <span width="1.9em" data-feather="x-circle"></span>
                        <h6>Cancelar</h6>
                    </button> --}}

                        <button class="btn btn-success btn-xs" type="submit" data-original-title="btn btn-success btn-xs"
                            title="">
                            <span width="1.9em" data-feather="check-circle"></span>
                            <h6>Pagar</h6>
                        </button>


                    </div>
                </div>
            </div>
        </div>



    </form>

    <a href="/deudas/{{ $deuda->idcliente->idcliente }}" class="btn btn-secondary">Cancelar</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
