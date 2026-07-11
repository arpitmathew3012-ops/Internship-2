<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\GamesController;
use App\Http\Controllers\Admin\MovieController;

Route::get('/', [HomeController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Games CRUD
Route::get('games', [GamesController::class, 'index'])->name('games');
Route::get('add-game', [GamesController::class, 'create'])->name('games.create');
Route::post('save-game', [GamesController::class, 'store'])->name('games.store');
Route::resource('games', GamesController::class);

// Movies CRUD
Route::get('movies', [MovieController::class, 'index'])->name('movies');
Route::get('add-movie', [MovieController::class, 'create'])->name('movies.create');
Route::post('save-movie', [MovieController::class, 'store'])->name('movies.store');
Route::get('edit-movie/{movie}', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('update-movie/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('delete-movie/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
