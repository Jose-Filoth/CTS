<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/tasks', [TaskController::class, 'showTasksPage'])->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');




