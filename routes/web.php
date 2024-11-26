<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MiniStoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFilesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishController;
use App\Http\Middleware\isApproved;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/','index');
    Route::get('dashboard','dashboard')->middleware('auth',isApproved::class);
    Route::get('/wishlist', 'wishlist')->middleware('auth');
    Route::get('/products/{id}', 'product');
});
Route::middleware('auth')->group(function () {
    Route::resources([
        'product' => ProductController::class,
        'wish' => WishController::class,
        'review' => ReviewController::class,
        'chat' => ChatController::class,
        'pfile' => ProductFilesController::class,
        'ministore' => MiniStoreController::class,
        'user' => UserController::class,
    ]);
});