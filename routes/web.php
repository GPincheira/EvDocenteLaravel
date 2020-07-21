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
Route::get('/mapa', 'HomeController@mapa')->name('mapa');
Route::get('/reporteaño/{role}', 'ReporteController@exportEvaluaciones')->name('exportarreporte');
Route::get('/exportar/{role}', 'EvaluacionController@exportAcademico')->name('exportaracademico');
Route::get('/evsjson', 'EvaluacionController@json');
Route::put('/evsjson/actualizar', 'EvaluacionController@update2');
Route::delete('/evsjson/borrar/{id}', 'EvaluacionController@destroy2');
Route::post('/evsjson/guardar', 'EvaluacionController@store2');
Route::get('/evsjson/buscar', 'EvaluacionController@show2');
Route::get('evsjson/evaluar/{role}/ev', 'EvaluacionController@evaluar')->name('evaluaciones.evaluar');
Route::get('reportes', 'ReporteController@index')->name('reportes.index');

//rutas asociadas a los diferentes middlewares de permisos de acceso
Route::middleware(['auth'])->group(function () {
    Route::post('academicos/store', 'AcademicoController@store')->name('academicos.store')
                                                        ->middleware('permission:academicos.create');
    Route::get('academicos', 'AcademicoController@index')->name('academicos.index')
                                                        ->middleware('permission:academicos.index');
    Route::get('academicoselim', 'AcademicoController@indexelim')->name('academicos.indexelim')
                                                        ->middleware('permission:academicos.index');
    Route::get('academicos/create', 'AcademicoController@create')->name('academicos.create')
                                                        ->middleware('permission:academicos.create');
    Route::put('academicosadm/{role}', 'AcademicoController@update2')->name('academicos.update2')
                                                        ->middleware('permission:academicos.edit');
    Route::put('academicos/{role}', 'AcademicoController@update')->name('academicos.update')
                                                        ->middleware('permission:academicos.edit');
    Route::get('academicos/{academico}', 'AcademicoController@show')->name('academicos.show')
                                                        ->middleware('permission:academicos.show');
    Route::delete('academicos/{role}', 'AcademicoController@destroy')->name('academicos.destroy')
                                                        ->middleware('permission:academicos.destroy');
    Route::get('academicos/{academico}/edit', 'AcademicoController@edit')->name('academicos.edit')
                                                        ->middleware('permission:academicos.edit');
    Route::post('academicos/{role}', 'AcademicoController@reactivar')->name('academicos.reactivar')
                                                        ->middleware('permission:academicos.reactivar');

    Route::post('comisiones/store', 'ComisionController@store')->name('comisiones.store')
                                                        ->middleware('permission:comisiones.create');
    Route::get('comisiones', 'ComisionController@index')->name('comisiones.index')
                                                        ->middleware('permission:comisiones.index');
    Route::get('comisiones/create', 'ComisionController@create')->name('comisiones.create')
                                                        ->middleware('permission:comisiones.create');
    Route::put('comisiones/{role}', 'ComisionController@update')->name('comisiones.update')
                                                        ->middleware('permission:comisiones.edit');
    Route::get('comisiones/{comision}', 'ComisionController@show')->name('comisiones.show')
                                                        ->middleware('permission:comisiones.show');
    Route::delete('comisiones/{role}', 'ComisionController@destroy')->name('comisiones.destroy')
                                                        ->middleware('permission:comisiones.destroy');
    Route::get('comisiones/{role}/edit', 'ComisionController@edit')->name('comisiones.edit')
                                                        ->middleware('permission:comisiones.edit');
    Route::post('comisiones/{role}', 'ComisionController@activaunica')->name('comisiones.activaunica')
                                                        ->middleware('permission:comisiones.activaunica');

    Route::post('departamentos/store', 'DepartamentoController@store')->name('departamentos.store')
                                                        ->middleware('permission:departamentos.create');
    Route::get('departamentos', 'DepartamentoController@index')->name('departamentos.index')
                                                        ->middleware('permission:departamentos.index');
    Route::get('departamentoselim', 'DepartamentoController@indexelim')->name('departamentos.indexelim')
                                                        ->middleware('permission:departamentos.index');
    Route::get('departamentos/create', 'DepartamentoController@create')->name('departamentos.create')
                                                        ->middleware('permission:departamentos.create');
    Route::put('departamentos/{role}', 'DepartamentoController@update')->name('departamentos.update')
                                                        ->middleware('permission:departamentos.edit');
    Route::get('departamentos/{departamento}', 'DepartamentoController@show')->name('departamentos.show')
                                                       ->middleware('permission:departamentos.show');
    Route::delete('departamentos/{role}', 'DepartamentoController@destroy')->name('departamentos.destroy')
                                                         ->middleware('permission:departamentos.destroy');
    Route::get('departamentos/{role}/edit', 'DepartamentoController@edit')->name('departamentos.edit')
                                                         ->middleware('permission:departamentos.edit');
    Route::post('departamentos/{role}', 'DepartamentoController@reactivar')->name('departamentos.reactivar')
                                                         ->middleware('permission:departamentos.reactivar');

    Route::post('evaluaciones/store', 'EvaluacionController@store')->name('evaluaciones.store')
                                                        ->middleware('permission:evaluaciones.create');
    Route::get('evaluaciones', 'EvaluacionController@index')->name('evaluaciones.index')
                                                        ->middleware('permission:evaluaciones.index');
    Route::get('evaluacioneselim', 'EvaluacionController@indexelim')->name('evaluaciones.indexelim')
                                                        ->middleware('permission:evaluaciones.index');
    Route::get('evaluaciones2', 'EvaluacionController@index2')->name('evaluaciones.index2')
                                                        ->middleware('permission:evaluaciones.index2');
    Route::get('evaluaciones/create', 'EvaluacionController@create')->name('evaluaciones.create')
                                                        ->middleware('permission:evaluaciones.create');
    Route::put('evaluaciones/{role}', 'EvaluacionController@update')->name('evaluaciones.update')
                                                        ->middleware('permission:evaluaciones.edit');
    Route::get('evaluaciones/{evaluacion}', 'EvaluacionController@show')->name('evaluaciones.show')
                                                       ->middleware('permission:evaluaciones.show');
    Route::delete('evaluaciones/{role}', 'EvaluacionController@destroy')->name('evaluaciones.destroy')
                                                         ->middleware('permission:evaluaciones.destroy');
    Route::get('evaluaciones/{role}/edit', 'EvaluacionController@edit')->name('evaluaciones.edit')
                                                         ->middleware('permission:evaluaciones.edit');
    Route::post('evaluaciones/{role}', 'EvaluacionController@reactivar')->name('evaluaciones.reactivar')
                                                        ->middleware('permission:evaluaciones.reactivar');
    Route::get('evaluaciones2/{role}', 'EvaluacionController@pdf')->name('evaluaciones.pdf')
                                                        ->middleware('permission:evaluaciones.pdf');

    Route::post('facultades/store', 'FacultadController@store')->name('facultades.store')
                                                        ->middleware('permission:facultades.create');
    Route::get('facultades', 'FacultadController@index')->name('facultades.index')
                                                        ->middleware('permission:facultades.index');
    Route::get('facultadeselim', 'FacultadController@indexelim')->name('facultades.indexelim')
                                                        ->middleware('permission:facultades.index');
    Route::get('facultades/create', 'FacultadController@create')->name('facultades.create')
                                                        ->middleware('permission:facultades.create');
    Route::put('facultades/{role}', 'FacultadController@update')->name('facultades.update')
                                                        ->middleware('permission:facultades.edit');
    Route::get('/facultades/{facultad}', 'FacultadController@show')->name('facultades.show')
                                                        ->middleware('permission:facultades.show');
    Route::delete('facultades/{role}', 'FacultadController@destroy')->name('facultades.destroy')
                                                        ->middleware('permission:facultades.destroy');
    Route::get('facultades/{role}/edit', 'FacultadController@edit')->name('facultades.edit')
                                                        ->middleware('permission:facultades.edit');
    Route::post('facultades/{role}', 'FacultadController@reactivar')->name('facultades.reactivar')
                                                        ->middleware('permission:facultades.reactivar');

    Route::post('users/store', 'UserController@store')->name('users.store')
                                                        ->middleware('permission:Users.create');
    Route::post('users/store2', 'UserController@store2')->name('users.store2')
                                                        ->middleware('permission:Users.create2');
    Route::post('users/store3', 'UserController@store3')->name('users.store3')
                                                        ->middleware('permission:Users.create3');
    Route::get('users1', 'UserController@index')->name('users.index')
                                                        ->middleware('permission:Users.index');
    Route::get('users1elim', 'UserController@indexelim')->name('users.indexelim')
                                                        ->middleware('permission:Users.index');
    Route::get('users2', 'UserController@index2')->name('users.index2')
                                                        ->middleware('permission:Users.index2');
    Route::get('users2elim', 'UserController@index2elim')->name('users.index2elim')
                                                        ->middleware('permission:Users.index2');
    Route::get('users3', 'UserController@index3')->name('users.index3')
                                                        ->middleware('permission:Users.index3');
    Route::get('users3elim', 'UserController@index3elim')->name('users.index3elim')
                                                        ->middleware('permission:Users.index3');
    Route::get('users/create', 'UserController@create')->name('users.create')
                                                        ->middleware('permission:Users.create');
    Route::get('users/create2', 'UserController@create2')->name('users.create2')
                                                        ->middleware('permission:Users.create2');
    Route::get('users/create3', 'UserController@create3')->name('users.create3')
                                                        ->middleware('permission:Users.create3');
    Route::put('users/{role}', 'UserController@update')->name('users.update')
                                                        ->middleware('permission:Users.edit');
    Route::get('users/{user}', 'UserController@show')->name('users.show')
                                                        ->middleware('permission:Users.show');
    Route::delete('users/{role}', 'UserController@destroy')->name('users.destroy')
                                                        ->middleware('permission:Users.destroy');
    Route::get('users/{role}/edit', 'UserController@edit')->name('users.edit')
                                                        ->middleware('permission:Users.edit');
    Route::post('users/{role}', 'UserController@reactivar')->name('users.reactivar')
                                                        ->middleware('permission:Users.reactivar');

    Route::get('procesos', 'ProcesoController@index')->name('procesos.index')
                                                        ->middleware('permission:procesos.index');
    Route::post('procesosa/{role}', 'ProcesoController@abrir')->name('procesos.abrir')
                                                        ->middleware('permission:procesos.abrir');
    Route::post('procesosc/{role}', 'ProcesoController@cerrar')->name('procesos.cerrar')
                                                        ->middleware('permission:procesos.cerrar');
    Route::put('procesos/{role}', 'ProcesoController@update')->name('procesos.update')
                                                        ->middleware('permission:procesos.index');
});
