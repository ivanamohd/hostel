<?php

use App\Http\Controllers\ReportController;
use App\Models\Report;
use Illuminate\Support\Facades\Route;

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

// Single Report
Route::get('/reports/{report}', [ReportController::class, 'show']);

// Create Report
Route::get('/reports/create', [ReportController::class, 'create']);
