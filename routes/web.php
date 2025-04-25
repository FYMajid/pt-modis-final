<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes - protected by auth middleware
// In routes/web.php
Route::middleware(['web'])->group(function () {
    // Your routes here
    Route::get('/admin/news/get/{id}', [App\Http\Controllers\NewsController::class, 'getNews'])->name('admin.news.get');
    Route::post('/admin/news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::post('/admin/news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::post('/admin/news/destroy/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
    Route::post('/admin/news/move-to-old/{id}', [NewsController::class, 'moveToOld'])->name('admin.news.moveToOld');
});

Route::get('/news', [NewsController::class, 'showNews'])->name('news');


Route::get('/', function () {
    return view('welcome', [
        'title' => 'PT MODIS | Home'
    ]);
});

// Route::get('/news', function () {
//     return view('news', [
//         'title' => 'PT MODIS | News'
//     ]);
// });

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