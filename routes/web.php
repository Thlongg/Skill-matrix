<?php

use App\Http\Controllers\Api\GoogleController;
use App\Http\Controllers\SkillMatrixController;
use App\Repositories\SkillMatrixRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(App\Http\Controllers\UserController::class)->prefix('users')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('users.index');
    Route::get('/create', 'create')->name('users.create');
    Route::post('/store', 'store')->name('users.store');
    Route::get('/{id}/edit', 'edit')->name('users.edit');
    Route::put('/{id}/update', 'update')->name('users.update');
    Route::delete('/{id}/destroy', 'destroy')->name('users.destroy');
});

Route::prefix('auth/google')->name('google.')->group(function () {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');

    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::get('skill-matrix/index', [SkillMatrixController::class, 'index'])->name('skill-matrix.index');
Route::post('skill-matrix/store', [SkillMatrixController::class, 'storeOrUpdate'])->name('skill-matrix.store');


Route::controller(App\Http\Controllers\LevelController::class)->prefix('levels')->middleware('auth')->group(function (
) {
    Route::get('', 'index')->name('levels.index');
    Route::get('/create', 'create')->name('levels.create');
    Route::post('/store', 'store')->name('levels.store');
    Route::get('/{id}/edit', 'edit')->name('levels.edit');
    Route::put('/{id}/update', 'update')->name('levels.update');
    Route::delete('/{id}/destroy', 'destroy')->name('levels.destroy');
});

Route::controller(App\Http\Controllers\CategoryController::class)->prefix('categories')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('categories.index');
    Route::get('/create', 'create')->name('categories.create');
    Route::post('/store', 'store')->name('categories.store');
    Route::get('/{id}/edit', 'edit')->name('categories.edit');
    Route::put('/{id}/update', 'update')->name('categories.update');
    Route::delete('/{id}/destroy', 'destroy')->name('categories.destroy');
});


Route::controller(App\Http\Controllers\SubCategoryController::class)->prefix('subcategories')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('subcategories.index');
    Route::get('/create', 'create')->name('subcategories.create');
    Route::post('/store', 'store')->name('subcategories.store');
    Route::get('/edit/{id}', 'edit')->name('subcategories.edit');
    Route::put('/{id}/update', 'update')->name('subcategories.update');
    Route::delete('/{id}/destroy', 'destroy')->name('subcategories.destroy');
});

Route::controller(App\Http\Controllers\ProductController::class)->prefix('products')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('products.index');
    Route::get('/create', 'create')->name('products.create');
    Route::post('/store', 'store')->name('products.store');
    Route::get('/edit/{id}', 'edit')->name('products.edit');
    Route::put('/{id}/update', 'update')->name('products.update');
    Route::delete('/{id}/destroy', 'destroy')->name('products.destroy');
});


Route::get('test', function () {
    return view('layouts.dasbroard');
})->name('test');

Route::get('shop', function () {
    return view('layouts.shop');
})->name('shop');

Route::get('detail', function () {
    return view('layouts.detail');
})->name('detail');

Route::get('cart', function () {
    return view('layouts.cart');
})->name('cart');

Route::get('checkout', function () {
    return view('layouts.checkout');
})->name('checkout');

Route::get('contact', function () {
    return view('layouts.contact');
})->name('contact');

Route::controller(App\Http\Controllers\RoleController::class)->prefix('roles')->middleware('auth')->group(function (
) {
    Route::get('', 'index')->name('roles.index');
    Route::get('/create', 'create')->name('roles.create');
    Route::post('/store', 'store')->name('roles.store');
    Route::get('/{id}/edit', 'edit')->name('roles.edit');
    Route::put('/{id}/update', 'update')->name('roles.update');
    Route::delete('/{id}/destroy', 'destroy')->name('roles.destroy');
});
