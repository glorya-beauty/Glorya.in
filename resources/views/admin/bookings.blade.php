@extends('layouts.admin')

@php
use App\Helpers\ImageHelper;
@endphp

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-full" style="margin-top:100px;">
    <div class="container-fluid">
        <!-- Admin Banner -->
        <div class="admin-banner mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="banner-content">
                        <h1 class="banner-title">Bookings Management</h1>
                        <p class="banner-subtitle">Manage and filter all customer bookings efficiently</p>
                        <div class="banner-stats">
                            <div class="stat-item">
                                <span class="stat-number">{{ $bookings->total() }}</span>
                                <span class="stat-label">Total Bookings</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">{{ $bookings->where('status', 'pending')->count() }}</span>
                                <span class="stat-label">Pending</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">{{ $bookings->where('payment_verified', 0)->count() }}</span>
                                <span class="stat-label">Unverified</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner-image">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="filter-card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Filter Bookings</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('admin.bookings') }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control form-control-admin">
                                        <option value="">All Status</option>
                                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="payment_verified">Payment</label>
                                    <select name="payment_verified" id="payment_verified" class="form-control form-control-admin">
                                        <option value="">All Payments</option>
                                        <option value="1" {{ request('payment_verified') == '1' ? 'selected' : '' }}>Verified</option>
                                        <option value="0" {{ request('payment_verified') == '0' ? 'selected' : '' }}>Not Verified</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="service">Service</label>
                                    <select name="service" id="service" class="form-control form-control-admin">
                                        <option value="">All Services</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service }}" {{ request('service') == $service ? 'selected' : '' }}>{{ $service }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control form-control-admin" value="{{ request('customer_name') }}" placeholder="Search...">
                                </div>
                                <div class="col-md-2">
                                    <label for="date_from">Date From</label>
                                    <input type="date" name="date_from" id="date_from" class="form-control form-control-admin" value="{{ request('date_from') }}">
                                </div>
                                <div class="col-md-2">
                                    <label for="date_to">Date To</label>
                                    <input type="date" name="date_to" id="date_to" class="form-control form-control-admin" value="{{ request('date_to') }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-admin btn-primary-admin">
                                        <i class="fas fa-filter"></i> Apply Filters
                                    </button>
                                    <a href="{{ route('admin.bookings') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Clear
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="row">
            <div class="col-12">
                <div class="table-card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Bookings List ({{ $bookings->total() }} total)</h5>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>
                                            <strong>{{ $booking->customer_name }}</strong><br>
                                            <small class="text-muted">{{ $booking->customer_email }}</small><br>
                                            <small class="text-muted">{{ $booking->customer_phone }}</small>
                                        </td>
                                        <td>{{ $booking->service_name }}</td>
                                        <td>{{ $booking->booking_date ? $booking->booking_date->format('M d, Y') : 'N/A' }}</td>
                                        <td>{{ $booking->time_slot }}</td>
                                        <td>₹{{ number_format($booking->amount, 2) }}</td>
                                        <td>
                                            <form action="{{ route('admin.booking.status', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                    <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.booking.payment.verify', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <select name="payment_verified" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="0" {{ !$booking->payment_verified ? 'selected' : '' }}>Not Verified</option>
                                                    <option value="1" {{ $booking->payment_verified ? 'selected' : '' }}>Verified</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            @if($booking->payment_screenshot)
                                                @php
                                                    $imageUrl = ImageHelper::getPaymentScreenshotUrl($booking->payment_screenshot);
                                                    $imageExists = ImageHelper::paymentScreenshotExists($booking->payment_screenshot);
                                                @endphp
                                                @if($imageExists)
                                                    <img src="{{ $imageUrl }}" 
                                                         class="payment-screenshot-thumb" 
                                                         alt="Payment Screenshot" 
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#screenshotModal{{ $booking->id }}"
                                                         title="Click to view payment screenshot"
                                                         onerror="this.src='{{ asset('images/no-image.jpg') }}'; console.log('Thumbnail failed to load:', this.src);">
                                                @else
                                                    <div class="no-image-placeholder" 
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#screenshotModal{{ $booking->id }}"
                                                         title="Click to view payment screenshot details">
                                                        <i class="fas fa-exclamation-triangle"></i>
                                                    </div>
                                                @endif
                                                <button type="button" class="btn btn-sm btn-info mt-1" data-bs-toggle="modal" data-bs-target="#screenshotModal{{ $booking->id }}">
                                                    <i class="fas fa-image"></i> View
                                                </button>
                                            @else
                                                <span class="badge badge-unverified">No Screenshot</span>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $booking->id }}">
                                                <i class="fas fa-eye"></i> Details
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Payment Screenshot Modal -->
                                    @if($booking->payment_screenshot)
                                    <div class="modal fade" id="screenshotModal{{ $booking->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Payment Screenshot - Booking #{{ $booking->id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <div class="mb-3">
                                                        <h6>Customer: {{ $booking->customer_name }}</h6>
                                                        <p class="text-muted">Service: {{ $booking->service_name }} | Amount: {{ number_format($booking->amount, 2) }}</p>
                                                    </div>
                                                    @php
                                                        $imageUrl = ImageHelper::getPaymentScreenshotUrl($booking->payment_screenshot);
                                                        $imageExists = ImageHelper::paymentScreenshotExists($booking->payment_screenshot);
                                                    @endphp
                                                    @if($imageExists)
                                                        <div class="screenshot-container">
                                                            <img src="{{ $imageUrl }}" 
                                                                 class="payment-screenshot-modal img-fluid" 
                                                                 alt="Payment Screenshot"
                                                                 style="max-width: 100%; max-height: 70vh; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);"
                                                                 onerror="this.src='{{ asset('images/no-image.jpg') }}'; console.log('Image failed to load:', this.src);">
                                                            <div class="mt-3">
                                                                <small class="text-muted d-block mb-2">File: {{ basename($booking->payment_screenshot) }}</small>
                                                                <a href="{{ $imageUrl }}" 
                                                                   target="_blank" 
                                                                   class="btn btn-info">
                                                                    <i class="fas fa-external-link-alt"></i> Open in New Tab
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="text-center p-4">
                                                            <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                                            <p class="text-muted">Payment screenshot file not found</p>
                                                            <small class="text-muted">Expected file: {{ basename($booking->payment_screenshot) }}</small>
                                                            <div class="mt-3">
                                                                <a href="{{ asset('uploads/payments') }}" 
                                                                   target="_blank" 
                                                                   class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-folder"></i> Check Uploads Folder
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Booking Details Modal -->
                                    <div class="modal fade" id="bookingModal{{ $booking->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Booking Details #{{ $booking->id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h6 class="text-primary mb-3">Customer Information</h6>
                                                            <div class="mb-3">
                                                                <p><strong>Name:</strong> {{ $booking->customer_name }}</p>
                                                                <p><strong>Email:</strong> {{ $booking->customer_email }}</p>
                                                                <p><strong>Phone:</strong> {{ $booking->customer_phone }}</p>
                                                                <p><strong>Address:</strong> {{ $booking->customer_address ?: 'N/A' }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="text-primary mb-3">Booking Information</h6>
                                                            <div class="mb-3">
                                                                <p><strong>Service:</strong> {{ $booking->service_name }}</p>
                                                                <p><strong>Date:</strong> {{ $booking->booking_date ? $booking->booking_date->format('M d, Y') : 'N/A' }}</p>
                                                                <p><strong>Time:</strong> {{ $booking->time_slot }}</p>
                                                                <p><strong>Amount:</strong> <span style="color: #cf921c; font-weight: 700;">₹{{ number_format($booking->amount, 2) }}</span></p>
                                                                <p><strong>Status:</strong> <span class="badge-status badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></p>
                                                                <p><strong>Payment Verified:</strong> <span class="badge-status badge-{{ $booking->payment_verified ? 'verified' : 'unverified' }}">{{ $booking->payment_verified ? 'Verified' : 'Not Verified' }}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($booking->payment_screenshot)
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <h6 class="text-primary mb-3">Payment Screenshot</h6>
                                                                <div class="text-center">
                                                                    @php
                                                                        $imageUrl = ImageHelper::getPaymentScreenshotUrl($booking->payment_screenshot);
                                                                        $imageExists = ImageHelper::paymentScreenshotExists($booking->payment_screenshot);
                                                                    @endphp
                                                                    @if($imageExists)
                                                                        <img src="{{ $imageUrl }}" 
                                                                             class="img-thumbnail" 
                                                                             style="max-width: 300px; max-height: 200px; object-fit: cover; border-radius: 10px; border: 2px solid #cf921c;"
                                                                             alt="Payment Screenshot"
                                                                             onerror="this.src='{{ asset('images/no-image.jpg') }}'; console.log('Details modal image failed to load:', this.src);">
                                                                        <div class="mt-2">
                                                                            <small class="text-muted d-block mb-2">File: {{ basename($booking->payment_screenshot) }}</small>
                                                                            <a href="{{ $imageUrl }}" 
                                                                               target="_blank" 
                                                                               class="btn btn-sm btn-info">
                                                                                <i class="fas fa-external-link-alt"></i> View Full Size
                                                                            </a>
                                                                        </div>
                                                                    @else
                                                                        <div class="text-center p-4">
                                                                            <i class="fas fa-exclamation-triangle fa-4x text-warning mb-3"></i>
                                                                            <p class="text-muted">Payment screenshot file not found</p>
                                                                            <small class="text-muted">Expected file: {{ basename($booking->payment_screenshot) }}</small>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if($booking->notes)
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <h6 class="text-primary mb-3">Notes</h6>
                                                                <div class="alert alert-info" style="border-radius: 10px; border-left: 4px solid #cf921c;">
                                                                    <i class="fas fa-sticky-note mr-2"></i> {{ $booking->notes }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    @if($booking->payment_screenshot)
                                                        @php
                                                            $imageUrl = ImageHelper::getPaymentScreenshotUrl($booking->payment_screenshot);
                                                            $imageExists = ImageHelper::paymentScreenshotExists($booking->payment_screenshot);
                                                        @endphp
                                                        @if($imageExists)
                                                            <a href="{{ $imageUrl }}" target="_blank" class="btn btn-info">
                                                                <i class="fas fa-download"></i> Download Screenshot
                                                            </a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No bookings found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }} of {{ $bookings->total() }} entries
                        </div>
                        <div>
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Full-width Admin Dashboard */
.admin-dashboard-full {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 0;
}

