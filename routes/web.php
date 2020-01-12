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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'MainController@index');

Route::get('/books', 'BooksController@index');
Route::get('/book/add', 'BooksController@create')->name('book.create');
Route::post('/book/add', 'BooksController@create')->name('book.create');
Route::get('/book/edit/{id}', 'BooksController@edit')->name('book.edit');
Route::get('/book/delete/{id}', 'BooksController@delete')->name('book.delete');

Route::get('/authors', 'AuthorsController@index');
Route::get('/author/add', 'AuthorsController@create')->name('author.create');
Route::post('/author/add', 'AuthorsController@create')->name('author.create');
Route::get('/author/edit/{id}', 'AuthorsController@edit')->name('author.edit');
Route::get('/author/delete/{id}', 'AuthorsController@delete')->name('author.delete');
Route::post('/author/store', 'AuthorsController@store')->name('author.store');

Route::get('/home', 'HomeController@index')->name('home');
