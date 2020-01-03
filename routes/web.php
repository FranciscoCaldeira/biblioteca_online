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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Role;

Route::get('/', function () {
    if (empty(Auth::user())) {
        $role = config('constants.roles.visitante');
    } else {
        $role = Role::get_user_role();
    }
    if (empty(session('locale'))) {
        App::setLocale('pt');
    } else {
        App::setLocale(session('locale'));
    }

    return view('page.homepage', ['role'  => $role]);
});

Route::get('/about', function () {
    App::setLocale(session('locale'));
    return view('page.about');
});

Route::get('/en', function () {
    if (empty(Auth::user())) {
        $role = config('constants.roles.visitante');
    } else {
        $role = Role::get_user_role();
    }
    App::setLocale(session('locale'));
    App::setLocale('en');
    session(['locale' => 'en']);
    return view('page.homepage', ['role'  => $role]);
});

Route::get('/pt', function () {
    if (empty(Auth::user())) {
        $role = config('constants.roles.visitante');
    } else {
        $role = Role::get_user_role();
    }
    App::setLocale(session('locale'));
    App::setLocale('pt');
    session(['locale' => 'pt']);
    return view('page.homepage', ['role'  => $role]);
});


Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact/submit', 'ContactController@add')->name('add_contact');

Route::get('/faq', 'FaqController@index')->name('faq');
Route::post('/faq/post_faq', 'FaqController@add')->name('post_faq');
Route::post('/faq/delete/{id}', 'FaqController@delete');
Route::post('/faq/update/{id}', 'FaqController@update');


Auth::routes();

Route::get('/book','BookController@index')->name('book');
Route::post('/book/add','BookController@add')->name('add_book');
Route::get('/book/{id}','BookController@showDetails');
Route::get('/book/delete/{id}','BookController@destroy')->name('delete_book');//tentei post e não funfa

Route::get('/request','RequestController@index')->name('request');
Route::post('/request/add/{book_id}','RequestController@add');


Route::post('/request/cancel/{request_id}','RequestController@cancel_request');

Route::post('/request/accept/{request_id}','RequestController@accept_request');
Route::post('/request/reject/{request_id}','RequestController@reject_request');
Route::post('/request/return/{request_id}','RequestController@return_request');


Route::get('/home', 'HomeController@index')->name('home');

/*Super admin pages*/
Route::get('/users','UserController@index')->name('users');
Route::post('/user/block','UserController@block_user')->name('block_user');
Route::post('/user/change_role','UserController@change_role_user')->name('change_user_role');

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });

