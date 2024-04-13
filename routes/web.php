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
    return 'Cache cleared, optimized, and .env file refreshed successfully.';
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/buy', 'buy')->name('buy');

    Route::get('/request', 'request')->name('request');
    Route::get('/contact',  'contact');
    Route::get('/signup',  'signup')->name('signup');
    Route::post('/signup',  'signupSubmit')->name('signup.submit');
    Route::get('/email-verify/{user_id}', 'emailVerifyForm')->name('email.verify.form');
    Route::post('/email/verify', 'emailVerify')->name('email.verify');
    Route::post('/email/resend', 'resend')->name('email.resend');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginSubmit')->name('login.submit');

    Route::middleware('auth')->group(function () {
        Route::get('/sell', 'sell')->name('sell');
        Route::get('/setting', 'setting')->name('setting');
        Route::post('/setting', 'settingUpdate')->name('setting.update');
        Route::get('/logout', 'logout')->name('logout');
    });
});

Route::controller(SellerController::class)->group(function () {
    Route::middleware('auth')->group(function () {

        Route::get('/sell/add', 'sellItemAddForm')->name('sell.add');
        Route::post('/sell/add', 'sellItemAdd')->name('sell.add.submit');
        Route::get('/sell/edit/{id}', 'SellEdit')->name('sell.edit');
        Route::post('/sell/update', 'SellUpdate')->name('sell.update');
        Route::delete('/sell/{id}/delete', 'SellDelete')->name('sell.delete');
        Route::get('item/detail/{slug}', 'sellItemDetails')->name('item.detail');
    });
});


Route::fallback(function () {
    return view('error.404');
});
