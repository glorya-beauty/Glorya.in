<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Helpers\AuthHelper;
use Illuminate\Support\Facades\Session;

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
        // For now, just redirect to Google login since we're using Google SSO only
        return redirect()->route('auth.google');
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
        
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
