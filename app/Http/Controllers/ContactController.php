<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        // Optional: Send email
        // Mail::to('admin@site.com')->send(new ContactMail($request));

        return back()->with('success', 'Your message has been sent successfully! I will get back to you soon.');
    }
}
