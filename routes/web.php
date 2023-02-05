<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::Routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function () {
    //Admin-dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Admin-Category
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('admin.add-category');
    Route::post('/add-store-category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('/update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{category_id}', [CategoryController::class, 'delete']);

    //Admin-Posts
    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts');
    Route::get('/add-post', [PostController::class, 'create'])->name('admin.add-post');
    Route::post('/store-post', [PostController::class, 'store'])->name('admin.post.store');
});
