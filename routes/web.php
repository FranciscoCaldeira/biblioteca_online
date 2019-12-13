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

/* Public pages*/
Route::get('/', function () {
    return view('page.home');
});

Route::get('/about', function () {
    return view('page.about');
});

Route::get('/contact', function () {
    return view('page.contact');
});


Route::get('/faqs', function () {
    return view('page.faqs');
});

Auth::routes();

// Route::get('/books/',function(){ return "books route reached";});
// Route::get('/books/',function(){ return view('books.books'); }); //pasta books/books
// Route::get('/books/','BooksController@index');    //controlador e método


//Zona privada (com o name dá para fazer redirects)
Route::get('/home', 'HomeController@index')->name('home'); //home normal é po user