/* No Image Placeholder */
.no-image-placeholder {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    border: 2px solid #cf921c;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.no-image-placeholder:hover {
    background: linear-gradient(135deg, #dee2e6 0%, #ced4da 100%);
    transform: scale(1.1);
}

.no-image-placeholder i {
    color: #6c757d;
    font-size: 1.5rem;
}

/* Admin Banner Styles */
.admin-banner {
    background: linear-gradient(135deg, #000000 0%, #181E23 100%);
    border-radius: 15px;
    padding: 40px 30px;
    color: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.admin-banner::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: linear-gradient(135deg, #cf921c 0%, #b8821a 100%);
    border-radius: 50%;
    transform: translate(50%, -50%);
    opacity: 0.1;
}

.banner-content {
    position: relative;
    z-index: 1;
}

.banner-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #cf921c;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.banner-subtitle {
    font-size: 1.1rem;
    color: #ffffff;
    opacity: 0.9;
    margin-bottom: 20px;
}

.banner-stats {
    display: flex;
    gap: 30px;
    margin-top: 20px;
}

.stat-item {
    text-align: center;
    padding: 15px 20px;
    background: rgba(255,255,255,0.1);
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.3s ease;
}

.stat-item:hover {
    background: rgba(255,255,255,0.15);
    transform: translateY(-2px);
}

.stat-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 700;
    color: #cf921c;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 0.9rem;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.banner-image {
    text-align: center;
    position: relative;
    z-index: 1;
}

.banner-image i {
    font-size: 8rem;
    color: #cf921c;
    opacity: 0.8;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Site Color Scheme - Black and Gold Theme */
.page-header {
    margin-bottom: 30px;
    background: linear-gradient(135deg, #000000 0%, #181E23 100%);
    padding: 30px;
    border-radius: 15px;
    color: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #cf921c;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.page-header p {
    color: #ffffff;
    font-size: 1.1rem;
    opacity: 0.9;
}

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.15);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
}

.card-header {
    background: linear-gradient(135deg, #cf921c 0%, #b8821a 100%);
    color: white;
    border-radius: 15px 15px 0 0 !important;
    border: none;
    font-weight: 600;
    font-size: 1.2rem;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(207,146,28,0.3);
}

.filter-card .card-header {
    background: linear-gradient(135deg, #000000 0%, #181E23 100%);
}

.table-card .card-header {
    background: linear-gradient(135deg, #cf921c 0%, #b8821a 100%);
}

.table-responsive {
    border-radius: 0 0 15px 15px;
    background: white;
}

.table {
    margin-bottom: 0;
}

.table th {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-top: none;
    font-weight: 700;
    color: #000000;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    padding: 15px 12px;
}

.table td {
    padding: 15px 12px;
    vertical-align: middle;
    border-color: #e9ecef;
}

.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
    transform: scale(1.01);
}

.btn-sm {
    padding: 8px 16px;
    font-size: 0.85rem;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.form-control-sm {
    font-size: 0.9rem;
    border-radius: 8px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control-sm:focus {
    border-color: #cf921c;
    box-shadow: 0 0 0 0.2rem rgba(207,146,28,0.25);
}

.btn-admin {
    background: linear-gradient(135deg, #000000 0%, #181E23 100%);
    color: white;
    border: none;
    padding: 10px 25px;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.btn-admin:hover {
    background: linear-gradient(135deg, #181E23 0%, #000000 100%);
    color: #cf921c;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

.btn-secondary {
    background: #6c757d;
    color: white;
    border: none;
    padding: 10px 25px;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
}

.btn-info {
    background: linear-gradient(135deg, #cf921c 0%, #b8821a 100%);
    color: white;
    border: none;
    transition: all 0.3s ease;
}

.btn-info:hover {
    background: linear-gradient(135deg, #b8821a 0%, #cf921c 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(207,146,28,0.4);
}

.btn-primary {
    background: linear-gradient(135deg, #000000 0%, #181E23 100%);
    color: white;
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #181E23 0%, #000000 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.badge {
    padding: 6px 12px;
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge-status {
    padding: 8px 16px;
    font-size: 0.8rem;
    font-weight: 700;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge-pending {
    background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
    color: #000;
}

.badge-confirmed {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
}

.badge-completed {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    color: white;
}

.badge-cancelled {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
}

.badge-verified {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
}

.badge-unverified {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
}

/* Payment Screenshot Preview */
.payment-screenshot-thumb {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #cf921c;
    cursor: pointer;
    transition: all 0.3s ease;
}

.payment-screenshot-thumb:hover {
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(207,146,28,0.4);
}

.payment-screenshot-modal {
    max-width: 100%;
    max-height: 70vh;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
}

.screenshot-container {
    position: relative;
    display: inline-block;
}

.screenshot-container img {
    transition: all 0.3s ease;
}

.screenshot-container:hover img {
    transform: scale(1.02);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

/* Modal Styling */
.modal-content {
    border-radius: 15px;
    border: none;
    box-shadow: 0 10px 40px rgba(0,0,0,0.3);
}

.modal-header {
    background: linear-gradient(135deg, #000000 0%, #181E23 100%);
    color: white;
    border-radius: 15px 15px 0 0;
    border: none;
}

.modal-title {
    color: #cf921c;
    font-weight: 700;
}

.close {
    color: white;
    opacity: 0.8;
}

.close:hover {
    opacity: 1;
    color: #cf921c;
}

.btn-close {
    filter: invert(1) grayscale(100%) brightness(200%);
    opacity: 0.8;
    transition: all 0.3s ease;
}

.btn-close:hover {
    opacity: 1;
    filter: invert(1) grayscale(100%) brightness(200%) sepia(100%) hue-rotate(330deg) saturate(500%);
}

/* Pagination */
.pagination .page-link {
    color: #000000;
    border-color: #e9ecef;
    padding: 10px 15px;
    margin: 0 2px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: linear-gradient(135deg, #cf921c 0%, #b8821a 100%);
    color: white;
    border-color: #cf921c;
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #000000 0%, #181E23 100%);
    border-color: #000000;
}

/* Responsive */
@media (max-width: 768px) {
    .banner-title {
        font-size: 1.8rem;
    }
    
    .banner-stats {
        flex-direction: column;
        gap: 15px;
    }
    
    .stat-item {
        padding: 10px 15px;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
    
    .banner-image i {
        font-size: 4rem;
    }
    
    .page-title {
        font-size: 1.8rem;
    }
    
    .table th, .table td {
        padding: 10px 8px;
        font-size: 0.85rem;
    }
    
    .btn-sm {
        padding: 6px 12px;
        font-size: 0.8rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap 5 tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
    
    // Handle modal show events
    document.addEventListener('show.bs.modal', function (e) {
        var modal = e.target;
        
        // Add loading state for payment screenshots
        var img = modal.querySelector('.payment-screenshot-modal');
        if (img) {
            var originalSrc = img.src;
            
            // Show loading state
            img.addEventListener('load', function() {
                console.log('Payment screenshot loaded successfully:', originalSrc);
            }, { once: true });
            
            img.addEventListener('error', function() {
                console.log('Payment screenshot failed to load:', originalSrc);
                this.src = '{{ asset("images/no-image.jpg") }}';
            }, { once: true });
        }
    });
    
    // Handle modal hide events
    document.addEventListener('hidden.bs.modal', function (e) {
        var modal = e.target;
        
        // Reset any form states if needed
        var forms = modal.querySelectorAll('form');
        forms.forEach(function(form) {
            form.reset();
        });
    });
    
    // Handle image loading errors for thumbnails
    var thumbnails = document.querySelectorAll('.payment-screenshot-thumb');
    thumbnails.forEach(function(thumb) {
        thumb.addEventListener('error', function() {
            console.log('Thumbnail failed to load:', this.src);
            this.src = '{{ asset("images/no-image.jpg") }}';
        });
        
        thumb.addEventListener('load', function() {
            console.log('Thumbnail loaded successfully:', this.src);
        });
    });
    
    // Add hover effects to table rows
    var tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(function(row) {
        row.addEventListener('mouseenter', function() {
            this.classList.add('table-row-hover');
        });
        
        row.addEventListener('mouseleave', function() {
            this.classList.remove('table-row-hover');
        });
    });
    
    // Handle form submissions with confirmation
    var confirmForms = document.querySelectorAll('form[data-confirm]');
    confirmForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            if (!confirm(this.dataset.confirm)) {
                e.preventDefault();
                return false;
            }
        });
    });
    
    // Add click handler for screenshot containers
    var screenshotContainers = document.querySelectorAll('.screenshot-container');
    screenshotContainers.forEach(function(container) {
        container.addEventListener('click', function() {
            var img = this.querySelector('img');
            if (img) {
                // Log image info for debugging
                console.log('Screenshot clicked:', {
                    src: img.src,
                    alt: img.alt,
                    naturalWidth: img.naturalWidth,
                    naturalHeight: img.naturalHeight
                });
            }
        });
    });
});
</script>
@endsection
