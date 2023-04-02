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
            'reports' => Report::latest()->filter(request(['status', 'search']))->paginate(7)
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
        return view('staff.reports.create');
    }

    // Store Report
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->file('photo'));

        $formFields = $request->validate([
            'category' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'status' => 'required',
            'hostel' => 'required',
        ]);

        if ($request->hasFile('evidence')) {
            $formFields['evidence'] = $request->file('evidence')->store('evidence', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Report::create($formFields);

        return redirect('/reports')->with('message', 'Ticket created successfully!');
    }

    // Show Edit Form
    public function edit(Report $report)
    {
        // dd($report->category);
        return view('staff.reports.edit', ['report' => $report]);
    }

    // Update Report
    public function update(Request $request, Report $report)
    {
        // Make sure logged in user is owner
        if ($report->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'category' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'status' => 'required',
            'hostel' => 'required',
        ]);

        if ($request->hasFile('evidence')) {
            $formFields['evidence'] = $request->file('evidence')->store('evidence', 'public');
        }

        $report->update($formFields);

        return back()->with('message', 'Ticket updated successfully!');
    }

    // Delete Report
    public function destroy(Report $report)
    {
        // Make sure logged in user is owner
        if ($report->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $report->delete();
        return redirect('/reports')->with('message', 'Ticket deleted!');
    }

    // Manage Reports
    public function manage()
    {
        return view('staff.reports.manage', [
            // dd(auth()->user()->reports)
            'reports' => Report::latest()->where('user_id', auth()->user()->id)->paginate(7)
        ]);
    }
}
