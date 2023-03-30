<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;

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
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('staff.dashboard');
});

// Route::get('/reports', function () {
//     return view('staff.reports');
// });

// All Reports
Route::get('/reports', [ReportController::class, 'index']);

// Create Report
Route::get('/reports/create', [ReportController::class, 'create']);

// Store Report
Route::post('/reports', [ReportController::class, 'store']);

// Show Edit Form
Route::get('/reports/{report}/edit', [ReportController::class, 'edit']);

// Update Report
Route::put('/reports/{report}', [ReportController::class, 'update']);

// Delete Report
Route::delete('/reports/{report}', [ReportController::class, 'destroy']);

// Single Report
Route::get('/reports/{report}', [ReportController::class, 'show']);

// Show Register Form
Route::get('/register', [UserController::class, 'create']);
