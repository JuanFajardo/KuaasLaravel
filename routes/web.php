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
    return view('welcome');
});

Route::resource('Bien', 'BienController');
Route::get('Computadoras/{id}', 'BienController@computadoras');

Route::resource('Inventario', 'InventarioController');
Route::get('Inventario/{id}/Global', 'InventarioController@global');
Route::post('Inventario/create', 'InventarioController@datos');

Route::get('reporte/{id}', 'BienController@reporte');
