<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('web')->group(function () {
    Route::get('/admin/careers', [CareerController::class, 'index']);
    Route::get('/admin/careers/{id}', [CareerController::class, 'show']);
    Route::post('/admin/careers', [CareerController::class, 'store']);
    Route::put('/admin/careers/{id}', [CareerController::class, 'update']);
    Route::delete('/admin/careers/{id}', [CareerController::class, 'destroy']);
});


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
    $hotNews = \App\Models\News::where('type', 'hot')
        ->orderBy('created_at', 'desc')
        ->take(2)
        ->get();
        
    return view('welcome', [
        'title' => 'PT MODIS | Home',
        'hotNews' => $hotNews
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

Route::get('/career', function () {
    $careers = \App\Models\Career::latest()->get(); // Ambil data careers dari database
    return view('career', [
        'title' => 'PT MODIS | Career',
        'careers' => $careers // Pass careers variable to view
    ]);
});