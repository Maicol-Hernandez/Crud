<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolUsuarioController;
// use App\Http\Controllers\SupervisorController;


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

Auth::routes([
    'register' => false,
    'reset' => false,
]);
// echo Auth::routes(); 




Route::resource('/usuarios', UsuarioController::class)->middleware('auth');
Route::resource('rol-usuarios', RolUsuarioController::class)->middleware('auth');
Route::resource('/libros', LibroController::class)->middleware('auth');
Route::resource('/categorias', CategoriaController::class)->middleware('auth');
Route::resource('/reservas', ReservaController::class)->middleware('auth');

Route::get('/agente', [App\Http\Controllers\HomeController::class, 'getAgente'])->name('agente');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/supervisor', [App\Http\Controllers\SupervisorController::class, 'index'])->name('supervisor');
