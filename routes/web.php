<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ObjectiveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\DashboardController;

// Redirect the root URL to the donations index
Route::get('/', function () {
    return redirect()->route('donations.index');
});

// Donation routes
Route::resource('donations', DonationController::class);

// Outcome routes
Route::resource('outcomes', OutcomeController::class);

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Currency routes
Route::post('/currencies', [CurrencyController::class, 'store'])->name('currencies.store');
Route::put('/currencies/{currency}', [CurrencyController::class, 'update'])->name('currencies.update');
Route::delete('/currencies/{currency}', [CurrencyController::class, 'destroy'])->name('currencies.destroy');

// Objective routes
Route::post('/objectives', [ObjectiveController::class, 'store'])->name('objectives.store');
Route::put('/objectives/{objective}', [ObjectiveController::class, 'update'])->name('objectives.update');
Route::delete('/objectives/{objective}', [ObjectiveController::class, 'destroy'])->name('objectives.destroy');
