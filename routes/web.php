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
    return redirect()->route('film.index');
});

Route::get('film', [
    'uses' => 'Film\\FilmController@index',
    'as' => 'film.index'
]);

Route::get('film/create', [
    'uses' => 'Film\\FilmController@create',
    'as' => 'film.create'
]);

Route::get('film/{film}', [
    'uses' => 'Film\\FilmController@show',
    'as' => 'film.show'
]);

Route::post('film/store', [
    'uses' => 'Film\\FilmController@store',
    'as' => 'film.store'
]);

Route::post('comment/store', [
    'uses' => 'Comment\\CommentController@store',
    'as' => 'comment.store'
]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
