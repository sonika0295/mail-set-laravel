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
    return 'Cache cleared, optimized, and .env file refreshed successfully.';
});



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/buy', [HomeController::class, 'buy'])->name('buy');
Route::get('/sell', [HomeController::class, 'sell'])->name('sell');
Route::get('/request', [HomeController::class, 'request'])->name('request');
Route::get('/setting', [HomeController::class, 'setting'])->name('setting');
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/data/{type}', [HomeController::class, 'course'])->name('data');



Route::get('/signup', [HomeController::class, 'signup'])->name('signup');


Route::post('/signup', [HomeController::class, 'signupSubmit'])->name('signup.submit');
Route::get('/email-verify/{user_id}', [HomeController::class, 'emailVerifyForm'])->name('email.verify.form');
Route::post('/email/verify', [HomeController::class, 'emailVerify'])->name('email.verify');
Route::post('/email/resend', [HomeController::class, 'resend'])->name('email.resend');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'loginSubmit'])->name('login.submit');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');




Route::post('/setting', [HomeController::class, 'settingUpdate'])->name('setting.update');
