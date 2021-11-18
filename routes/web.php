<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class , 'index'])->name('user.index');
Route::put('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::put('/users/{user}/update', [UserController::class , 'update'])->name('user.profile.update');
Route::get('/users/{user}/profile', [UserController::class , 'show'])->name('user.profile.show');
Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/cars/create', [CarController::class, 'create'])->name('car.create');
Route::get('/cars', [CarController::class, 'index'])->name('car.index');
Route::put('/cars', [CarController::class, 'store'])->name('car.store');
Route::delete('/cars/{car}/destroy', [CarController::class, 'destroy'])->name('car.destroy');
Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('car.edit');
Route::patch('/cars/{car}/update', [CarController::class, 'update'])->name('car.update');

// CRYPTO CONTROLLER RELATED
Route::get('/crypto', [CryptoController::class, 'index'])->name('crypto.index');
Route::get('/crypto/store', [CryptoController::class, 'store'])->name('crypto.store');
Route::get('/crypto/{id}/coin', [CryptoController::class, 'show'])->name('crypto.show');

// FAVORITES CONTROLLER
Route::post('/favorites', [FavoritesController::class, 'store'])->name('favorites.store');
Route::get('/watchlist', [FavoritesController::class, 'watchlist'])->name('favorites.watchlist');

Auth::routes();

//Route::middleware('auth')->group(function (){
//    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
//});
