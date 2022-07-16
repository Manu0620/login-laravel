<?php

use App\Http\Controllers\citasController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\empleadosController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\propiedadesController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\solicitudesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/Facturacion', function(){
    return view('/Facturacion');
});

Route::get('/registrarClientes', [clientesController::class, 'show']);
Route::post('/registrarClientes', [clientesController::class, 'create']);
Route::get('/editarClientes/{id}', [clientesController::class, 'edit'])->name('clientes');
Route::put('/editarClientes/{id}', [clientesController::class, 'update'])->name('clientes');
Route::get('/consultarClientes', [clientesController::class, 'query']);

Route::get('/registrarEmpleados', [empleadosController::class, 'show']);
Route::post('/registrarEmpleados', [empleadosController::class, 'create']);

Route::get('/registrarUsuarios', [usuariosController::class, 'show']);
Route::post('/registrarUsuarios', [usuariosController::class, 'create']);
Route::get('/consultarUsuarios', [usuariosController::class, 'query']);

Route::get('/registrarCitas', [citasController::class, 'show']);
Route::post('/registrarCitas', [citasController::class, 'create']);

Route::get('/registrarSolicitudes', [solicitudesController::class, 'show']);
Route::post('/registrarSolicitudes', [solicitudesController::class, 'create']);
Route::get('/editarSolicitudes/{id}', [solicitudesController::class, 'edit'])->name('solicitudes');
Route::put('/editarSolicitudes/{id}', [solicitudesController::class, 'update'])->name('solicitudes');
Route::get('/consultarSolicitudes', [solicitudesController::class, 'query']);

Route::get('/registrarPropiedades', [propiedadesController::class, 'show']);
Route::post('/registrarPropiedades', [propiedadesController::class, 'create']);
Route::get('/editarPropieades/{id}', [propiedadesController::class, 'edit'])->name('propiedades');
Route::put('/editarPropieades/{id}', [propiedadesController::class, 'update'])->name('propiedades');
Route::get('/consultarPropiedades', [propiedadesController::class, 'query']);

Route::get('/login', [loginController::class, 'show']);
Route::post('/login', [loginController::class, 'login']);

Route::get('/home', [homeController::class, 'index']);
Route::get('/logout', [logoutController::class, 'logout']);


