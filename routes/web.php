<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserAccountController;
use App\Models\Favourite;
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

// Добавление в избранное
Route::prefix('favourite')->group(function () {
    Route::get('/', [FavouriteController::class, 'index'])->name('favourite');
    Route::post('/{advertisement}', [FavouriteController::class, 'store'])->name('favourite.store');
    Route::delete('/{advertisement}', [FavouriteController::class, 'destroy'])->name('favourite.delete');
});

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/aboutUs', [AboutUsController::class, 'index'])->name('aboutUs');

Route::prefix('reviews')->controller(ReviewController::class)->as('review.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
});

Route::prefix('/advertisements')->group(function () {
    Route::get('/create', [AdvertisementController::class, 'create'])->middleware('auth')->name('advertisement.create');


    Route::get('/', [AdvertisementController::class, 'index'])->name('advertisement.index');

    Route::post('/', [AdvertisementController::class, 'store'])->name('advertisement.store');

    Route::get('/{advertisement}', [AdvertisementController::class, 'show'])->name('advertisement.show');

    Route::get('/{advertisement}/edit', [AdvertisementController::class, 'edit'])->name('advertisement.edit');
    Route::patch('/{advertisement}', [AdvertisementController::class, 'update'])->name('advertisement.update');
    Route::delete('/{advertisement}', [AdvertisementController::class, 'destroy'])->name('advertisement.delete');
});

// Авторизация && Регистрация && Logout
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');


Route::get('/user', [UserAccountController::class, 'index'])->middleware('auth')->name('user');
Route::get('/user/advertisements', [UserAccountController::class, 'myAdvertisements'])->middleware('auth')->name('user.advertisements');


Route::get('/admin', [AdminPanelController::class, 'index'])->middleware('admin')->name('admin.index');
Route::get('/admin/advertisements', [AdminPanelController::class, 'showAll'])->middleware('admin')->name('admin.advertisement');
Route::get('/admin/expected-advertisements', [AdminPanelController::class, 'showExpected'])->middleware('admin')->name('admin.advertisement.expected');
Route::patch('/admin/advertisements/{advertisement}', [AdminPanelController::class, 'changeStatus'])->middleware('admin')->name('admin.advertisement.changeStatus');
