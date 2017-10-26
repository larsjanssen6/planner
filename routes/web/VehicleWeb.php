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

Route::get('/voertuigen', 'Vehicle\VehicleController@index')
    ->name('vehicle.index');

Route::get('/voertuigen/create', 'Vehicle\VehicleController@create')
    ->name('vehicle.create');

Route::get('/voertuigen/store', 'Vehicle\VehicleController@store')
    ->name('vehicle.store');

Route::get('/voertuigen/show', 'Vehicle\VehicleController@show')
    ->name('vehicle.show');

Route::get('/voertuigen/edit', 'Vehicle\VehicleController@edit')
    ->name('vehicle.edit');

Route::get('/voertuigen/update', 'Vehicle\VehicleController@update')
    ->name('vehicle.update');

Route::get('/voertuigen/destroy', 'Vehicle\VehicleController@destroy')
    ->name('vehicle.destroy');