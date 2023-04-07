<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
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
