<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::middleware('guest')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});
Route::get('signout', [AuthController::class, 'signOut'])->name('logout');
Route::post('order', [OrderController::class, 'store'])->middleware('auth')->name('order');
Route::get('checkout', [OrderController::class, "show"])->middleware("auth")->name("checkout");
Route::get('callback', [OrderController::class, "callback"])->name("callback");