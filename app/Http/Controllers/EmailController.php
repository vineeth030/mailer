<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function create()
    {
        return view('emails.compose');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'recipient_list' => 'required|string',
            'body' => 'required|string',
        ]);

        $email = Email::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'recipient_list' => $request->recipient_list,
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Email saved successfully!');
    }
}