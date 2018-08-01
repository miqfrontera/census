<?php

Route::get('/', function () {
    return view('home');
});

// TODO create url for emigrants

Route::get('/emigrants', 'EmigrantsController@index');
Auth::routes();
