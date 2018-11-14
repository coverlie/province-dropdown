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

Route::get('/', 'ProvinceController@index');
Route::post('/amphoe', 'ProvinceController@fetchAmphoe')->name('fetchAmphoe');
Route::post('/district', 'ProvinceController@fetchDistrict')->name('fetchDistrict');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test',function(){
    return view('test');
});
