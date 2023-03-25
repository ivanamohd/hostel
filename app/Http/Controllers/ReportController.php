<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // All Reports
    public function index()
    {
        // dd(request('status'));
        return view('staff.reports.index', [
            'reports' => Report::latest()->filter(request(['status', 'search']))->get()
        ]);
    }

    // Single Report
    public function show(Report $report)
    {
        return view('staff.reports.show', [
            'report' => $report
        ]);
    }

    // Create Report
    public function create()
    {
        return view('reports.create');
    }
}
