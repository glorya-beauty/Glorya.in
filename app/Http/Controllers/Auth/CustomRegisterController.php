<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Exception;

class CustomRegisterController extends Controller
{
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            // Handle real-time email validation check
            if ($request->has('check_email_only')) {
                $validator = Validator::make($request->only('email'), [
                    'email' => 'required|string|email|max:255|unique:users',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'errors' => $validator->errors()
                    ], 422);
                }

                return response()->json([
                    'message' => 'Email is available'
                ]);
            }

            // Handle actual registration
            $validatedData = $this->validator($request->all())->validate();

            Log::info('Creating user with data: ' . json_encode($validatedData));

            event(new Registered($user = $this->create($validatedData)));

            Log::info('User created successfully: ' . $user->id);

            // Log the user in
            auth()->login($user);

            Log::info('User logged in successfully');

            return response()->json([
                'message' => 'Registration successful',
                'user' => $user
            ]);

        } catch (Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());
            Log::error('Registration error trace: ' . $e->getTraceAsString());

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Registration failed: ' . $e->getMessage()
                ], 500);
            }

            throw $e;
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Your full name is required.',
            'name.max' => 'Your name may not be greater than 255 characters.',
            'email.required' => 'An email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email address is already registered. Please use a different email or login.',
            'password.required' => 'A password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
