<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Http::get("http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.cliente");
        return view('cliente.index', [
            'clientes' => json_decode($clientes)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = Http::post("http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.cliente", [
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'nit_ci' => $request->get('nit_ci'),
            'telefono' => $request->get('telefono'),
            'correo' => $request->get('correo'),
            'direccion' => $request->get('direccion'),
        ]);
        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Http::get("http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.cliente/".$id);
        return view('cliente.edit', [
            'item' => json_decode($item)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $respuesta = Http::put("http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.cliente/".$id, [
            'idcliente' => $id,
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'telefono' => $request->get('telefono'),
            'correo' => $request->get('correo'),
            'direccion' => $request->get('direccion'),
        ]);
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $respuesta = Http::delete('http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.cliente/'.$id);
        return redirect('/clientes');
    }
}
