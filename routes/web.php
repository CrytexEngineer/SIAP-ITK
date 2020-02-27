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



Auth::routes();

Route::get('/home','HomeController@index')->name('home')->middleware('home');
Route::get('/superadmin', 'SuperAdminController@index')->name('superadmin')->middleware('superadmin');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/observer', 'ObserverController@index')->name('observer')->middleware('observer');
Route::get('/warek', 'WarekController@index')->name('warek')->middleware('warek');
Route::get('/kajur', 'KajurController@index')->name('kajur')->middleware('kajur');
Route::get('/kaprodi', 'KaprodiController@index')->name('kaprodi')->middleware('kaprodi');
Route::get('/dikjur', 'DikjurController@index')->name('dikjur')->middleware('dikjur');
Route::get('/diksat', 'DiksatController@index')->name('diksat')->middleware('diksat');
Route::get('/dosen', 'DosenController@index')->name('dosen')->middleware('dosen');


