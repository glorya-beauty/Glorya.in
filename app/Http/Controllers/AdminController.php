<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $totalUsers = User::where('is_admin', false)->count();
        $totalCategories = Category::count();
        $totalServices = Service::count();

        return view('admin.dashboard', compact(
            'totalBookings',
            'pendingBookings', 
            'confirmedBookings',
            'completedBookings',
            'totalUsers',
            'totalCategories',
            'totalServices'
        ));
    }

    public function bookings(Request $request)
    {
        $query = Booking::with('user');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('booking_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('booking_date', '<=', $request->date_to);
        }

        // Filter by service
        if ($request->filled('service')) {
            $query->where('service_name', 'like', '%' . $request->service . '%');
        }

        // Filter by customer name
        if ($request->filled('customer_name')) {
            $query->where('customer_name', 'like', '%' . $request->customer_name . '%');
        }

        // Filter by payment verification
        if ($request->filled('payment_verified')) {
            $query->where('payment_verified', $request->payment_verified);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);

        // Get unique services for filter dropdown
        $services = Booking::distinct()->pluck('service_name')->sort();

        return view('admin.bookings', compact('bookings', 'services'));
    }

    public function updateBookingStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }

    public function verifyPayment(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->payment_verified = $request->payment_verified;
        $booking->save();

        return redirect()->back()->with('success', 'Payment verification updated successfully!');
    }
}
