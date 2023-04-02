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

// Route::get('/dashboard', function () {
//     return view('student.dashboard');
// });

Route::prefix('staff')->middleware('auth', 'isStaff')->group(function () {
    // All Reports
    Route::get('/reports', [ReportController::class, 'index']);

    // Create Report Form
    Route::get('/reports/create', [ReportController::class, 'create']);

    // Store Report
    Route::post('/reports', [ReportController::class, 'store']);

    // Show Edit Form
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit']);

    // Update Report
    Route::put('/reports/{report}', [ReportController::class, 'update']);

    // Delete Report
    Route::delete('/reports/{report}', [ReportController::class, 'destroy']);

    // Manage Reports
    Route::get('/reports/manage', [ReportController::class, 'manage']);

    // Single Report
    Route::get('/reports/{report}', [ReportController::class, 'show']);
});

// Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
