<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LandingController::class)->group(function () {
    Route::get('/','index')->name('home');
    Route::get('product','product')->name('product');
    Route::get('cart','cart')->name('cart');
    Route::get('blog','blog')->name('blog');
    Route::get('about','about')->name('about');
    Route::get('contact','contact')->name('contact');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('dashboard/admin','index')->name('dashboard.admin');
});