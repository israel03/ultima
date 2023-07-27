<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/','Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



Route::get('dashboard', 'vistasController@mostrarInicio')->name('dashboard')->middleware('auth');
Route::get('agregar-cliente', 'vistasController@mostrarFormulario')->name('agregar-cliente')->middleware('auth');
Route::get('detalles/{id}', 'vistasController@mostrarDetalles')->middleware('auth');



Route::post('agregar', 'clientesController@agregarCliente')->name('agregar')->middleware('auth');
Route::get('eliminar', 'clientesController@eliminarCliente')->name('eliminar')->middleware('auth');
Route::get('editar', 'clientesController@editarCliente')->name('editar')->middleware('auth');


