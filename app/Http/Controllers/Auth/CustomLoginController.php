<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Helpers\AuthHelper;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CustomLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/services';

    public function __construct()
    {
        $this->middleware('guest')->only(['showLoginForm', 'login']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Handle AJAX requests for modal login
        if ($request->expectsJson()) {
            $this->validateLogin($request);

            if (method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return response()->json([
                    'errors' => ['email' => ['Too many login attempts. Please try again in '.config('auth.lockout.duration').' seconds.']]
                ], 422);
            }

            if ($this->attemptLogin($request)) {
                $request->session()->regenerate();

                return response()->json([
                    'message' => 'Login successful',
                    'user' => auth()->user()
                ]);
            }

            $this->incrementLoginAttempts($request);

            return response()->json([
                'errors' => ['email' => ['Invalid credentials. Please check your email and password and try again.']]
            ], 401);
        }

        // For non-AJAX requests, redirect to Google login (fallback)
        return redirect()->route('auth.google');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'Password is required.',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function username()
    {
        return 'email';
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectTo)->with('success', 'Login successful!');
    }

    public function logout(Request $request)
    {
        AuthHelper::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
