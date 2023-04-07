<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // All Reports
    public function index()
    {
        $user = auth()->user();
        // dd(request('status'));

        if ($user->role == 1) {
            return view('staff.reports.index', [
                'reports' => Report::latest()->filter(request(['status', 'priority', 'search']))->paginate(7),
                'active' => Report::latest()->where('status', '!=', 'Resolved')->filter(request(['status', 'priority', 'search']))->paginate(7),
                'past' => Report::latest()->where('status', '=', 'Resolved')->filter(request(['status', 'priority', 'search']))->paginate(7),
            ]);
        } else {
            return view('student.reports.index', [
                'reports' => Report::latest()->where('user_id', $user->id)->filter(request(['status', 'search']))->paginate(7),
                'past' => Report::latest()->where([['user_id', $user->id], ['status', '=', 'Resolved']])->filter(request(['status', 'search']))->paginate(7)
            ]);
        }
    }

    // Single Report
    public function show(Report $report)
    {
        $user = auth()->user();

        if ($user->role == 1) {
            return view('staff.reports.show', [
                'report' => $report,
                'student' => $report->join('users', 'users.id', '=', 'reports.user_id')->select('users.name', 'users.email', 'users.contact', 'users.block', 'users.floor', 'users.room')
                    ->where('users.id', $report->user_id)->first()
            ]);
        } else {
            return view('student.reports.show', [
                'report' => $report,
                'student' => $report->join('users', 'users.id', '=', 'reports.user_id')->select('users.name', 'users.email', 'users.contact', 'users.block', 'users.floor', 'users.room')
                    ->where('users.id', $report->user_id)->first()
            ]);
        }
    }

    // Create Report
    public function create()
    {
        $user = auth()->user();

        if ($user->role == 1) {
            return view('staff.reports.create');
        } else {
            if ($user->contact != NULL && $user->block != NULL && $user->floor != NULL && $user->room != NULL) {
                return view('student.reports.create');
            } else {
                return redirect('/profile' . '/' . $user->id . '/edit')->with('alert', 'Please complete your profile before creating tickets');
            }
        }
    }

    // Store Report
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->file('photo'));
        $user = auth()->user();

        if ($user->role == 1) {
            $formFields = $request->validate([
                'category' => 'required',
                'description' => 'required',
                'status' => 'required',
                'contact' => 'required',
                'hostel' => 'required',
                'block' => 'required',
                'floor' => 'required',
                'room' => 'required',
                'role' => 'required',
                'evidence' => 'required',
            ]);

            if ($request->hasFile('evidence')) {
                $formFields['evidence'] = $request->file('evidence')->store('evidence', 'public');
            }

            $formFields['user_id'] = auth()->id();

            Report::create($formFields);

            return redirect('/staff/reports')->with('message', 'Ticket created successfully!');
        } else {
            // dd(auth()->user()->hostel);
            $formFieldsStudent = $request->validate([
                'category' => 'required',
                'description' => 'required',
            ]);

            if ($request->hasFile('evidence')) {
                $formFieldsStudent['evidence'] = $request->file('evidence')->store('evidence', 'public');
            }

            $formFieldsStudent['user_id'] = auth()->id();
            $formFieldsStudent['hostel'] = auth()->user()->hostel;
            $formFieldsStudent['block'] = auth()->user()->block;
            $formFieldsStudent['floor'] = auth()->user()->floor;
            $formFieldsStudent['room'] = auth()->user()->room;
            $formFieldsStudent['status'] = 'Pending';
            $formFieldsStudent['priority'] = 'Unassigned';
            $formFieldsStudent['role'] = 0;

            Report::create($formFieldsStudent);

            return redirect('/reports')->with('message', 'Ticket created successfully!');
        }
    }

    // Show Edit Form
    public function edit(Report $report)
    {
        // dd($report->category);
        return view('staff.reports.edit', [
            'report' => $report,
            'student' => $report->join('users', 'users.id', '=', 'reports.user_id')->select('users.name', 'users.email', 'users.contact', 'users.block', 'users.floor', 'users.room')
                ->where('users.id', $report->user_id)->first()
        ]);
    }

    // Update Report
    public function update(Request $request, Report $report)
    {
        // dd($report);
        $user = auth()->user();

        if ($user->role == 1) {
            $formFields = $request->validate([
                'category' => 'required',
                'description' => 'required',
                'priority' => 'required',
                'status' => 'required',
            ]);

            if ($request->hasFile('evidence')) {
                $formFields['evidence'] = $request->file('evidence')->store('evidence', 'public');
            }

            $report->update($formFields);

            return redirect('/reports')->with('message', 'Ticket updated successfully!');
        } else {
            // Make sure logged in user is owner
            if ($report->user_id != auth()->id()) {
                abort(403, 'Unauthorized Action');
            }

            $formFields = $request->validate([
                'category' => 'required',
                'description' => 'required',
                'priority' => 'required',
                'status' => 'required',
                'contact' => 'required',
                'hostel' => 'required',
                'block' => 'required',
                'floor' => 'required',
                'room' => 'required',
                'role' => 'required',
            ]);

            if ($request->hasFile('evidence')) {
                $formFields['evidence'] = $request->file('evidence')->store('evidence', 'public');
            }

            $report->update($formFields);

            return back()->with('message', 'Ticket updated successfully!');
        }
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