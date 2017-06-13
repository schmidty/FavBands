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
Route::resource('bands', 'BandController');
Route::resource('albums', 'AlbumController');

Route::post('/albums/{id}/edit', 'AlbumController@edit');
Route::post('/bands/{id}/edit', 'BandController@edit');
Route::post('/albumsfiltered', 'AlbumController@filtered');

Route::get('/', function () {
    return redirect('/bands');
});

Route::get('/homepage', function () {
    return redirect('/bands');
});

