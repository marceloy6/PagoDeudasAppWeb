<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('clientes', 'App\Http\Controllers\ClienteController');

Route::resource('deudas', 'App\Http\Controllers\DeudaController');

Route::resource('detallesdeuda', 'App\Http\Controllers\DetalleDeudaController');

Route::resource('conceptos', 'App\Http\Controllers\ConceptoController');

Route::resource('pagos', 'App\Http\Controllers\PagoController');
Route::get('/pagoCrear/{iddeuda}', [PagoController::class, 'crearpago'])->name('pago.pagar');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
