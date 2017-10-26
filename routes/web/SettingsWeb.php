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


/*
| Profile settings
*/

Route::get('/instellingen/profiel/{user}', 'Settings\SettingsUserController@index')
    ->name('settings.profile');

Route::put('/instellingen/profiel/{user}', 'Settings\SettingsUserController@update')
    ->name('settings.profile');

/*
| Permission settings
*/

Route::get('/instellingen/permissies', 'Settings\SettingsPermissionController@index')
    ->name('settings.permission');
