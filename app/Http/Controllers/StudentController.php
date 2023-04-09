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
        return view('student.dashboard', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'report' => Report::where('user_id', auth()->user()->id)->latest('created_at')->first()
        ]);
    }

    // All Students
    public function index()
    {
        $user = auth()->user();
        // dd(request('status'));

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
                'name' => 'required',
                'contact' => 'required',
                'hostel' => 'required',
                'block' => 'required',
                'floor' => 'required',
                'room' => 'required',
            ]);

            $student->update($formFields);

            return back()->with('message', 'Student updated successfully!');
        } else {
            $formFields = $request->validate([
                'name' => 'required',
                'contact' => 'required',
                'hostel' => 'required',
                'block' => 'required',
                'floor' => 'required',
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

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'contact' => ['required'],
            'hostel' => ['required'],
            'block' => ['required'],
            'floor' => ['required'],
            'room' => ['required']
        ]);

        $formFields['password'] = 'password';

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
