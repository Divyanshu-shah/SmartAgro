@extends('layouts.app')
@section('title', 'Register')

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

    .auth-card {
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 480px;
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

    .auth-card-body { padding: 28px 36px 36px; }

    .auth-input-group { margin-bottom: 18px; position: relative; }
    .auth-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .auth-input-wrapper { position: relative; }
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
    .auth-input-wrapper:focus-within i { color: #5dd62c; }

    .auth-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    /* Password strength */
    .password-strength {
        margin-top: 6px;
        height: 4px;
        border-radius: 4px;
        background: #e5e7eb;
        overflow: hidden;
    }
    .password-strength-bar {
        height: 100%;
        width: 0%;
        border-radius: 4px;
        transition: all 0.3s ease;
    }
    .password-hint {
        font-size: 12px;
        color: #9ca3af;
        margin-top: 4px;
    }

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
        margin-top: 24px;
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

    .auth-divider {
        display: flex;
        align-items: center;
        gap: 16px;
        margin: 22px 0;
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

    .auth-alert {
        padding: 12px 16px;
        border-radius: 10px;
        margin-bottom: 18px;
        font-size: 14px;
    }
    .auth-alert-error {
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        border: 1px solid #fca5a5;
        color: #991b1b;
    }
    .auth-alert-error ul {
        margin: 0;
        padding-left: 18px;
    }

    /* Features row */
    .auth-features {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 8px;
        flex-wrap: wrap;
    }
    .auth-features span {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #bbf7a0;
    }

    @media (max-width: 500px) {
        .auth-card-header { padding: 24px 20px; }
        .auth-card-body { padding: 20px 20px 28px; }
        .auth-row { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')
<section class="auth-section">
    <div class="auth-card">
        <div class="auth-card-header">
            <div class="auth-logo">
                <i class="fas fa-seedling"></i>
            </div>
            <h1 style="margin: 0 0 4px; font-size: 24px; font-weight: 800; color: #fff;">Join SmartAgro</h1>
            <p style="margin: 0; font-size: 14px; color: #bbf7a0;">Create your account to get started</p>
            <div class="auth-features">
                <span><i class="fas fa-check-circle" style="color: #5dd62c;"></i> Free Access</span>
                <span><i class="fas fa-check-circle" style="color: #5dd62c;"></i> Expert Support</span>
                <span><i class="fas fa-check-circle" style="color: #5dd62c;"></i> Crop Reports</span>
            </div>
        </div>

        <div class="auth-card-body">
            @if($errors->any())
            <div class="auth-alert auth-alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="auth-input-group">
                    <label for="name" class="auth-label">Full Name</label>
                    <div class="auth-input-wrapper">
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                               class="auth-input" placeholder="John Doe" required autofocus>
                        <i class="fas fa-user"></i>
                    </div>
                </div>

                <div class="auth-input-group">
                    <label for="email" class="auth-label">Email Address</label>
                    <div class="auth-input-wrapper">
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               class="auth-input" placeholder="you@example.com" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="auth-row">
                    <div class="auth-input-group">
                        <label for="password" class="auth-label">Password</label>
                        <div class="auth-input-wrapper">
                            <input type="password" id="password" name="password"
                                   class="auth-input" placeholder="••••••••" required
                                   oninput="checkStrength(this.value)">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="password-strength"><div class="password-strength-bar" id="strength-bar"></div></div>
                        <p class="password-hint" id="strength-text">Minimum 8 characters</p>
                    </div>

                    <div class="auth-input-group">
                        <label for="password_confirmation" class="auth-label">Confirm Password</label>
                        <div class="auth-input-wrapper">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="auth-input" placeholder="••••••••" required>
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" class="auth-submit">
                    <i class="fas fa-user-plus"></i> Create Account
                </button>
            </form>

            <div class="auth-divider">or</div>

            <p class="auth-link-row">
                Already have an account? <a href="{{ route('login') }}">Sign in</a>
            </p>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function checkStrength(password) {
    const bar = document.getElementById('strength-bar');
    const text = document.getElementById('strength-text');
    let strength = 0;
    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;

    const levels = [
        { width: '0%', color: '#e5e7eb', label: 'Minimum 8 characters' },
        { width: '25%', color: '#ef4444', label: 'Weak' },
        { width: '50%', color: '#f59e0b', label: 'Fair' },
        { width: '75%', color: '#5dd62c', label: 'Good' },
        { width: '100%', color: '#4ab821', label: 'Strong' }
    ];
    const level = levels[strength];
    bar.style.width = level.width;
    bar.style.background = level.color;
    text.textContent = level.label;
    text.style.color = level.color;
}
</script>
@endpush
