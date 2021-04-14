<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
});

Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
    Route::get('/confirm/{guestBook}', [AdminHomeController::class, 'confirm'])->name('confirm');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/delete/{guestBook}', [AdminHomeController::class, 'delete'])->name('delete');
});
