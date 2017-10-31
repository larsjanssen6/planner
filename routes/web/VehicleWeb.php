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

Route::get('/voertuigen/aanmaken', 'Vehicle\VehicleController@create')
    ->name('vehicle.create');

Route::post('/voertuigen', 'Vehicle\VehicleController@store')
    ->name('vehicle.store');

Route::get('/voertuigen/{vehicle}', 'Vehicle\VehicleController@show')
    ->name('vehicle.show');

Route::get('/voertuigen/{vehicle}/bewerken', 'Vehicle\VehicleController@edit')
    ->name('vehicle.edit');

Route::put('/voertuigen/{vehicle}', 'Vehicle\VehicleController@update')
    ->name('vehicle.update');

Route::delete('/voertuigen/{vehicle}', 'Vehicle\VehicleController@destroy')
    ->name('vehicle.destroy');