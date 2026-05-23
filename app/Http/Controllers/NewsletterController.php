<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        Newsletter::create($validated);

        return redirect()->back()
            ->with('newsletter_success', 'Thank you for subscribing to our newsletter!');
    }
}
