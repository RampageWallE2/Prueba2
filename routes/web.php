<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\RestauranteController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(FacturaController::class)->group(function(){
    Route::get('/facturas', 'index');
    Route::post('/factura', 'new');
    Route::put('/factura/{id}', 'update');
    Route::delete('/factura/{id}', 'destroy');
});

Route::controller(ReservaController::class)->group(function(){
    Route::get('/reservar/{id_restaurante}', 'index')->name('reserva.index');
    Route::post('/reserva/{id_restaurante}', 'new')->name('reserva.insertar');
    Route::get('/reservas','index2')->name('reservas.usuario');
    Route::put('/reserva/{id}', 'update')->name('reserva.actualizar');
    Route::delete('/reserva/{id}', 'destroy')->name('reserva.eliminar');
    
});

Route::controller(RestauranteController::class)->group(function(){
    Route::get('/restaurantes', 'index');
    Route::post('/restaurante', 'new');
    Route::put('restaurante/{id}', 'update');
    Route::delete('restaurante/{id}', 'destroy');
});