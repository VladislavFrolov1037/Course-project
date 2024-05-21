<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminConsultationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFeedbacksController;
use App\Http\Controllers\Admin\AdminMeetingController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\FeedbackRequestController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MeetingController;
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
    Route::get('/', 'index')->name('favourites');
    Route::post('/{advertisement}', 'store')->name('favourites.store');
    Route::delete('/{advertisement}', 'destroy')->name('favourites.destroy');
});

Route::group(['prefix' => 'reviews', 'controller' => 'ReviewController', 'as' => 'reviews.'], function () {
    Route::get('/', 'index')->name('index');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/create', 'create')->middleware('auth')->name('create');
        Route::post('/', 'store')->middleware('auth')->name('store');
        Route::delete('/{review}', 'destroy')->middleware('auth')->name('delete');
    });
});

Route::prefix('advertisements')->controller(AdvertisementController::class)->as('advertisements.')->group(function () {
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

    Route::get('/reset', [RegisterController::class, 'editPassword'])->name('editPassword');
    Route::patch('/reset', [RegisterController::class, 'reset'])->name('reset');
});

Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::prefix('user')->controller(UserAccountController::class)->as('users.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/profile', 'editProfile')->name('edit');
    Route::patch('/profile/{user}', 'updateProfile')->name('update');
    Route::get('/advertisements', 'getUserAdvertisements')->name('advertisements');
    Route::get('/reviews', 'getUserReviews')->name('reviews');
});

Route::prefix('meetings')->controller(MeetingController::class)->as('meetings.')->group(function () {
    Route::post('/', 'store')->name('store');
});

Route::prefix('feedback')->controller(FeedbackRequestController::class)->as('feedbacks.')->group(function () {
    Route::post('/', 'store')->name('store');
});

Route::prefix('consultations')->controller(ConsultationController::class)->as('consultations.')->group(function () {
    Route::post('/', 'store')->name('store');
});

Route::prefix('admin')->middleware('admin')->as('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::prefix('users')->controller(AdminUserController::class)->as('users.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::patch('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');
    });

    Route::prefix('advertisements')->controller(AdminAdvertisementController::class)->as('advertisements.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/expected', 'showExpected')->name('expected');
        Route::get('/{advertisement}/edit', 'edit')->name('edit');
        Route::get('/{advertisement}', 'show')->name('show');
        Route::patch('/{advertisement}/status', 'changeStatus')->name('changeStatus');
        Route::patch('/{advertisement}', 'update')->name('update');
    });

    Route::prefix('consultations')->controller(AdminConsultationController::class)->as('consultations.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/expected', 'expected')->name('expected');
        Route::get('/current', 'current')->name('current');
        Route::patch('/{consultation}/status', 'changeStatus')->name('changeStatus');
        Route::delete('/{consultation}', 'destroy')->name('destroy');
    });

    Route::prefix('reviews')->controller(AdminReviewController::class)->as('reviews.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/expected', 'expected')->name('expected');
        Route::get('/cancelled', 'cancelled')->name('cancelled');
        Route::patch('/{review}/status', 'changeStatus')->name('changeStatus');
        Route::delete('/{review}', 'destroy')->name('destroy');
    });

    Route::prefix('feedbacks')->controller(AdminFeedbacksController::class)->as('feedbacks.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/approve', 'approve')->name('approve');
        Route::patch('/{feedback}/status', 'changeStatus')->name('changeStatus');
        Route::delete('/{feedback}', 'destroy')->name('destroy');
    });

    Route::prefix('meetings')->controller(AdminMeetingController::class)->as('meetings.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/current', 'current')->name('current');
        Route::patch('/{meeting}/status', 'changeStatus')->name('changeStatus');
    });
});
Route::get('/pdf/{meeting}', [AdminMeetingController::class, 'pdf'])->name('pdf');
Route::get('/pdf/{meeting}/download', [AdminMeetingController::class, 'downloadPdf'])->name('meeting.download');
