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

Route::get('/opleidingen', 'Education\EducationController@index')
    ->name('education.index');

Route::get('/opleidingen/create', 'Education\EducationController@create')
    ->name('education.create');

Route::get('/opleidingen/store', 'Education\EducationController@store')
    ->name('education.store');

Route::get('/opleidingen/show', 'Education\EducationController@show')
    ->name('education.show');

Route::get('/opleidingen/edit', 'Education\EducationController@edit')
    ->name('education.edit');

Route::get('/opleidingen/update', 'Education\EducationController@update')
    ->name('education.update');

Route::get('/opleidingen/destroy', 'Education\EducationController@destroy')
    ->name('education.destroy');