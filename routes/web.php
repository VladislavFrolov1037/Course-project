<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/products', 'ProductsController@index')->name('product.index');

Route::get('/', 'MainController@index')->name('main');
Route::get('/feedback', 'FeedBackController@index')->name('feedback');
Route::get('/aboutUs', 'AboutUsController@index')->name('aboutUs');



Route::post('/products', 'ProductsController@store')->name('product.store');

Route::get('/products/create', 'ProductsController@create')->middleware('auth')->name('products.create');

Route::get('/products/{product}', 'ProductsController@show')->name('product.show');
Route::get('/products/{product}/edit', 'ProductsController@edit')->name('product.edit');
Route::patch('/products/{product}', 'ProductsController@update')->name('product.update');
Route::delete('/products/{product}', 'ProductsController@destroy')->name('product.delete');

// Авторизация && Регистрация
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
//Route::get('/authorization', 'RegisterController@create')->name('authorization');



Route::get('/user', 'UserAccountController@index')->middleware('auth')->name('user');
