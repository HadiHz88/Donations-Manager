<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\StatisticsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect the root URL to the donations index
Route::get('/', function () {
    return redirect()->route('donations.index');
});

// Donation routes
Route::resource('donations', DonationController::class);

// Outcome routes
Route::resource('outcomes', OutcomeController::class);

// Statistics route
Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
