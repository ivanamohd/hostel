<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Student;
use Illuminate\Http\Request;
use Exception;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    // All Reports
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 1) {
            return view('staff.reports.index', [
                'reports' => Report::latest()->where('hostel', '=', $user->hostel)->filter(request(['status', 'priority', 'search']))->paginate(7),
                'active' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '!=', 'Resolved'], ['assign', '!=', 'Unassigned']])->filter(request(['status', 'priority', 'search']))->paginate(7),
                'past' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '=', 'Resolved']])->filter(request(['status', 'priority', 'search']))->paginate(7),

                'assign' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '!=', 'Resolved'], ['assign', '=', $user->name]])->filter(request(['status', 'priority', 'search']))->paginate(7),
                'assign_resolved' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '=', 'Resolved'], ['assign', '=', $user->name]])->filter(request(['status', 'priority', 'search']))->paginate(7),
                'user' => $user,
            ]);
        } else {
            return view('student.reports.index', [
                'reports' => Report::latest()->where('user_id', $user->id)->filter(request(['status', 'search']))->paginate(7),
                'past' => Report::latest()->where([['user_id', $user->id], ['status', '=', 'Resolved']])->filter(request(['status', 'search']))->paginate(7),
                'active' => Report::latest()->where([['status', '!=', 'Resolved'], ['user_id', '=', $user->id]])->paginate(7),
            ]);
        }
    }

    // Single Report
    public function show(Report $report)
    {
        $user = auth()->user();

        // 'student' => $report->join('users', 'users.id', '=', 'reports.user_id')->select('users.name', 'users.email', 'users.contact', 'users.block', 'users.floor', 'users.room')
        //             ->where('users.id', $report->user_id)->first()

        $exist = User::where('id', '=', $report->user_id)->first();

        if ($user->role == 1) {
            return view('staff.reports.show', [
                'report' => $report,
                'exist' => $exist,
            ]);
        } else {
            return view('student.reports.show', [
                'report' => $report,
                'pic' => Report::join('users', 'users.name', '=', 'reports.assign')->select('users.id', 'users.name')->where('users.name', $report->assign)->first(),
            ]);
        }
    }

    // Create Report
    public function create()
    {
        $user = auth()->user();

        if ($user->role == 1) {
            // create_student_report
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
            // store_student_report
        } else {
            $formFieldsStudent = $request->validate([
                'category' => 'required',
                'description' => 'required|max:150',
            ]);

            if ($request->hasFile('evidence')) {
                $formFieldsStudent['evidence'] = $request->file('evidence')->store('evidence', 's3');
            }

            $formFieldsStudent['user_id'] = auth()->id();
            $formFieldsStudent['name'] = auth()->user()->name;
            $formFieldsStudent['email'] = auth()->user()->email;
            $formFieldsStudent['contact'] = auth()->user()->contact;
            $formFieldsStudent['hostel'] = auth()->user()->hostel;
            $formFieldsStudent['block'] = auth()->user()->block;
            $formFieldsStudent['floor'] = auth()->user()->floor;
            $formFieldsStudent['room'] = auth()->user()->room;
            $formFieldsStudent['status'] = 'Pending';
            $formFieldsStudent['priority'] = 'Unassigned';
            $formFieldsStudent['assign'] = 'Unassigned';

            $report = Report::create($formFieldsStudent);

            // Send email
            $data = [
                'subject' => 'Ticket Created',
                'id' => $report->id,
                'category' => $report->category,
                'description' => $report->description,
                'status' => $report->status,
                'assign' => $report->assign,
            ];
            try {
                Mail::to($report->email)->send(new MailNotify($data, 'new'));
                return redirect('/reports')->with('message', 'Ticket created successfully!');
            } catch (Exception $th) {
                return redirect('/reports')->with('message', 'Ticket created successfully but email is not sent!');
            }
        }
    }

    // Create Single Student Report
    public function create_student_report(Student $student)
    {
        $user = auth()->user();

        if ($student->contact != NULL && $student->block != NULL && $student->floor != NULL && $student->room != NULL) {
            return view('staff.reports.create', [
                'student' => $student,
                'staff' => User::select('name')->where([['hostel', '=', $user->hostel], ['role', '=', '1'], ['id', '=', $user->id]])->get(),
                'staffbyhead' => User::select('name')->where([['hostel', '=', $user->hostel], ['role', '=', '1']])->get(),
                'user' => $user,
            ]);
        } else {
            return redirect('/staff/students' . '/' . $student->id . '/edit')->with('alert', 'Please complete student information before creating tickets');
        }
    }

    public function store_student_report(Request $request, Student $student)
    {
        $formFieldsStudent = $request->validate([
            'category' => 'required',
            'description' => 'required|max:150',
            'priority' => 'required',
            'assign' => 'required',
        ]);

        if ($request->hasFile('evidence')) {
            $formFieldsStudent['evidence'] = $request->file('evidence')->store('evidence', 's3');
        }

        $formFieldsStudent['user_id'] = $student->id;
        $formFieldsStudent['name'] = $student->name;
        $formFieldsStudent['email'] = $student->email;
        $formFieldsStudent['contact'] = $student->contact;
        $formFieldsStudent['hostel'] = $student->hostel;
        $formFieldsStudent['block'] = $student->block;
        $formFieldsStudent['floor'] = $student->floor;
        $formFieldsStudent['room'] = $student->room;
        $formFieldsStudent['status'] = 'Pending';

        $report = Report::create($formFieldsStudent);

        // Send email
        $data = [
            'subject' => 'Ticket Created',
            'id' => $report->id,
            'category' => $report->category,
            'description' => $report->description,
            'status' => $report->status,
            'assign' => $report->assign,
        ];
        try {
            Mail::to($report->email)->send(new MailNotify($data, 'new'));
            return redirect('/staff/reports')->with('message', 'Ticket created successfully!');
        } catch (Exception $th) {
            return redirect('/staff/reports')->with('message', 'Ticket created successfully but email is not sent!');
        }
    }

    // Show Edit Form
    public function edit(Report $report)
    {
        $user = auth()->user();

        return view('staff.reports.edit', [
            'report' => $report,
            'staff' => User::select('name')->where([['hostel', '=', $user->hostel], ['role', '=', '1'], ['id', '=', $user->id]])->get(),
            'staffbyhead' => User::select('name')->where([['hostel', '=', $user->hostel], ['role', '=', '1']])->get(),
            'user' => $user,
        ]);
    }

    // Update Report
    public function update(Request $request, Report $report)
    {
        $user = auth()->user();

        if ($user->role == 1) {
            $formFields = $request->validate([
                'priority' => 'required',
                'status' => 'required',
                'assign' => 'required',
            ]);

            // Check if the status has changed
            if ($report->status != $formFields['status']) {
                $statusChanged = true;
            } else {
                $statusChanged = false;
            }

            // if ($request->hasFile('evidence')) {
            //     $formFields['evidence'] = $request->file('evidence')->store('evidence', 'public');
            // }

            $report->update($formFields);

            // Send email if the status has changed
            if ($statusChanged) {
                $data = [
                    'subject' => 'Ticket Status Update',
                    'id' => $report->id,
                    'category' => $report->category,
                    'description' => $report->description,
                    'status' => $report->status,
                    'assign' => $report->assign,
                ];

                try {
                    Mail::to($report->email)->send(new MailNotify($data, 'index'));
                    return redirect('/staff/reports')->with('message', 'Ticket updated successfully and email sent!');
                } catch (Exception $th) {
                    return redirect('/staff/reports')->with('message', 'Ticket updated successfully but email is not sent!');
                }
            } else {
                return redirect('/staff/reports')->with('message', 'Ticket updated successfully!');
            }
        } else {
            // Student cannot update
        }
    }

    // Delete Report
    public function destroy(Report $report)
    {
        $user = auth()->user();

        if ($user->role == 1) {
            $report->delete();
            return redirect('/staff/reports')->with('message', 'Ticket deleted!');
        } else {
            // Make sure logged in user is owner
            if ($report->user_id != auth()->id()) {
                abort(403, 'Unauthorized Action');
            }

            $report->delete();
            return redirect('/reports')->with('message', 'Ticket deleted!');
        }
    }

    // Manage Reports
    public function manage()
    {
        return view('staff.reports.manage', [
            'reports' => Report::latest()->where('user_id', auth()->user()->id)->paginate(7)
        ]);
    }
}
