<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::middleware(['auth','role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard/admin','index')->name('dashboard.admin');
    });

    Route::controller(SliderController::class)->group(function () {
        Route::get('dashboard/admin/slider','index')->name('dashboard.admin.slider');

        Route::get('dashboard/admin/add-slider','add')->name('dashboard.admin.add-slider');
        Route::post('dashboard/admin/add-slider','store')->name('dashboard.admin.store-slider');

        Route::get('dashboard/admin/edit-slider','edit')->name('dashboard.admin.edit-slider');
        Route::post('dashboard/admin/edit-slider','update')->name('dashboard.admin.update-slider');

        Route::post('dashboard/admin/delete-slider','delete')->name('dashboard.admin.delete-slider');
    });

    Route::controller(BannerController::class)->group(function () {
        Route::get('dashboard/admin/banner','index')->name('dashboard.admin.banner');

        Route::get('dashboard/admin/add-banner','add')->name('dashboard.admin.add-banner');
        Route::post('dashboard/admin/add-banner','store')->name('dashboard.admin.store-banner');

        Route::get('dashboard/admin/edit-banner','edit')->name('dashboard.admin.edit-banner');
        Route::post('dashboard/admin/edit-banner','update')->name('dashboard.admin.update-banner');

        Route::post('dashboard/admin/delete-banner','delete')->name('dashboard.admin.delete-banner');
    });

    Route::controller(AboutController::class)->group(function () {
        Route::get('dashboard/admin/about','index')->name('dashboard.admin.about');

        Route::get('dashboard/admin/add-about','add')->name('dashboard.admin.add-about');

        Route::get('dashboard/admin/edit-about','edit')->name('dashboard.admin.edit-about');
        
        Route::post('dashboard/admin/delete-about','delete')->name('dashboard.admin.delete-about');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('redirect','redirect')->name('redirect')->withoutMiddleware(['guest']);
        Route::get('login','index')->name('login');
        Route::post('login','login')->name('login.attempt')->withoutMiddleware(['guest']);
        Route::get('logout','logout')->name('logout');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('register','index')->name('register');
        Route::post('register','register')->name('register.store');
    });
});