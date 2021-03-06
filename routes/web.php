<?php

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

Route::middleware(['auth'])->group(function () {
    Route::resource('idiomas', 'IdiomasController');
    Route::resource('competencias', 'CompetenciasController');
    Route::resource('departamentos', 'DepartamentosController');
    Route::resource('puestos', 'PuestosController');
    Route::get('/dashboard', 'CandidatosController@index');
    Route::resource('empleados', 'EmpleadosController');
    Route::post('/candidatos/find', 'CandidatosController@find');
    Route::get('/candidatos/export', 'CandidatosController@export');
});

Route::resource('candidatos', 'CandidatosController')->except([
    'create'
]);
Route::get('/candidatos/{puestoID}/create', 'CandidatosController@create');

Route::get('/', 'PuestosController@puestosDisponibles');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
