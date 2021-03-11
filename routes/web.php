<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'HomeController@index')->name('home');

//Curriculums (Hojas de Vida)
Route::get('curriculum', 'Curriculum\CurriculumController@index')->name('curriculum')->middleware('auth');
Route::get('curriculum/create', 'Curriculum\CurriculumController@create')->name('create_curriculum')->middleware('auth');
Route::post('curriculum', 'Curriculum\CurriculumController@store')->name('store_curriculum')->middleware('auth');
Route::get('curriculum/{id}/edit', 'Curriculum\CurriculumController@edit')->name('edit_curriculum')->middleware('auth');
Route::put('curriculum/{id}', 'Curriculum\CurriculumController@update')->name('update_curriculum')->middleware('auth');
Route::delete('curriculum/{id}', 'Curriculum\CurriculumController@destroy')->name('delete_curriculum')->middleware('auth');

//Pruebas 
Route::get('prueba', 'Prueba\PruebaController@index')->name('prueba')->middleware('auth');
Route::get('prueba/create', 'Prueba\PruebaController@create')->name('create_prueba')->middleware('auth');
Route::get('prueba_envio', 'Prueba\PruebaController@envioPrueba')->name('prueba_envio')->middleware('auth');
Route::post('store_prueba', 'Prueba\PruebaController@CesarGuardar')->name('store_prueba')->middleware('auth');
Route::get('prueba/{id}/edit', 'Prueba\PruebaController@edit')->name('edit_prueba')->middleware('auth');
Route::put('prueba/{id}', 'Prueba\PruebaController@update')->name('update_prueba')->middleware('auth');
Route::delete('prueba/{id}', 'Prueba\PruebaController@destroy')->name('delete_prueba')->middleware('auth');
Route::post('prueba/complete/{id}', 'Prueba\PruebaController@postComplete')->name('aprobado_prueba')->middleware('auth');

//Cupos
Route::get('seleccion', 'Cupos\CuposController@index')->name('seleccion')->middleware('auth');
Route::get('seleccion/create', 'Cupos\CuposController@create')->name('create_seleccion')->middleware('auth');
Route::post('seleccion', 'Cupos\CuposController@store')->name('store_seleccion')->middleware('auth');
Route::get('seleccion/{id}/edit', 'Cupos\CuposController@edit')->name('edit_seleccion')->middleware('auth');
Route::put('seleccion/{id}', 'Cupos\CuposController@update')->name('update_seleccion')->middleware('auth');
Route::delete('seleccion/{id}', 'Cupos\CuposController@destroy')->name('delete_seleccion')->middleware('auth');

// Entrevista
Route::get('entrevista', 'Entrevista\EntrevistaController@index')->name('entrevista')->middleware('auth');
Route::get('entrevista/create', 'Entrevista\EntrevistaController@create')->name('entrevista.create')->middleware('auth');/* Es mejor esta nomenclatura entrevista.create */
Route::post('entrevista', 'Entrevista\EntrevistaController@store')->name('entrevista.store')->middleware('auth');
Route::post('entrevista/complete/{id}', 'Entrevista\EntrevistaController@postComplete')->name('entrevista.aprobado')->middleware('auth');

//Contrato
Route::get('contrato','Contrato\ContratoController@index')->name('contrato')->middleware('auth');
Route::get('contrato/create','Contrato\ContratoController@create')->name('contrato.create')->middleware('auth');
Route::post('contrato', 'Contrato\ContratoController@store')->name('contrato.store')->middleware('auth');


