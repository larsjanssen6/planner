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

Route::get('/groepen', 'Group\GroupController@index')
    ->name('group.index');

Route::get('/groepen/aanmaken', 'Group\GroupController@create')
    ->name('group.create');

Route::post('/groepen', 'Group\GroupController@store')
    ->name('group.store');

Route::get('/groepen/{id}', 'Group\GroupController@show')
    ->name('group.show');

Route::get('/groepen/{id}/bewerken', 'Group\GroupController@edit')
    ->name('group.edit');

Route::put('/groepen/{id}', 'Group\GroupController@update')
    ->name('group.update');

Route::delete('/groepen/{id}', 'Group\GroupController@destroy')
    ->name('group.destroy');