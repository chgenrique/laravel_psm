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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('contact', function () {
    return view('pages.contact');
});

//Route::resource('category', 'Manage\RegisterCategoryController');
//Route::resource('account', 'Manage\AccountController');


//Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function () {
//    Route::resource('sites', 'SiteController');
//    Route::resource('books', 'BooksController');
//});

//Route::group(['middleware' => ['web','role:admin'], 'as' => 'users.' ,
//    'prefix' => 'users', 'namespace' => 'Modules\Auth\Http\Controllers'], function()

Route::group(['prefix' => 'manage', 'namespace' => 'Manage'], function()
{
    Route::resource('category', 'RegisterCategoryController');
    Route::resource('account', 'AccountController');

//    Route::post('/testing/{{id}}',[
//        'uses' => 'TestController@testMethod',
//        'as' => 'test.route'
//    ]);

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
