<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {

    // Route::get('login', 'AdminAuthController@login')->name('login');
    Route::get('/login', 'AdminAuthController@login')->name('login');
    Route::post('/attempt', 'AdminAuthController@attempt')->name('attempt');

    Route::middleware('admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('index');
        Route::get('/logout', 'AdminController@logout')->name('logout');
    });
});
