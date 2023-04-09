<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;

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

Route::middleware('auth', 'isStudent')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    });

    // All Reports
    Route::get('/reports', [ReportController::class, 'index']);

    // Create Report Form
    Route::get('/reports/create', [ReportController::class, 'create']);

    // Store Report
    Route::post('/reports', [ReportController::class, 'store']);

    // Delete Report
    Route::delete('/reports/{report}', [ReportController::class, 'destroy']);

    // Manage Reports
    Route::get('/reports/manage', [ReportController::class, 'manage']);

    // Single Report
    Route::get('/reports/{report}', [ReportController::class, 'show']);

    // Show Edit Profile
    Route::get('/profile/{student}/edit', [StudentController::class, 'edit']);

    // Update Profile
    Route::put('/profile/{student}', [StudentController::class, 'update']);

    // Show Profile
    Route::get('/profile/{student}', [StudentController::class, 'show']);
});

Route::prefix('staff')->middleware('auth', 'isStaff')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('staff.dashboard');
    });

    // All Reports
    Route::get('/reports', [ReportController::class, 'index']);

    // Create Report Form
    Route::get('/reports/create', [ReportController::class, 'create']);

    // Create Report For Single Student Form
    Route::get('/reports/create/{student}', [ReportController::class, 'create_student_report']);

    // Store Report
    // Route::post('/reports', [ReportController::class, 'store']);

    // Store Report
    Route::post('/reports/by/{student}', [ReportController::class, 'store_student_report']);

    // Show Edit Form
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit']);

    // Update Report
    Route::put('/reports/{report}', [ReportController::class, 'update']);

    // Delete Report
    Route::delete('/reports/{report}', [ReportController::class, 'destroy']);

    // Manage Reports
    Route::get('/reports/manage', [ReportController::class, 'manage']);

    // All Students
    Route::get('/students', [StudentController::class, 'index']);

    // Create New Student
    Route::get('/students/create', [StudentController::class, 'create']);

    // Store New Student
    Route::post('/students', [StudentController::class, 'store']);

    // Show Edit Student Form
    Route::get('/students/{student}/edit', [StudentController::class, 'edit']);

    // Update Student
    Route::put('/students/{student}', [StudentController::class, 'update']);

    // Show Single Student
    Route::get('/students/{student}', [StudentController::class, 'show']);

    // Delete Report
    Route::delete('/students/{student}', [StudentController::class, 'destroy']);

    // Single Report
    Route::get('/reports/{report}', [ReportController::class, 'show']);

    // Show Edit Profile
    Route::get('/profile/{staff}/edit', [StaffController::class, 'edit']);

    // Update Profile
    Route::put('/profile/{staff}', [StaffController::class, 'update']);

    // Show Profile
    Route::get('/profile/{staff}', [StaffController::class, 'show']);
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
