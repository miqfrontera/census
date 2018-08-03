<?php

Route::get('/', function () {
    return view('home');
});

// TODO create url for emigrants

Route::get('/emigrants', 'EmigrantsController@index');

// Auth routes
Route::get('login')
    ->name('auth.login.form')
    ->uses('Auth\LoginController@showLoginForm');
Route::post('login')
    ->name('auth.login')
    ->uses('Auth\LoginController@login');
Route::get('logout')
    ->name('auth.logout')
    ->uses('Auth\LoginController@logout');
Route::post('password/email')
    ->name('auth.password.email')
    ->uses('Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset')
    ->name('auth.password.reset.form')
    ->uses('Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/reset')
    ->name('auth.password.reset')
    ->uses('Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}')
    ->where('token', '[A-Za-z0-9]+')
    ->name('auth.password.reset.token.form')
    ->uses('Auth\ResetPasswordController@showResetForm');
