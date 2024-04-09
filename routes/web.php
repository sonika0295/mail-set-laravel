<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:cache');
    Artisan::call('view:clear');
    // Artisan::call('make:model Contact');
    // Artisan::call('make:model Course');
    return 'Cache cleared, optimized, and .env file refreshed successfully.';
});



Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/assignment', [HomeController::class, 'index'])->name('assignment');
Route::get('/course', [HomeController::class, 'index'])->name('course');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/data/{type}', [HomeController::class, 'course'])->name('data');
Route::get('/details/{type}/{slug}', [HomeController::class, 'courseDetails'])->name('details');
Route::post('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');



// Route::get('/', [HomeController::class, 'home'])->name('home');
// Route::get('/signup', [HomeController::class, 'signup'])->name('signup');


// Route::post('/signup', [HomeController::class, 'signupSubmit'])->name('signup.submit');
// Route::get('/email-verify/{user_id}', [HomeController::class, 'emailVerifyForm'])->name('email.verify.form');
// Route::post('/email/verify', [HomeController::class, 'emailVerify'])->name('email.verify');
// Route::post('/email/resend', [HomeController::class, 'resend'])->name('email.resend');
// Route::get('/login', [HomeController::class, 'login'])->name('login');
// Route::post('/login', [HomeController::class, 'loginSubmit'])->name('login.submit');



// Route::get('/buy', [HomeController::class, 'home'])->name('buy');
// Route::get('/sell', [HomeController::class, 'home'])->name('sell');
// Route::get('/get_request', [HomeController::class, 'home'])->name('get_request');
// Route::get('/logout', [HomeController::class, 'home'])->name('logout');
// Route::get('/sign_in', [HomeController::class, 'home'])->name('sign_in');
// Route::get('/setting', [HomeController::class, 'home'])->name('setting');
