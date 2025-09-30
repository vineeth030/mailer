<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/emails/compose', [EmailController::class, 'create'])->name('emails.compose');
    Route::post('/emails', [EmailController::class, 'store'])->name('emails.store');

    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::post('/plans/{plan}/select', [PlanController::class, 'select'])->name('plans.select');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
