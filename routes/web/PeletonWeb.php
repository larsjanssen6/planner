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

Route::get('/peletons', 'Peleton\PeletonController@index')
    ->name('peleton.index');

Route::get('/peletons/aanmaken', 'Peleton\PeletonController@create')
    ->name('peleton.create');

Route::post('/peletons', 'Peleton\PeletonController@store')
    ->name('peleton.store');

Route::get('/peletons/{id}', 'Peleton\PeletonController@show')
    ->name('peleton.show');

Route::get('/peletons/{id}/bewerken', 'Peleton\PeletonController@edit')
    ->name('peleton.edit');

Route::put('/peletons/{id}', 'Peleton\PeletonController@update')
    ->name('peleton.update');

Route::delete('/peletons/{id}', 'Peleton\PeletonController@destroy')
    ->name('peleton.destroy');