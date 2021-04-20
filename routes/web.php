<?php

use Illuminate\Support\Facades\Route;

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
Route::get('home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', 'ProductController');

Route::resource('fournisseurs', 'FournisseurController');

Route::resource('personnels', 'PersonnelController');

Route::resource('materiels', 'MaterielController');

Route::resource('directions','DirectionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ajaxRequest', 'AjaxController@ajaxRequest');
Route::post('ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');
