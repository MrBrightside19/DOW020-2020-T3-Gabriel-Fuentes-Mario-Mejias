<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UsuariosController, ArriendosController, AutosController,TiposVehiculosController,ClientesController,EstadisticasController};
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('home.index');
// });

Route::post('/usuarios/login',[UsuariosController::class, 'login'])->name('usuarios.login');
Route::get('/usuarios/logout',[UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::get('/usuarios',[UsuariosController::class, 'index'])->name('usuarios.index');
Route::put('/usuarios/password/{usuario}',[UsuariosController::class, 'password'])->name('usuarios.password');
Route::delete('/usuarios/{usuarios}',[UsuariosController::class,'destroy'])->name('usuarios.destroy');
Route::post('/usuarios/{usuario}',[UsuariosController::class,'activar'])->name('usuarios.activar');

Route::resource('/usuarios',UsuariosController::class);

Route::get('/',[HomeController::class, 'index'])->name('home.index');
Route::get('/login',[HomeController::class, 'login'])->name('home.login');


Route::get('/estadisticas/arriendos',[EstadisticasController::class,'tablaArriendos'])->name('estadisticas.arriendos');
Route::get('/estadisticas/descargar-arriendos',[EstadisticasController::class,'descargarTablaArriendos'])->name('estadisticas.descargar-arriendos');



// Route::put('/arriendos/{arriendo}',[ArriendosController::class, 'finalizar'])->name('arriendos.finalizar');

Route::resource('/arriendos',ArriendosController::class);


Route::post('/autos',[AutosController::class, 'store'])->name('autos.store');
Route::resource('/autos',AutosController::class);

//F.A.Q
Route::get('/faq',[HomeController::class, 'faq'])->name('faq.index');

//CLIENTES
Route::resource('/clientes',ClientesController::class);
Route::delete('/clientes/{clientes}',[ClientesController::class,'destroy'])->name('clientes.destroy');
//Route::get('/clientes',[ClientesController::class,'index'])->name('clientes.index');

Route::resource('/tipos',TiposVehiculosController::class);

