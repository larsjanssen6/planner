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

Route::get('/peletons/create', 'Peleton\PeletonController@create')
    ->name('peleton.create');

Route::get('/peletons/store', 'Peleton\PeletonController@store')
    ->name('peleton.store');

Route::get('/peletons/show', 'Peleton\PeletonController@show')
    ->name('peleton.show');

Route::get('/peletons/edit', 'Peleton\PeletonController@edit')
    ->name('peleton.edit');

Route::get('/peletons/update', 'Peleton\PeletonController@update')
    ->name('peleton.update');

Route::get('/peletons/destroy', 'Peleton\PeletonController@destroy')
    ->name('peleton.destroy');