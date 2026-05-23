@extends('layouts.app')
@section('title', 'Login')

@push('styles')
<style>
    .auth-section {
        min-height: calc(100vh - 72px);
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('/images/auth-bg.jpg') center/cover no-repeat;
        position: relative;
        overflow: hidden;
        padding: 40px 20px;
    }
    .auth-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
    }

    /* Card */
    .auth-card {
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 460px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        animation: cardSlideUp 0.6s ease-out;
    }
    @keyframes cardSlideUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .auth-card-header {
        background: linear-gradient(135deg, var(--clr-forest), var(--clr-emerald));
        padding: 32px 36px;
        text-align: center;
        position: relative;
    }
    .auth-card-header::after {
        content: '';
        position: absolute;
        bottom: -1px; left: 0; right: 0;
        height: 24px;
        background: rgba(255,255,255,0.95);
        border-radius: 24px 24px 0 0;
    }

    .auth-logo {
        width: 60px; height: 60px;
        background: rgba(255,255,255,0.2);
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 14px;
        font-size: 26px;
        color: #fff;
        backdrop-filter: blur(10px);
        animation: logoFloat 3s ease-in-out infinite;
    }
    @keyframes logoFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }

    .auth-card-body {
        padding: 28px 36px 36px;
    }

    /* Form elements */
    .auth-input-group {
        margin-bottom: 20px;
        position: relative;
    }
    .auth-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .auth-input-wrapper {
        position: relative;
    }
    .auth-input-wrapper i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 15px;
        transition: color 0.3s;
    }
    .auth-input {
        width: 100%;
        padding: 13px 16px 13px 42px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        color: #1f2937;
        background: #f9fafb;
        transition: all 0.3s ease;
        outline: none;
        box-sizing: border-box;
    }
    .auth-input:focus {
        border-color: #5dd62c;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(93, 214, 44, 0.12);
    }
    .auth-input:focus + i,
    .auth-input-wrapper:focus-within i {
        color: #5dd62c;
    }

    /* Checkbox */
    .auth-checkbox-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 8px;
    }
    .auth-checkbox-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: #6b7280;
        cursor: pointer;
    }
    .auth-checkbox-label input {
        width: 18px; height: 18px;
        accent-color: #5dd62c;
        cursor: pointer;
    }
    .auth-forgot {
        font-size: 14px;
        color: #4ab821;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }
    .auth-forgot:hover { color: #357a12; text-decoration: underline; }

    /* Submit button */
    .auth-submit {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, var(--clr-forest), var(--clr-emerald));
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.35s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        position: relative;
        overflow: hidden;
    }
    .auth-submit::before {
        content: '';
        position: absolute;
        top: 0; left: -100%; right: 0; bottom: 0;
        width: 200%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
        transition: left 0.5s ease;
    }
    .auth-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(74, 184, 33, 0.35);
    }
    .auth-submit:hover::before { left: 100%; }
    .auth-submit:active { transform: translateY(0); }

    /* Divider */
    .auth-divider {
        display: flex;
        align-items: center;
        gap: 16px;
        margin: 24px 0;
        color: #9ca3af;
        font-size: 13px;
    }
    .auth-divider::before,
    .auth-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e5e7eb;
    }

    /* Link row */
    .auth-link-row {
        text-align: center;
        font-size: 15px;
        color: #6b7280;
    }
    .auth-link-row a {
        color: #4ab821;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }
    .auth-link-row a:hover { color: #357a12; text-decoration: underline; }

    /* Alert */
    .auth-alert {
        padding: 12px 16px;
        border-radius: 10px;
        margin-bottom: 18px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .auth-alert-error {
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        border: 1px solid #fca5a5;
        color: #991b1b;
    }
    .auth-alert-success {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        border: 1px solid #93e86e;
        color: #2d6a10;
    }

    /* Responsive */
    @media (max-width: 500px) {
        .auth-card-header { padding: 24px 20px; }
        .auth-card-body { padding: 20px 20px 28px; }
        .auth-checkbox-row { flex-direction: column; align-items: flex-start; }
    }
</style>
@endpush

@section('content')
<section class="auth-section">
    <div class="auth-card">
        <div class="auth-card-header">
            <div class="auth-logo">
                <i class="fas fa-bug"></i>
            </div>
            <h1 style="margin: 0 0 4px; font-size: 24px; font-weight: 800; color: #fff;">Welcome Back</h1>
            <p style="margin: 0; font-size: 14px; color: #bbf7a0;">Sign in to your SmartAgro account</p>
        </div>

        <div class="auth-card-body">
            {{-- Error Messages --}}
            @if($errors->any())
            <div class="auth-alert auth-alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ $errors->first() }}</span>
            </div>
            @endif

            @if(session('success'))
            <div class="auth-alert auth-alert-success">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="auth-input-group">
                    <label for="email" class="auth-label">Email Address</label>
                    <div class="auth-input-wrapper">
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               class="auth-input" placeholder="you@example.com" required autofocus>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="auth-input-group">
                    <label for="password" class="auth-label">Password</label>
                    <div class="auth-input-wrapper">
                        <input type="password" id="password" name="password"
                               class="auth-input" placeholder="••••••••" required>
                        <i class="fas fa-lock"></i>
                    </div>
                </div>

                <div class="auth-checkbox-row">
                    <label class="auth-checkbox-label">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember me
                    </label>
                </div>

                <button type="submit" class="auth-submit">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
            </form>

            <div class="auth-divider">or</div>

            <p class="auth-link-row">
                Don't have an account? <a href="{{ route('register') }}">Create one now</a>
            </p>
        </div>
    </div>
</section>
@endsection
