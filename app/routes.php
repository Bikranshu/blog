<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', array('as' => 'home', 'uses' => 'App\Controllers\HomeController@index'));
Route::get('detail/{id}', array('as' => 'detail', 'uses' => 'App\Controllers\HomeController@detail'));
Route::get('all', array('as' => 'all', 'uses' => 'App\Controllers\HomeController@all'));

Route::get('login', array('as' => 'login', 'uses' => 'App\Controllers\Backend\AuthController@getLogin'));
Route::post('auth/login', array('as' => 'auth.login', 'uses' => 'App\Controllers\Backend\AuthController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'App\Controllers\Backend\AuthController@getLogout'));


Route::group(array('before' => 'auth'), function() {

    Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'App\Controllers\Backend\DashboardController@index'));
    Route::get('post', array('as' => 'post', 'uses' => 'App\Controllers\Backend\PostController@index'));
    Route::get('post', array('as' => 'post', 'uses' => 'App\Controllers\Backend\PostController@index'));
    Route::get('post/add', array('as' => 'post.add', 'uses' => 'App\Controllers\Backend\PostController@add'));
    Route::get('post/edit/{id}', array('as' => 'post.edit', 'uses' => 'App\Controllers\Backend\PostController@edit'))->where(array('id' => '[0-9]+'));
    Route::post('post/store', array('as' => 'post.store', 'uses' => 'App\Controllers\Backend\PostController@store'));
    Route::put('post/update', array('as' => 'post.update', 'uses' => 'App\Controllers\Backend\PostController@update'));
    Route::get('post/destroy/{id}', array('as' => 'post.destroy', 'uses' => 'App\Controllers\Backend\PostController@destroy'))->where(array('id' => '[0-9]+'));
});
