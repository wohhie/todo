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

Route::get('/', $home = array('uses' => 'AuthController@home'));

Route::get('/login', $getLogin = array(
    'uses' => 'AuthController@getLogin',
    'middleware'    =>  'guest',
));

Route::post('/login', $postLogin = array(
    'uses' => 'AuthController@postLogin',
    'middleware'    =>  'guest',
));

Route::get('/logout', 'AuthController@logout');


Route::resource('todo', 'TodoController');
Route::resource('user', 'UserController');
