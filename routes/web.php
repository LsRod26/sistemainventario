<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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
//Auth::routes(['register' => false]);

Route::group(['middleware'=> 'auth'], function(){


    
Route::get('/', 'App\Http\Controllers\homecontroller@index')->name('home');

Route::get('/direccion/crear','App\Http\Controllers\direccioncontroller@create')->name('direccion.create');

Route::post('/direccion/crear/store','App\Http\Controllers\direccioncontroller@store')->name('direccion.store');

Route::get('/funcionario/crear','App\Http\Controllers\funcionariocontroller@create')->name('funcionario.create');

Route::post('/funcionario/crear/store','App\Http\Controllers\funcionariocontroller@store')->name('funcionario.store');

Route::get('/componente/crear','App\Http\Controllers\componentecontroller@create')->name('componente.crear');

Route::post('/componente/crear/store','App\Http\Controllers\componentecontroller@store')->name('componente.store');

Route::get('/tipocomponente/crear','App\Http\Controllers\tipocomponentecontroller@create')->name('tipocomponente.crear');

Route::post('/tipocomponente/crear/store','App\Http\Controllers\tipocomponentecontroller@store')->name('tipocomponente.store');

Route::get('/buscar','App\Http\Controllers\buscarcontroller@index')->name('buscar');

Route::get('/asignarfuncionariosistema/crear','App\Http\Controllers\sistemascontroller@mostrarsistemas')->name('asignar.funcionariosistema');

Route::post('/asignarfuncionariosistema/crear/store','App\Http\Controllers\sistemascontroller@store')->name('store.funcionariosistema');

Route::get('/sistema/crear','App\Http\Controllers\sistemascontroller@create')->name('sistema.create');

Route::post('/sistema/crear/store','App\Http\Controllers\sistemascontroller@storesystem')->name('sistema.store');

Route::get('/equipo/crear','App\Http\Controllers\equipocontroller@create')->name('equipo.crear');

Route::post('/equipo/crear/store','App\Http\Controllers\equipocontroller@store')->name('equipo.store');

Route::get('/asignarfuncionarioequipo/crear','App\Http\Controllers\funcionariocontroller@asignarequipo')->name('asignar.funcionarioequipo');

Route::get('asignarfuncionarioequipo/funcionarios/{id}','App\Http\Controllers\funcionariocontroller@getfuncionarios');

Route::post('asignarfuncionarioequipo/store','App\Http\Controllers\funcionariocontroller@storefuncionarioequipo')->name('store.funcionarioequipo');

Route::get('/componente/asignarequipo/crear','App\Http\Controllers\componentecontroller@asignarequipo')->name('componente.asignarequipo');

Route::get('/componente/asignarequipo/componentes/{id}','App\Http\Controllers\componentecontroller@getcomponentes');

Route::post('/componente/asignarequipo/store','App\Http\Controllers\componentecontroller@storeasignarequipo')->name('guardar.asignar');

Route::get('/buscar/funcionario/{funcionario}/edit','App\Http\Controllers\funcionariocontroller@editar')->name('funcionario.editar');

Route::patch('/buscar/{funcionario}/update','App\Http\Controllers\funcionariocontroller@update')->name('funcionario.update');

Route::get('/buscar/equipo/{equipo}/edit','App\Http\Controllers\equipocontroller@editar')->name('equipo.editar');

Route::patch('/buscar/equipo/{equipo}/update','App\Http\Controllers\equipocontroller@update')->name('equipo.update');

Route::get('/buscar/componente/{componente}/edit','App\Http\Controllers\componentecontroller@editar')->name('componente.edit');

Route::patch('/buscar/componente/{componente}/update','App\Http\Controllers\componentecontroller@update')->name('componente.update');

Route::get('/buscar/sistema/{sistema}/edit','App\Http\Controllers\sistemascontroller@editar')->name('sistemas.edit');

Route::patch('/buscar/sistema/{sistema}/update','App\Http\Controllers\sistemascontroller@update')->name('sistemas.update');

Route::get('/buscar/direccion/{direccion}/edit','App\Http\Controllers\direccioncontroller@edit')->name('direccion.edit');

Route::patch('/buscar/direccion/{direccion}/update','App\Http\Controllers\direccioncontroller@update')->name('direccion.update');


});






