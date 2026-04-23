<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Appointment;
use App\Models\Registration;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class FormController extends Controller
{
    // Handle contact form submission
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
            'subject' => 'nullable|string|max:255'
        ]);

        try {
            Contact::create($validated);

            // Return JSON response for AJAX requests
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for contacting us! We will get back to you shortly.'
                ]);
            }

            return back()->with('success', 'Thank you for contacting us! We will get back to you shortly.');
        } catch (\Exception $e) {
            // Log error
            \Log::error('Contact form submission error: ' . $e->getMessage());
            
            // Return JSON error response for AJAX requests
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, there was an error submitting your message. Please try again.'
                ], 500);
            }

            return back()->with('error', 'Sorry, there was an error submitting your message. Please try again.');
        }
    }

    // Handle appointment form submission
    public function submitAppointment(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_type' => 'required|string|max:255',
            'appointment_date' => 'required|date|after:today',
            'preferred_time' => 'required|string|max:255',
            'notes' => 'nullable|string|max:1000'
        ]);

        Appointment::create($validated);

        return back()->with('success', 'Appointment booked successfully! We will contact you to confirm.');
    }

    // Handle registration form submission
    public function submitRegistration(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000'
        ]);

        Registration::create($validated);

        return back()->with('success', 'Registration submitted successfully! We will contact you soon.');
    }

    // Handle newsletter subscription
    public function subscribeNewsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:newsletter_subscriptions,email'
        ]);

        NewsletterSubscription::create($validated);

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
