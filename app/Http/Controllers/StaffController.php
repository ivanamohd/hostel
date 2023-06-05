<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Staff;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $user = auth()->user();
        return view('staff.dashboard', [
            'user' => User::where('id', $user->id)->first(),
            'urgent' => Report::latest()->where([['hostel', '=', $user->hostel], ['priority', '=', 'High'], ['status', '!=', 'Resolved']])->paginate(7),
            'open' => Report::latest()->where([['hostel', '=', $user->hostel], ['assign', '=', 'Unassigned'], ['status', '!=', 'Resolved']])->paginate(7),
            'reports' => Report::latest()->where('hostel', '=', $user->hostel)->paginate(7),
            'past' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '=', 'Resolved']])->paginate(7),
            'active' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '!=', 'Resolved']])->paginate(7),
            'students' => User::latest()->where([['role', '=', '0'], ['hostel', '=', $user->hostel]])->paginate(7),
            'feedback' => Feedback::latest()->paginate(7),

            'assign' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '!=', 'Resolved'], ['assign', '=', $user->name]])->paginate(7),
            'assign_resolved' => Report::latest()->where([['hostel', '=', $user->hostel], ['status', '=', 'Resolved'], ['assign', '=', $user->name]])->paginate(7),
            'user' => $user,
        ]);
    }

    // Staff Profile
    public function show(Staff $staff)
    {
        return view('staff.profile.show', [
            'staff' => $staff
        ]);
    }

    // Edit Student Profile
    public function edit(Staff $staff)
    {
        return view('staff.profile.edit', [
            'staff' => $staff
        ]);
    }

    // Update Profile
    public function update(Request $request, Staff $staff)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'contact' => 'required',
        ]);

        $staff->update($formFields);

        return back()->with('message', 'Profile updated successfully!');
    }
}
