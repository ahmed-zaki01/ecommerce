<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {

    // login routes
    Route::get('/login', 'AdminAuthController@login')->name('login');
    Route::post('/attempt', 'AdminAuthController@attempt')->name('attempt');

    // reset password routes
    Route::get('/forget-password', 'AdminAuthController@forget_password')->name('forget_password');
    Route::post('/handle-forget-password', 'AdminAuthController@handle_forget_password')->name('handle_forget_password');
    Route::get('/reset-password/{token}', 'AdminAuthController@reset_password')->name('reset_password');
    Route::post('/handle-reset-password/{token}', 'AdminAuthController@handle_reset_password')->name('handle_reset_password');



    Route::middleware('admin')->group(function () {
        Route::get('/', 'DashboardController@index')->name('index');
        Route::get('/logout', 'DashboardController@logout')->name('logout');
    });
});
