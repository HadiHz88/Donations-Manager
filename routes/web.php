<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;

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

Route::get('/', [DonationController::class, 'index']);

// Donation CRUD routes
Route::get('/donations/create', [DonationController::class, 'create']);
Route::post('/donations', [DonationController::class, 'store']);
Route::get('/donations/{id}/edit', [DonationController::class, 'edit']);
Route::put('/donations/{id}', [DonationController::class, 'update']);
Route::delete('/donations/{id}', [DonationController::class, 'destroy']);

// UI Test page
Route::get('/test', function() {
  return view('test');
});