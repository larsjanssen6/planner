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

Route::get('/groepen/create', 'Group\GroupController@create')
    ->name('group.create');

Route::get('/groepen/store', 'Group\GroupController@store')
    ->name('group.store');

Route::get('/groepen/show', 'Group\GroupController@show')
    ->name('group.show');

Route::get('/groepen/edit', 'Group\GroupController@edit')
    ->name('group.edit');

Route::get('/groepen/update', 'Group\GroupController@update')
    ->name('group.update');

Route::get('/groepen/destroy', 'Group\GroupController@destroy')
    ->name('group.destroy');