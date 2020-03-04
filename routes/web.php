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
    return view('auth/login');
});
Auth::routes();

Route::resource('academicos','AcademicoController');
Route::resource('comisiones','ComisionController');
Route::resource('departamentos','DepartamentoController');
Route::resource('evaluaciones','EvaluacionController');
Route::resource('facultades','FacultadController');
Route::resource('secFacultades','SecFacultadController');
Route::resource('users','UserController');

Route::get('/home', 'HomeController@index')->name('home');
