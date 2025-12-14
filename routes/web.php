<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassificationController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\GuestController;

Route::get('/', [GuestController::class, 'home'])->name('home');

// User Authentication (public)
use App\Http\Controllers\Auth\LoginController as UserLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController as FrontCartController;

Route::get('login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserLoginController::class, 'login'])->name('login.post');
Route::post('logout', [UserLoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

// Public guest pages
Route::get('about', [GuestController::class, 'about'])->name('about');
Route::get('contact', [GuestController::class, 'contact'])->name('contact');
Route::get('books', [GuestController::class, 'books'])->name('books');

// Cart routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('cart', [FrontCartController::class, 'index'])->name('cart.index');
    Route::post('cart', [FrontCartController::class, 'store'])->name('cart.store');
    Route::put('cart/{cart}', [FrontCartController::class, 'update'])->name('cart.update');
    Route::delete('cart/{cart}', [FrontCartController::class, 'destroy'])->name('cart.destroy');
    Route::post('checkout', [FrontCartController::class, 'checkout'])->name('cart.checkout');
});

// Admin Authentication
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login.post');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('classifications', ClassificationController::class)->names([

        'index' => 'classifications.index',
        'create' => 'classifications.create',
        'store' => 'classifications.store',
        'show' => 'classifications.show',
        'edit' => 'classifications.edit',
        'update' => 'classifications.update',
        'destroy' => 'classifications.destroy',
    ]);

    Route::resource('types', TypeController::class)->names([
        'index' => 'types.index',
        'create' => 'types.create',
        'store' => 'types.store',
        'edit' => 'types.edit',
        'update' => 'types.update',
        'destroy' => 'types.destroy',
    ]);

    Route::resource('books', BookController::class)->names([
        'index' => 'books.index',
        'create' => 'books.create',
        'store' => 'books.store',
        'edit' => 'books.edit',
        'update' => 'books.update',
        'destroy' => 'books.destroy',
    ]);

    Route::resource('carts', CartController::class)->only([
        'index', 'destroy'
    ])->names([
        'index' => 'carts.index',
        'destroy' => 'carts.destroy',
    ]);

    Route::resource('categories', CategoryController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);
});
