<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('site.index');
Route::get('/register', [RegisterController::class, 'index'])->name('site.register');
Route::resource('users', UserController::class);
Route::post('/login', [UserController::class, 'login']);
Route::get('/login', [UserController::class, 'index'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/logout', [UserController::class, 'logout'])->name('app.logout');
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
});

Route::fallback(function(){
    echo 'The accessed route does not exist! <a href="'.route('site.index').'">Click here</a> to return to the home page';
});