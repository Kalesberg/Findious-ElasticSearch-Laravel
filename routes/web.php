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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('cat.insert');
});
Route::post('/addcate', 'CatController@insert');
Route::get('/showcat', 'CatController@index')->name('showcat');
Route::get('/maplist', function (){
    return view('cat.maplist');
});

Route::get('/mapshow', 'CatController@indexmap')->name('mapshow');
Route::get('/edit/{id}', 'CatController@edit')->name('edit');
Route::get('/detele/{id}/', 'CatController@delete')->name('delete');
Route::get('/data/{id}', 'CatController@data')->name('data');
Route::get('/datalin', 'CatController@datalin')->name('datalin');
Route::get('/mdetele/{id}', 'CatController@mdelete')->name('mdelete');
Route::get('/medit/{id}', 'CatController@medit')->name('medit');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
