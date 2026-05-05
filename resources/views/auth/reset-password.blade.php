@extends('layouts.app')

@section('title', 'Reset Password - Glorya Beauty')

@section('content')
<style>
.reset-password-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);
    padding: 20px;
}

.reset-password-card {
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    border: none;
    overflow: hidden;
    max-width: 450px;
    width: 100%;
}

.reset-password-header {
    background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);
    color: white;
    text-align: center;
    padding: 30px 25px;
}

.reset-password-body {
    padding: 40px 30px;
    background: linear-gradient(135deg, rgba(139,92,246,0.05) 0%, rgba(124,58,237,0.05) 100%);
}

.input-group .input-group-prepend .input-group-text {
    border: 2px solid #e0e0e0;
    border-right: none;
    border-radius: 10px 0 0 10px;
    background: #f8f9fa;
}

.input-group .form-control {
    border: 2px solid #e0e0e0;
    border-left: none;
    border-radius: 0 10px 10px 0;
    padding: 12px 15px;
    font-size: 0.95rem;
}

.input-group .form-control:focus {
    border-color: #8B5CF6;
    box-shadow: 0 0 0 0.2rem rgba(139, 92, 246, 0.25);
}

.reset-btn {
    background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);
    border: none;
    border-radius: 10px;
    padding: 14px;
    font-weight: 600;
    font-size: 1rem;
    color: white;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.reset-btn:hover {
    background: linear-gradient(135deg, #7C3AED 0%, #6D28D9 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
    color: white;
}

.form-label {
    font-weight: 600;
    font-size: 0.95rem;
    margin-bottom: 10px;
    color: #333;
}

.alert {
    border-radius: 12px;
    margin-bottom: 25px;
    border: none;
}

.alert-success {
    background: rgba(16,185,129,0.1);
    color: #065f46;
}

.alert-danger {
    background: rgba(220,53,69,0.1);
    color: #721c24;
}

.back-link {
    color: #8B5CF6;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
}

.back-link:hover {
    color: #7C3AED;
    text-decoration: underline;
}

@media (max-width: 576px) {
    .reset-password-card {
        margin: 15px;
    }
    
    .reset-password-header {
        padding: 20px 15px;
    }
    
    .reset-password-body {
        padding: 30px 20px;
    }
}
</style>

<div class="reset-password-container">
    <div class="reset-password-card">
        <div class="reset-password-header">
            <h2 style="margin: 0; font-size: 1.5rem; font-weight: 600;">
                🔐 Reset Password
            </h2>
            <p style="margin: 10px 0 0 0; opacity: 0.9; font-size: 0.9rem;">
                Enter your new password below
            </p>
        </div>
        
        <div class="reset-password-body">
            @if (session('message'))
                <div class="alert alert-success">
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="form-group mb-4">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope" style="color: #8B5CF6;"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required autocomplete="email" 
                               placeholder="Enter your email address">
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block" style="font-size: 0.85rem; margin-top: 8px; color: #dc3545;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label for="password" class="form-label">New Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock" style="color: #8B5CF6;"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required autocomplete="new-password" 
                               placeholder="Enter new password">
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block" style="font-size: 0.85rem; margin-top: 8px; color: #dc3545;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock" style="color: #8B5CF6;"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                               id="password_confirmation" name="password_confirmation" required autocomplete="new-password" 
                               placeholder="Confirm new password">
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block" style="font-size: 0.85rem; margin-top: 8px; color: #dc3545;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group mb-4">
                    <button type="submit" class="btn btn-block reset-btn">
                        Reset Password
                    </button>
                </div>
                
                <div class="text-center">
                    <a href="{{ url('/login') }}" class="back-link">
                        ← Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
