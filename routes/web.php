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



Route::get('/salas', 'SalasController@index');

Route::get('/salas/adicionar', 'SalasController@create');
Route::post('/salas/adicionar', 'SalasController@store');
Route::delete('/salas/{id}', 'SalasController@destroy');
Route::post('/salas/{id}/editaNome', 'SalasController@editaNome');


Auth::routes();

Route::get('/home', 'SalasController@index')->name('home');
Route::get('/sair', function () {

    Auth::logout();
    return redirect('/login');
});
