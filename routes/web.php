<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:cache');
    // Artisan::call('make:model Item');
    // Artisan::call('make:model Category');
    // Artisan::call('make:controller ItemController');
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

Route::post('/sell', [SellerController::class, 'sellItemAdd'])->name('sell.submit');
Route::get('item/detail/{slug}', [SellerController::class, 'sellItemDetails'])->name('item.detail');
