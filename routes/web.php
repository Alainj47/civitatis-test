<?php

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

Route::get('/', function () {
    return view('actividades.index');
});


Route::get('actividades', 'ActividadesController@index')->name('actividades');
Route::post('buscar', 'ActividadesController@search')->name('buscar');
Route::get('comprar', 'ActividadesController@reservar')->name('comprar');
