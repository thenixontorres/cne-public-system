<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'auth'], function () {
  
  //Modulos exclusivos para Administradores
  Route::group(['middleware' => 'Admin'], function () {

    Route::resource('users', 'userController');
    
  });

  Route::resource('titulars', 'titularController');

  Route::resource('receptors', 'receptorController');

  Route::resource('solicitantes', 'solicitanteController');
  Route::resource('solicituds', 'solicitudController');

  Route::resource('tipoactas', 'tipoactaController');
});

// Login
Route::get('/', [
    'uses'  => 'Auth\AuthController@getLogin',
    'as'    => 'auth.login'
]);
Route::post('/', [
  'uses'  => 'Auth\AuthController@postLogin',
   'as'    => 'auth.login'
]);
Route::get('/logout', [
  'uses'  => 'Auth\AuthController@getLogout',
   'as'    => 'auth.logout'
]);