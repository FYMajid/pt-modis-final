<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'title' => 'PT MODIS | Home'
    ]);
});

Route::get('/news', function () {
    return view('news', [
        'title' => 'PT MODIS | Berita'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'PT MODIS | About'
    ]);
});


Route::get('/service', function () {
    return view('service', [
        'title' => 'PT MODIS | Layanan'
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'PT MODIS | Kontak'
    ]);
});