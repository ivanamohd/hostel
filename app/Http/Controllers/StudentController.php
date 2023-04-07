<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // All Students
    public function index()
    {
        $user = auth()->user();
        // dd(request('status'));

        if ($user->role == 1) {
            return view('staff.students.index', [
                'students' => User::latest()->filter(request(['block', 'floor', 'room', 'search']))->paginate(7)
            ]);
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    // Student Profile / Single Student
    public function show(Student $student)
    {
        return view('student.profile.show', [
            'student' => $student
        ]);
    }

    // Edit Student Profile
    public function edit(Student $student)
    {
        // $student = auth()->user();
        return view('student.profile.edit', [
            'student' => $student
        ]);
    }

    // Update Profile
    public function update(Request $request, Student $student)
    {
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
