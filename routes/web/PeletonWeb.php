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

Route::get('/peletons/{peleton}', 'Peleton\PeletonController@show')
    ->name('peleton.show');

Route::get('/peletons/{peleton}/bewerken', 'Peleton\PeletonController@edit')
    ->name('peleton.edit');

Route::put('/peletons/{peleton}', 'Peleton\PeletonController@update')
    ->name('peleton.update');

Route::delete('/peletons/{peleton}', 'Peleton\PeletonController@destroy')
    ->name('peleton.destroy');