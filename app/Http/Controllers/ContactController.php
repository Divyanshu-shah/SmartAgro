<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save to MongoDB
        Contact::create($validated);

        // Send email notification
        try {
            Mail::to('shahdivyanshu5009@gmail.com')
                ->send(new ContactFormMail(
                    name: $validated['name'],
                    email: $validated['email'],
                    phone: $validated['phone'] ?? null,
                    mailSubject: $validated['subject'],
                    contactMessage: $validated['message'],
                ));
        } catch (\Exception $e) {
            \Log::error('Failed to send contact email: ' . $e->getMessage());
            return redirect()->route('contact')
                ->with('success', 'Your message was saved but email failed: ' . $e->getMessage());
        }

        return redirect()->route('contact')
            ->with('success', 'Thank you! Your message has been sent successfully. We\'ll respond to you shortly.');
    }
}
