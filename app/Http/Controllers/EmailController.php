<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function create()
    {
        $emailBody = Email::where('user_id', Auth::id())->first();
        $defaultTemplate = view('emails.template')->render();

        return view('emails.compose', [
            'emailBody' => $emailBody,
            'defaultTemplate' => $defaultTemplate
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $email = Email::updateOrCreate(['user_id' => auth()->id()],
        [
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'recipient_list' => $request->recipient_list,
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Email saved successfully!');
    }
}