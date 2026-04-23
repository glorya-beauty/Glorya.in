<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // We'll create this model

class ContactController extends Controller
{
    /**
     * Show the contact form
     */
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * Handle contact form submission
     */
    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        try {
            // Store in database
            $contact = new Contact();
            $contact->first_name = $request->first_name;
            $contact->last_name = $request->last_name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->save();

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you soon.'
            ]);

        } catch (\Exception $e) {
            // Log error
            \Log::error('Contact form submission error: ' . $e->getMessage());
            
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error submitting your message. Please try again.'
            ], 500);
        }
    }
}
