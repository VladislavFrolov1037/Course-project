<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserAccountController;
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

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/aboutUs', [AboutUsController::class, 'index'])->name('aboutUs');

Route::prefix('favourites')->controller(FavouriteController::class)->group(function () {
    Route::get('/', 'index')->name('favourite');
    Route::post('/{advertisement}', 'store')->name('favourite.store');
    Route::delete('/{advertisement}', 'destroy')->name('favourite.delete');
});

Route::group(['prefix' => 'reviews', 'controller' => 'ReviewController', 'as' => 'review.'], function () {
    Route::get('/', 'index')->name('index');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/create', 'create')->middleware('auth')->name('create');
        Route::post('/', 'store')->middleware('auth')->name('store');
        Route::delete('/{review}', 'destroy')->middleware('auth')->name('delete');
    });
});

Route::prefix('advertisements')->controller(AdvertisementController::class)->as('advertisement.')->group(function () {
    Route::get('/create', 'create')->middleware('auth')->name('create');
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->middleware('auth')->name('store');
    Route::get('/{advertisement}', 'show')->name('show');
    Route::get('/{advertisement}/edit', 'edit')->middleware('auth')->name('edit');
    Route::patch('/{advertisement}', 'update')->middleware('auth')->name('update');
    Route::delete('/{advertisement}', 'destroy')->middleware('auth')->name('delete');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth')  ->name('logout');

Route::prefix('user')->controller(UserAccountController::class)->middleware('auth')->group(function () {
    Route::get('', 'index')->name('user.index');
    Route::get('/profile', 'editProfile')->name('user.edit');
    Route::patch('/profile/{user}', 'updateProfile')->name('user.update');
    Route::get('/advertisements', 'getUserAdvertisements')->name('user.advertisements');
    Route::get('/reviews', 'getUserReviews')->name('user.reviews');
});

Route::prefix('admin')->controller(AdminPanelController::class)->middleware('admin')->as('admin.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/advertisements', 'showAll')->name('advertisement');
    Route::get('/expected-advertisements', 'showExpected')->name('advertisement.expected');
    Route::patch('/advertisements/{advertisement}', 'changeStatus')->name('advertisement.changeStatus');
});
