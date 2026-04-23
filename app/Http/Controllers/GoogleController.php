<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Helpers\AuthHelper;
use Illuminate\Support\Facades\Session;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Store user data in session for now (since database might not be set up)
            $userData = [
                'id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
            ];
            
            // Store in session
            Session::put('google_user', $userData);
            Session::put('is_logged_in', true);
            
            // For now, we'll use session-based authentication
            // Later when database is set up, we can easily switch to database auth
            
            return redirect()->route('services')->with('success', 'Login successful!');
            
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong with Google login. Please try again.');
        }
    }
}
