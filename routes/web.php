<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\auth\LoginController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DistrictController;
use App\Http\Controllers\backend\DivisionController;
use App\Http\Controllers\backend\LiveTVController;
use App\Http\Controllers\backend\NoticeController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\PrayerTimeController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->group(function () {
    // login routes
    Route::get('login', [LoginController::class, 'loginPage'])->name('admin.loginPage');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');

    Route::middleware(['auth'])->group(function () {
        // dashboard routes
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        // logout routes
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
        // admin profile routes
        Route::get('profile', [AdminController::class, 'profilePage'])->name('admin.profilePage');
        Route::post('profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::get('change/password', [AdminController::class, 'changePasswordPage'])->name('admin.changePasswordPage');
        Route::post('change/password', [AdminController::class, 'changePassword'])->name('admin.changePassword');
        Route::post('change/image', [AdminController::class, 'changeImage'])->name('admin.changeImage');
        // resource routes
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubcategoryController::class);
        Route::resource('division', DivisionController::class);
        Route::resource('district', DistrictController::class);
        Route::resource('post', PostController::class);
        //ajax routes
        Route::get('change/category/status/{id}', [CategoryController::class, 'changeStatus']);
        Route::get('change/subcategory/status/{id}', [SubcategoryController::class, 'changeStatus']);
        Route::get('get/subcategory/{id}', [PostController::class, 'getSubcategory']);
        Route::get('get/district/{id}', [PostController::class, 'getDistrict']);

        // setting routes
        Route::prefix('/setting')->group(function () {
            // social setting routes
            Route::get('social', [SettingController::class, 'socialSettingPage'])->name('social.settingPage');
            Route::post('social', [SettingController::class, 'socialSettingUpdate'])->name('social.settingUpdate');
            // seo setting routes
            Route::get('seo', [SettingController::class, 'seoSettingPage'])->name('seo.settingPage');
            Route::post('seo', [SettingController::class, 'seoSettingUpdate'])->name('seo.settingUpdate');
        });
        // widget routes
        Route::prefix('/widget')->group(function () {
            // prauer time routes
            Route::get('prayer/time', [PrayerTimeController::class, 'prayerTimeWidgetPage'])->name('prayerTime.widgetPage');
            Route::post('prayer/time', [PrayerTimeController::class, 'prayerTimeWidgetUpdate'])->name('prayerTime.widgetUpdate');
            // live tv routes
            Route::get('live/tv', [LiveTVController::class, 'liveTVWidgetPage'])->name('liveTV.widgetPage');
            Route::post('live/tv', [LiveTVController::class, 'liveTVWidgetUpdate'])->name('liveTV.widgetUpdate');
            Route::get('live/tv/status', [LiveTVController::class, 'changeStatus'])->name('liveTV.changeStatus');
            // notice routes
            Route::get('notice', [NoticeController::class, 'noticePage'])->name('notice.widgetPage');
            Route::post('notice', [NoticeController::class, 'noticeUpdate'])->name('notice.widgetUpdate');
            Route::get('notice/status', [NoticeController::class, 'changeStatus'])->name('notice.changeStatus');
        });
    });
});
