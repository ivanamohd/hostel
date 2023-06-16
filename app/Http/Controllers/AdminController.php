<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // Staff Profile
    public function index()
    {
        return view('admin.staff.index', [
            'staff' => User::latest()->where('role', '1')->paginate(7)
        ]);
    }

    // Create Staff
    public function create()
    {
        return view('admin.staff.create');
    }

    // Store Staff
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'contact' => ['required', 'starts_with:0', 'digits_between:10,11'],
            'hostel' => 'required',
            'head' => 'required',
        ]);

        $formFields['role'] = '1';
        $formFields['password'] = 'password';
        $formFields['password_reset'] = false;

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        Staff::create($formFields);

        return redirect('admin/staff')->with('message', 'Staff created successfully!');
    }

    // Show Staff
    public function show(Staff $staff)
    {
        return view('admin.staff.show', [
            'staff' => $staff
        ]);
    }

    // Edit Staff
    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', [
            'staff' => $staff
        ]);
    }

    // Update Staff
    public function update(Request $request, Staff $staff)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'contact' => ['required', 'starts_with:0', 'digits_between:10,11'],
            'hostel' => 'required',
            'head' => 'required',
        ]);

        $staff->update($formFields);

        return back()->with('message', 'Staff updated successfully!');
    }

    // Delete Staff
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect('/admin/staff')->with('message', 'Staff deleted!');
    }
}
