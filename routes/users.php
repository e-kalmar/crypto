<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('user')->name('user.')->group(function(){

    Route::get('/', [UserController::class , 'index'])->name('index');
    Route::put('/create', [UserController::class, 'store'])->name('store');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::put('/{user}/update', [UserController::class , 'update'])->name('profile.update');
    Route::get('/{user}/profile', [UserController::class , 'show'])->name('profile.show');
    Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('destroy');


});