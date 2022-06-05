<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
 utes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers'], function(){

    // Route::get('/', 'PageController@index');

    // Route::get('/blog', 'BlogController@index')->name('indexBlog');
    // Route::delete('/blog/delete/{id}', 'BlogController@delete')->name('deleteBlog');

    // AUTH ROUTE
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    // ROLEADMIN ROUTES
    Route::group(['middleware' => 'RoleAdmin'], function(){
        Route::get('/admin', 'HomeController@admin');

        Route::get('/categories', 'CategoryController@index')->name('indexCategory');
        Route::post('/categories', 'CategoryController@store')->name('storeCategory');
        Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('editCategory');
        Route::put('/categories/edit/{id}', 'CategoryController@update')->name('updateCategory');
        Route::delete('/categories/delete/{id}', 'CategoryController@delete')->name('deleteCategory');


        Route::get('/blogs', 'BlogController@index')->name('indexBlog');
        Route::post('/blogs', 'BlogController@store')->name('storeBlog');
        Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('editBlog');
        Route::put('/blogs/edit/{id}', 'BlogController@update')->name('updateBlog');
        Route::delete('/blogs/delete/{id}', 'BlogController@delete')->name('deleteBlog');

    });

    // ROLEUSER ROUTES
    Route::group(['middleware' => 'RoleUser'], function(){
        Route::get('/user', 'HomeController@user');
        // Route::post('/blog', 'BlogController@store')->name('storeBlog');
        // Route::get('/blog/edit/{id}', 'BlogController@edit')->name('editBlog');
        // Route::put('/blog/edit/{id}', 'BlogController@update')->name('updateBlog');
    });
});
