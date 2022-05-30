<?php

use App\Http\Controllers\Api\GoogleController;
use App\Http\Controllers\SkillMatrixController;
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

Route::prefix('auth/google')->name('google.')->group(function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::get('skill-matrix/index', [SkillMatrixController::class, 'index'])->name('skill-matrix.index');
Route::post('skill-matrix/store', [SkillMatrixController::class, 'store'])->name('skill-matrix.store');



Route::controller(App\Http\Controllers\LevelController::class)->prefix('levels')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('levels.index');
    Route::get('/create', 'create')->name('levels.create');
    Route::post('/store', 'store')->name('levels.store');
    Route::get('/{id}/edit', 'edit')->name('levels.edit');
    Route::put('/{id}/update', 'update')->name('levels.update');
    Route::delete('/{id}/destroy', 'destroy')->name('levels.destroy');
});