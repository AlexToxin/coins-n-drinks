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

Route::get('/', 'MainController@main');
Route::get('/admin', 'AdminController@main');

// API
Route::prefix('/api') -> group(function ()
{
    Route::post('/throwCoin', 'ApiController@throwCoin');
    Route::post('/getDrink', 'ApiController@getDrink');
});

Auth::routes();

// Дебаг
Route::prefix('/debug') -> group(function ()
{
    Route::get('/', 'DebugController@home');
    Route::get('/test/{model}({number})->{function}', 'DebugController@test');
    Route::get('/{model}', 'DebugController@main'); // всегда последним
});
