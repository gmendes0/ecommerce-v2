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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){
    return view('templates.main');
});

Auth::routes();
Route::resource('/supplier', 'Loja\FornecedoresController');
Route::get('/home', 'HomeController@index')->name('home');
