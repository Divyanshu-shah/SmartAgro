<?php

namespace App\Http\Controllers;

use App\Mail\IdentificationFormMail;
use App\Models\PesticideRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IdentificationController extends Controller
{
    public function index()
    {
        return view('identification');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'farm_size' => 'nullable|numeric',
            'crop_type' => 'required|string',
            'pest_problem' => 'required|string',
            'symptoms' => 'required|string',
            'pesticide_used' => 'nullable|string',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        // Handle file uploads
        $uploadedFiles = [];
        $fullPaths = [];
        if ($request->hasFile('images')) {
            // Ensure uploads directory exists
            $uploadsPath = public_path('uploads');
            if (!is_dir($uploadsPath)) {
                mkdir($uploadsPath, 0755, true);
            }

            foreach ($request->file('images') as $image) {
                $filename = uniqid('img_', true) . '.' . $image->getClientOriginalExtension();
                $image->move($uploadsPath, $filename);
                $uploadedFiles[] = $filename;
                $fullPaths[] = $uploadsPath . DIRECTORY_SEPARATOR . $filename;
            }
        }

        $validated['images'] = $uploadedFiles;

        // Save to MongoDB
        PesticideRequest::create($validated);

        // Send email notification
        try {
            Mail::to('shahdivyanshu5009@gmail.com')
                ->send(new IdentificationFormMail(
                    name: $validated['name'],
                    email: $validated['email'],
                    phone: $validated['phone'] ?? null,
                    farmSize: isset($validated['farm_size']) ? (string) $validated['farm_size'] : null,
                    cropType: $validated['crop_type'],
                    pestProblem: $validated['pest_problem'],
                    symptoms: $validated['symptoms'],
                    pesticideUsed: $validated['pesticide_used'] ?? null,
                    imagePaths: $fullPaths,
                ));
        } catch (\Exception $e) {
            // Log the error but don't fail the form submission
            \Log::error('Failed to send identification email: ' . $e->getMessage());
        }

        return redirect()->route('identification')
            ->with('success', 'Your pesticide identification request has been submitted successfully! Our team will review your submission and get back to you shortly.');
    }
}
