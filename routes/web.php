<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'title' => 'PT MODIS | Home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'PT MODIS | About'
    ]);
});
