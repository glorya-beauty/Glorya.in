<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    /**
     * Show the forgot password form (for modal)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showForgetPasswordForm()
    {
        // This will be handled by modal, so return JSON response
        return response()->json(['success' => true]);
    }

    /**
     * Submit forgot password form
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitForgetPasswordForm(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users',
            ], [
                'email.required' => 'Email address is required.',
                'email.email' => 'Please provide a valid email address.',
                'email.exists' => 'This email address is not registered in our system.',
            ]);

            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            // Send password reset email
            try {
                $fromAddress = config('mail.from.address', 'glorya.beauty.service@gmail.com');
                $fromName = config('mail.from.name', 'Glorya Beauty');
                
                Mail::send('emails.forgetPassword', ['token' => $token], function($message) use($request, $fromAddress, $fromName){
                    $message->to($request->email)
                            ->subject('Reset Your Password - Glorya Beauty')
                            ->from($fromAddress, $fromName);
                });
            } catch (\Exception $e) {
                Log::error('Mail configuration error: ' . $e->getMessage());
                
                // Return a helpful error message for mail configuration issues
                if (strpos($e->getMessage(), 'getConfig') !== false) {
                    throw new \Exception('Email service is not configured properly. Please contact support.');
                }
                
                throw $e;
            }

            Log::info('Password reset email sent successfully', [
                'email' => $request->email,
                'token' => $token
            ]);

            return response()->json([
                'success' => true,
                'message' => 'We have e-mailed your password reset link! Please check your inbox.'
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to send password reset email: ' . $e->getMessage(), [
                'email' => $request->email
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to send password reset email. Please try again.'
            ], 500);
        }
    }

    /**
     * Show reset password form
     *
     * @param string $token
     * @return View
     */
    public function showResetPasswordForm($token): View
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Submit reset password form
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function submitResetPasswordForm(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.exists' => 'This email address is not registered in our system.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password_confirmation.required' => 'Password confirmation is required.'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid or expired reset token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        Log::info('Password reset successfully', [
            'email' => $request->email
        ]);

        return redirect('/login')->with('message', 'Your password has been changed successfully!');
    }
}
