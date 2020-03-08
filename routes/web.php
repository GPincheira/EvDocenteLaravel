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


Auth::routes();

Route::resource('secFacultades','SecFacultadController');
Route::resource('roles','RoleController');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    Route::post('academicos/store', 'AcademicoController@store')->name('academicos.store')
                                                        ->middleware('permission:academicos.create');
    Route::get('academicos', 'AcademicoController@index')->name('academicos.index')
                                                        ->middleware('permission:academicos.index');
    Route::get('academicos/create', 'AcademicoController@create')->name('academicos.create')
                                                        ->middleware('permission:academicos.create');
    Route::put('academicos/{role}', 'AcademicoController@update')->name('academicos.update')
                                                        ->middleware('permission:academicos.edit');
    Route::get('academicos/{role}', 'AcademicoController@show')->name('academicos.show')
                                                        ->middleware('permission:academicos.show');
    Route::delete('academicos/{role}', 'AcademicoController@destroy')->name('academicos.destroy')
                                                        ->middleware('permission:academicos.destroy');
    Route::get('academicos/{role}/edit', 'AcademicoController@edit')->name('academicos.edit')
                                                        ->middleware('permission:academicos.edit');

    Route::post('comisiones/store', 'ComisionController@store')->name('comisiones.store')
                                                        ->middleware('permission:comisiones.create');
    Route::get('comisiones', 'ComisionController@index')->name('comisiones.index')
                                                        ->middleware('permission:comisiones.index');
    Route::get('comisiones/create', 'ComisionController@create')->name('comisiones.create')
                                                        ->middleware('permission:comisiones.create');
    Route::put('comisiones/{role}', 'ComisionController@update')->name('comisiones.update')
                                                        ->middleware('permission:comisiones.edit');
    Route::get('comisiones/{role}', 'ComisionController@show')->name('comisiones.show')
                                                        ->middleware('permission:comisiones.show');
    Route::delete('comisiones/{role}', 'ComisionController@destroy')->name('comisiones.destroy')
                                                        ->middleware('permission:comisiones.destroy');
    Route::get('comisiones/{role}/edit', 'ComisionController@edit')->name('comisiones.edit')
                                                        ->middleware('permission:comisiones.edit');

    Route::post('departamentos/store', 'DepartamentoController@store')->name('departamentos.store')
                                                        ->middleware('permission:departamentos.create');
    Route::get('departamentos', 'DepartamentoController@index')->name('departamentos.index')
                                                        ->middleware('permission:departamentos.index');
    Route::get('departamentos/create', 'DepartamentoController@create')->name('departamentos.create')
                                                        ->middleware('permission:departamentos.create');
    Route::put('departamentos/{role}', 'DepartamentoController@update')->name('departamentos.update')
                                                        ->middleware('permission:departamentos.edit');
    Route::get('departamentos/{role}', 'DepartamentoController@show')->name('departamentos.show')
                                                       ->middleware('permission:departamentos.show');
    Route::delete('departamentos/{role}', 'DepartamentoController@destroy')->name('departamentos.destroy')
                                                         ->middleware('permission:departamentos.destroy');
    Route::get('departamentos/{role}/edit', 'DepartamentoController@edit')->name('departamentos.edit')
                                                         ->middleware('permission:departamentos.edit');

    Route::post('evaluaciones/store', 'EvaluacionController@store')->name('evaluaciones.store')
                                                        ->middleware('permission:evaluaciones.create');
    Route::get('evaluaciones', 'EvaluacionController@index')->name('evaluaciones.index')
                                                        ->middleware('permission:evaluaciones.index');
    Route::get('evaluaciones/create', 'EvaluacionController@create')->name('evaluaciones.create')
                                                        ->middleware('permission:evaluaciones.create');
    Route::put('evaluaciones/{role}', 'EvaluacionController@update')->name('evaluaciones.update')
                                                        ->middleware('permission:evaluaciones.edit');
    Route::get('evaluaciones/{role}', 'EvaluacionController@show')->name('evaluaciones.show')
                                                       ->middleware('permission:evaluaciones.show');
    Route::delete('evaluaciones/{role}', 'EvaluacionController@destroy')->name('evaluaciones.destroy')
                                                         ->middleware('permission:evaluaciones.destroy');
    Route::get('evaluaciones/{role}/edit', 'EvaluacionController@edit')->name('evaluaciones.edit')
                                                         ->middleware('permission:evaluaciones.edit');

    Route::post('facultades/store', 'FacultadController@store')->name('facultades.store')
                                                        ->middleware('permission:facultades.create');
    Route::get('facultades', 'FacultadController@index')->name('facultades.index')
                                                        ->middleware('permission:facultades.index');
    Route::get('facultades/create', 'FacultadController@create')->name('facultades.create')
                                                        ->middleware('permission:facultades.create');
    Route::put('facultades/{role}', 'FacultadController@update')->name('facultades.update')
                                                        ->middleware('permission:facultades.edit');
    Route::get('facultades/{role}', 'FacultadController@show')->name('facultades.show')
                                                        ->middleware('permission:facultades.show');
    Route::delete('facultades/{role}', 'FacultadController@destroy')->name('facultades.destroy')
                                                        ->middleware('permission:facultades.destroy');
    Route::get('facultades/{role}/edit', 'FacultadController@edit')->name('facultades.edit')
                                                        ->middleware('permission:facultades.edit');

    Route::post('users/store', 'UserController@store')->name('users.store')
                                                        ->middleware('permission:Users.create');
    Route::get('users', 'UserController@index')->name('users.index')
                                                        ->middleware('permission:Users.index');
    Route::get('users/create', 'UserController@create')->name('users.create')
                                                        ->middleware('permission:Users.create');
    Route::put('users/{role}', 'UserController@update')->name('users.update')
                                                        ->middleware('permission:Users.edit');
    Route::get('users/{role}', 'UserController@show')->name('users.show')
                                                        ->middleware('permission:Users.show');
    Route::delete('users/{role}', 'UserController@destroy')->name('users.destroy')
                                                        ->middleware('permission:Users.destroy');
    Route::get('users/{role}/edit', 'UserController@edit')->name('users.edit')
                                                        ->middleware('permission:Users.edit');
});
