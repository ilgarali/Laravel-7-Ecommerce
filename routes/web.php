<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace('Back')->middleware('is_admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/','AdminController@index')->name('index');
    Route::get('/contact','AdminController@contact')->name('contact');
    Route::delete('/messagedelete/{id}','AdminController@messagedelete')->name('messagedelete');
    Route::resource('/post','PostController');
    Route::resource('/categories','CategoryController');
    Route::post('/categories/fetch','CategoryController@fetch')->name('fetch');
});

Auth::routes();




Route::namespace('Front')->group(function(){
    Route::get('/','FrontController@index')->name('home');
    Route::resource('/cart','CartController');
    
    Route::post('/deletecart','CartController@delete')->name('deletecart');
    Route::get('/checkout','CheckOutController@checkout')->name('checkout');
    Route::get('/contact','ContactController@contact')->name('contact');
    Route::post('/contact','ContactController@contactus')->name('contactus');
    Route::get('/{category}/{product}','FrontController@single')->name('single');
    Route::get('/{category}/','FrontController@category')->name('category');
  
   
});




