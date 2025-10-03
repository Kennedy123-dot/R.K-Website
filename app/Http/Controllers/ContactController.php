<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailables\Address;

// After saving message
Mail::raw($request->message, function ($message) use ($request) {
    $message->from($request->email, $request->name)
            ->to(config('mail.from.address'))
            ->subject('New Contact Form Message');
});

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Message::create($request->all());

        // Optional: Send email
        // Mail::to('admin@site.com')->send(new ContactMail($request));

        return back()->with('success', 'Message sent successfully!');
    }
}
