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

Route::get('/test', function () {
    return "nihao";
});

Route::get('/myTest', function () {
    return view('myMap');
});

Route::get('/games', function () {
    return view('game');
});

Route::get('/game/tankBattle', function () {
    return view('tankBattle');
});

Route::get('/game/moleGame', function () {
    return view('moleGame');
});