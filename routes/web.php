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

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('idiomas', 'IdiomasController');

//Route::get('/idiomas', 'IdiomaController@index');
//Route::get('/idiomas/edit/{id}', 'IdiomaController@edit');
//
//Route::post('idiomas/store', 'IdiomaController@store');
//Route::post('idiomas/update/{id}', 'IdiomaController@update');