@extends('adminlte::page')

@section('title', 'Registrar Cliente')

@section('content_header')
    <h1>Registrar Cliente</h1>
@stop

@section('content')
    <form action="/clientes" method="POST">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">NIT/CI</label>
            <input type="text" class="form-control" id="nit_ci" name="nit_ci" placeholder="NIT/CI">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Correo</label>
            <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo">
        </div>

        <div class="col-12">
            <a href="/clientes" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Registrar</button>
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
