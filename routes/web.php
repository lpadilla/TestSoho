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
Route::view('/', 'product.list');

Auth::routes();

Route::get('cambiar_contraseña', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.change');
Route::post('cambiar_contraseña', 'Auth\ChangePasswordController@change')->name('password.change.post');