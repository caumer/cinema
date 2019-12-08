<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| POST, GET, PUT, DELETE
*/

Route::get('/','FrontController@index');
Route::get('top','FrontController@top');
Route::get('login','FrontController@login');
Route::get('admin','FrontController@admin');

Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');

Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

Route::resource('mail','MailController');
Route::resource('usuario','UsuarioController');
Route::resource('genero','GeneroController');
Route::resource('pelicula','MovieController');

// Rutas para la calificacion y filtro por genero
Route::resource('calificacion','CalificacionController');
Route::post('top/genero','CalificacionController@show');


Route::resource('log','LogController');
Route::get('logout','LogController@logout');
