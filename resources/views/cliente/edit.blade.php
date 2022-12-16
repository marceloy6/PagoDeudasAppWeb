@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    <form action="/clientes/{{ $item->idcliente }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $item->nombre }}"
                placeholder="Nombre">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $item->apellidos }}"
                placeholder="Apellidos">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $item->telefono }}"
                placeholder="Telefono">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $item->direccion }}"
                placeholder="Direccion">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Correo</label>
            <input type="text" class="form-control" id="correo" name="correo" value="{{ $item->correo }}"
                placeholder="Correo">
        </div>


        <div class="col-12">
            <a href="/clientes" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
