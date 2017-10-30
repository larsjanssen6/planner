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

Route::post('/opleidingen', 'Education\EducationController@store')
    ->name('education.store');

Route::get('/opleidingen/{id}/tonen', 'Education\EducationController@show')
    ->name('education.show');

Route::get('/opleidingen/{id}/bewerken', 'Education\EducationController@edit')
    ->name('education.edit');

Route::put('/opleidingen/{id}', 'Education\EducationController@update')
    ->name('education.update');

Route::delete('/opleidingen/{id}', 'Education\EducationController@destroy')
    ->name('education.destroy');