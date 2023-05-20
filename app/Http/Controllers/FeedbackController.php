<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Feedback list
    public function index()
    {
        return view('staff.feedbacks.index', [
            'feedbacks' => Feedback::latest()->paginate(7),
        ]);
    }

    // Store FAQ
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|max:20',
            'email' => ['required', 'email'],
            'feedback' => 'required|max:300',
        ]);

        Feedback::create($formFields);

        return redirect('/')->with('alert', 'Your feedback has been sent successfully!');
    }

    // Single Feedback
    public function show(Feedback $feedback)
    {
        return view('staff.feedbacks.show', [
            'feedback' => $feedback,
        ]);
    }

    // Delete Feedback
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect('/staff/feedbacks')->with('message', 'Feedback deleted!');
    }
}
