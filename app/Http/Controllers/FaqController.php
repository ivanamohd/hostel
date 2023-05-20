<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // All FAQ
    public function homepage()
    {
        // dd(request('status'));
        return view('faq', [
            'all' => Faq::latest()->where('hostel', '=', 'All')->get(),
            'krp' => Faq::latest()->where('hostel', '=', 'Kolej Rahman Putra')->get(),
            'ktf' => Faq::latest()->where('hostel', '=', 'Kolej Tun Fatimah')->get(),
            'ktr' => Faq::latest()->where('hostel', '=', 'Kolej Tun Razak')->get(),
            'ktho' => Faq::latest()->where('hostel', '=', 'Kolej Tun Hussein Onn')->get(),
            'ktdi' => Faq::latest()->where('hostel', '=', 'Kolej Tun Dr Ismail')->get(),
            'ktc' => Faq::latest()->where('hostel', '=', 'Kolej Tuanku Canselor')->get(),
            'kp' => Faq::latest()->where('hostel', '=', 'Kolej Perdana')->get(),
            'k9' => Faq::latest()->where('hostel', '=', 'Kolej 9')->get(),
            'k10' => Faq::latest()->where('hostel', '=', 'Kolej 10')->get(),
            'kdse' => Faq::latest()->where('hostel', '=', 'Kolej Datin Seri Endon')->get(),
            'kdoj' => Faq::latest()->where('hostel', '=', 'Kolej Dato Onn Jaafar')->get(),
        ]);
    }

    // FAQ list
    public function index()
    {
        $user = auth()->user();
        // dd(request('status'));
        return view('staff.faq.index', [
            'faq' => Faq::latest()->where('hostel', '=', $user->hostel)->paginate(7),
        ]);
    }

    // Single FAQ
    public function show(Faq $faq)
    {
        return view('staff.faq.show', [
            'faq' => $faq,
        ]);
    }

    // Create FAQ
    public function create()
    {
        return view('staff.faq.create');
    }

    // Store FAQ
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'question' => 'required|max:200',
            'answer' => 'required|max:300',
        ]);

        $formFields['hostel'] = auth()->user()->hostel;

        Faq::create($formFields);

        return redirect('/staff/faqlist')->with('message', 'FAQ created successfully!');
    }

    // Show Edit Form
    public function edit(Faq $faq)
    {
        return view('staff.faq.edit', [
            'faq' => $faq,
        ]);
    }

    // Update FAQ
    public function update(Request $request, Faq $faq)
    {
        $formFields = $request->validate([
            'question' => 'required|max:200',
            'answer' => 'required|max:300',
        ]);

        $faq->update($formFields);

        return redirect('/staff/faqlist')->with('message', 'FAQ updated successfully!');
    }

    // Delete FAQ
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect('/staff/faqlist')->with('message', 'FAQ deleted!');
    }
}
