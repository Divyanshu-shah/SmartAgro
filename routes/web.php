<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

// Temporary diagnostic route - REMOVE after fixing mail
Route::get('/test-mail', function () {
    $config = [
        'mailer' => config('mail.default'),
        'host' => config('mail.mailers.smtp.host'),
        'port' => config('mail.mailers.smtp.port'),
        'username' => config('mail.mailers.smtp.username'),
        'password' => config('mail.mailers.smtp.password') ? '***SET (length: ' . strlen(config('mail.mailers.smtp.password')) . ')***' : 'NOT SET',
        'scheme' => config('mail.mailers.smtp.scheme'),
        'resend_key' => config('services.resend.key') ? '***SET (length: ' . strlen(config('services.resend.key')) . ')***' : 'NOT SET',
        'from_address' => config('mail.from.address'),
        'from_name' => config('mail.from.name'),
    ];

    try {
        Mail::raw('Test email from SmartAgro on Railway!', function($message) {
            $message->to('shahdivyanshu5009@gmail.com')
                    ->subject('SmartAgro Railway Mail Test');
        });
        return response()->json([
            'status' => 'SUCCESS - Mail sent!',
            'config' => $config,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'FAILED',
            'error' => $e->getMessage(),
            'config' => $config,
        ], 500);
    }
});

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Protected routes - require authentication
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/services', [ServiceController::class, 'index'])->name('services');

    Route::get('/identification', [IdentificationController::class, 'index'])->name('identification');
    Route::post('/identification', [IdentificationController::class, 'store'])->name('identification.store');

    Route::get('/resources', [ResourceController::class, 'index'])->name('resources');

    Route::get('/crops/{slug}', [CropController::class, 'show'])->name('crop.show');

    Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
});
