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

Route::get('/books', 'BooksController@index')->name('books');
Route::get('/book/add', 'BooksController@create')->name('book.add');
Route::post('/book/store', 'BooksController@store')->name('book.store');
Route::get('/book/edit/{id}', 'BooksController@edit')->name('book.edit');
Route::post('/book/update/{id}', 'BooksController@update')->name('book.update');
Route::get('/book/delete/{id}', 'BooksController@delete')->name('book.delete');


Route::get('/authors', 'AuthorsController@index')->name('authors');
Route::get('/author/add', 'AuthorsController@create')->name('author.add');
Route::post('/author/store', 'AuthorsController@store')->name('author.store');
Route::get('/author/edit/{id}', 'AuthorsController@edit')->name('author.edit');
Route::post('/author/update/{id}', 'AuthorsController@update')->name('author.update');
Route::get('/author/delete/{id}', 'AuthorsController@delete')->name('author.delete');

Route::get('/home', 'HomeController@index')->name('home');
