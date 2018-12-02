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

Route::get('/', function () {
    return view('welcome');
});

// Дебаг
Route::prefix('/debug') -> group(function ()
{
    Route::get('/', 'DebugController@home');
    Route::get('/test/{model}({number})->{function}', 'DebugController@test');
    Route::get('/{model}', 'DebugController@main'); // всегда последним
});
