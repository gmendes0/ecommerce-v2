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

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/', '/product');
Route::resource('/supplier', 'Loja\FornecedoresController');
Route::resource('/product', 'Loja\ProdutosController');
Route::get('/photo/{id}/upload', 'Loja\PhotosController@create')->name('photo.create');
Route::post('/photo/{id}/store', 'Loja\PhotosController@store')->name('photo.store');
Route::resource('/photo', 'Loja\PhotosController')->except(['create', 'store']);
