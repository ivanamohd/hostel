<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    // Show Register Form
    public function create()
    {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'hostel' => ['required'],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        event(new Registered($user));

        return redirect('/dashboard')->with('message', 'Account created and logged in');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 0) {
                return redirect('/dashboard')->with('message', 'Logged in');
            } else if (auth()->user()->role == 1) {
                if (auth()->user()->password_reset == false) {
                    return redirect()->route('password.request');
                } else {
                    return redirect('/staff/dashboard')->with('message', 'Logged in');
                }
            } else if (auth()->user()->role == 2) {
                return redirect('/admin/staff')->with('message', 'Logged in');
            } else {
                return redirect('/')->with('alert', 'No access');;
            }
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
