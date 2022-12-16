<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagoController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function crearpago($iddeuda)
    {
        $deuda = Http::get("http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.deuda/deuda/".$iddeuda);
        return view('pago.pagardeuda', [
            'deuda' => json_decode($deuda)
        ]);
    }

    public function almacenarpago($pago, $iddeuda)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deuda = Http::get("http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.deuda/deuda/".$request->get('iddeuda'));
        $respuesta = Http::post("http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.pago", [
            'iddeuda' => json_decode($deuda),
            'lugarpago' => $request->get('lugarpago'),
            'monto' => $request->get('monto'),
            'moneda' => $request->get('moneda'),
            'tipopago' => $request->get('tipopago')
        ]);
        return redirect('/deudas/'.$request->get('idcliente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagos = Http::get("http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.pago/".$id);
        $cliente = Http::get("http://localhost:8080/ServicioWebDeudasGlassFish/webresources/entidad.cliente/".$id);
        return view('pago.pagoscliente', [
            'pagos' => json_decode($pagos),
            'cliente' => json_decode($cliente)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
