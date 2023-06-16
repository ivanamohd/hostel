<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $user = auth()->user();

        return view('student.dashboard', [
            'user' => User::where('id', $user->id)->first(),
            'report' => Report::where([['user_id', auth()->user()->id], ['status', '!=', 'Resolved']])->latest('created_at')->first(),
            'reports' => Report::latest()->where([['hostel', '=', $user->hostel], ['user_id', '=', $user->id]])->paginate(7),
            'past' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '=', 'Resolved'], ['user_id', '=', $user->id]])->paginate(7),
            'active' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '!=', 'Resolved'], ['user_id', '=', $user->id]])->paginate(7),
            'staff' => User::latest()->where([['role', '=', '1'], ['hostel', '=', $user->hostel]])->paginate(7),
        ]);
    }

    // All Students
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 1) {
            return view('staff.students.index', [
                'students' => User::latest()->where([['role', '=', '0'], ['hostel', '=', $user->hostel]])->filter(request(['block', 'floor', 'room', 'search']))->paginate(7)
            ]);
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    // Student Profile / Single Student
    public function show(Student $student)
    {
        $user = auth()->user();

        if ($user->role == 1) {
            return view('staff.students.show', [
                'student' => $student
            ]);
        } else {
            return view('student.profile.show', [
                'student' => $student
            ]);
        }
    }

    // Edit Student Profile
    public function edit(Student $student)
    {
        // $student = auth()->user();
        $user = auth()->user();

        if ($user->role == 1) {
            return view('staff.students.edit', [
                'student' => $student
            ]);
        } else {
            return view('student.profile.edit', [
                'student' => $student
            ]);
        }
    }

    // Update Profile
    public function update(Request $request, Student $student)
    {
        $user = auth()->user();

        if ($user->role == 1) {
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'contact' => ['required', 'starts_with:0', 'digits_between:10,11'],
                'hostel' => 'required',
                'block' => 'required',
                'floor' => ['required', 'digits:1'],
                'room' => 'required',
            ]);

            $student->update($formFields);

            return back()->with('message', 'Student updated successfully!');
        } else {
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'contact' => ['required', 'starts_with:0', 'digits_between:10,11'],
                'hostel' => 'required',
                'block' => 'required',
                'floor' => ['required', 'digits:1'],
                'room' => 'required',
            ]);

            $student->update($formFields);

            return back()->with('message', 'Profile updated successfully!');
        }
    }

    // Show Create Student Form
    public function create()
    {
        return view('staff.students.create');
    }

    // Create New Student
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'contact' => ['required', 'starts_with:0', 'digits_between:10,11'],
            'hostel' => ['required'],
            'block' => ['required'],
            'floor' => ['required', 'digits:1'],
            'room' => ['required'],
        ]);

        $formFields['password'] = 'password';
        $formFields['password_reset'] = false;

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create Student
        Student::create($formFields);

        return redirect('/staff/students')->with('message', 'New student created successfully');
    }

    // Delete Student
    public function destroy(Student $student)
    {
        $user = auth()->user();

        if ($user->role == 1) {
            $student->delete();
            return redirect('/staff/students')->with('message', 'Student deleted!');
        } else {
            $student->delete();
            return redirect('/')->with('alert', 'Account deleted!');
        }
    }
}
