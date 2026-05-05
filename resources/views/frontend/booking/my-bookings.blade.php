@extends('layouts.app')

@section('title', 'My Bookings - Glorya Beauty')
@section('description', 'View your booking history at Glorya Beauty')

@section('content')
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{ asset('images/testimonial/test-bg.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Bookings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- my-bookings-area -->
<section class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url({{ asset('images/bg/contact-bg.png') }})">
    <div class="contact-bg-an-01"><img src="{{ asset('images/bg/contact-bg-an-01.png') }}" alt="contact-bg-an-01"></div>
    <div class="contact-bg-an-02"><img src="{{ asset('images/bg/contact-bg-an-02.png') }}" alt="contact-bg-an-01"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="contact-bg02 wow fadeInLeft animated">
                    <div class="section-title mb-30">   
                        <h2>My Bookings</h2>
                        <span class="line5"> <img src="{{ asset('images/bg/circle_right.png') }}" alt="circle_left"></span>
                    </div>

                    @if($bookings && $bookings->count() > 0)
                        <div class="bookings-list">
                            @foreach($bookings as $booking)
                                <div class="booking-card" style="background: #f9f9f9; padding: 25px; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid {{ $booking->status == 'confirmed' ? '#28a745' : ($booking->status == 'payment_verified' ? '#17a2b8' : '#ffc107') }};">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="booking-header mb-15">
                                                <h5 class="mb-10">
                                                    {{ $booking->service_name }}
                                                    <span class="booking-id ml-2" style="color: #666; font-size: 14px;">#GLY-{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</span>
                                                </h5>
                                                <div class="booking-status">
                                                    @php
                                                        $statusClass = '';
                                                        $statusText = '';
                                                        switch($booking->status) {
                                                            case 'pending':
                                                                $statusClass = 'badge-warning';
                                                                $statusText = 'Pending';
                                                                break;
                                                            case 'payment_pending':
                                                                $statusClass = 'badge-warning';
                                                                $statusText = 'Payment Pending';
                                                                break;
                                                            case 'payment_verified':
                                                                $statusClass = 'badge-info';
                                                                $statusText = 'Payment Verified';
                                                                break;
                                                            case 'confirmed':
                                                                $statusClass = 'badge-success';
                                                                $statusText = 'Confirmed';
                                                                break;
                                                            case 'completed':
                                                                $statusClass = 'badge-primary';
                                                                $statusText = 'Completed';
                                                                break;
                                                            case 'cancelled':
                                                                $statusClass = 'badge-danger';
                                                                $statusText = 'Cancelled';
                                                                break;
                                                            default:
                                                                $statusClass = 'badge-secondary';
                                                                $statusText = 'Unknown';
                                                        }
                                                    @endphp
                                                    <!-- <span class="badge {{ $statusClass }}">{{ $statusText }}</span> -->
                                                </div>
                                            </div>
                                            
                                            <div class="booking-details">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p><strong>Date:</strong> {{ $booking->booking_date ? $booking->booking_date->format('d M Y') : 'N/A' }}</p>
                                                        <p><strong>Time:</strong> {{ $booking->time_slot ?? 'N/A' }}</p>
                                                        <p><strong>Amount:</strong> ₹{{ number_format($booking->amount, 2) }}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p><strong>Phone:</strong> {{ $booking->customer_phone }}</p>
                                                        <p><strong>Address:</strong> {{ Str::limit($booking->customer_address ?? $booking->address ?? 'N/A', 50) }}</p>
                                                        <p><strong>Booked on:</strong> {{ $booking->created_at ? $booking->created_at->diffForHumans() : 'N/A' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="booking-actions text-right">
                                                @if($booking->status == 'payment_pending')
                                                    <a href="{{ route('booking.payment', $booking->id) }}" class="btn btn-warning btn-sm mb-10">
                                                        <i class="fas fa-credit-card"></i> Complete Payment
                                                    </a>
                                                @endif
                                                
                                                @if($booking->status == 'payment_verified' && !$booking->payment_screenshot)
                                                    <a href="{{ route('booking.upload.payment', $booking->id) }}" class="btn btn-info btn-sm mb-10">
                                                        <i class="fas fa-upload"></i> Upload Screenshot
                                                    </a>
                                                @endif
                                                
                                                
                                                <div class="booking-date mt-10">
                                                    <small class="text-muted">
                                                        {{ $booking->created_at ? $booking->created_at->diffForHumans() : 'N/A' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if($booking->notes)
                                        <div class="booking-notes mt-15" style="background: #fff; padding: 10px; border-radius: 6px; border-left: 3px solid #007bff;">
                                            <strong>Notes:</strong> {{ $booking->notes }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="no-bookings text-center" style="padding: 60px 20px;">
                            <i class="fas fa-calendar-times" style="font-size: 64px; color: #ccc; margin-bottom: 20px;"></i>
                            <h4>No Bookings Found</h4>
                            <p class="text-muted mb-30">You haven't made any bookings yet. Book your first beauty service now!</p>
                            <a href="{{ route('services') }}" class="btn ss-btn active">
                                <i class="fas fa-plus btn-icon mr-1"></i> Book a Service
                            </a>
                        </div>
                    @endif
                    
                    <!-- Book Another Service Button -->
                    @if($bookings->count() > 0)
                    <div class="text-center mt-40">
                        <a href="{{ route('services') }}" class="btn ss-btn active">
                            <i class="fas fa-plus btn-icon mr-1"></i> Book Another Service
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my-bookings-area-end -->
@endsection

@push('styles')
<style>
    .booking-card {
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .booking-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    .booking-id {
        font-weight: normal;
        color: #666;
    }
    
    .badge {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: normal;
    }
    
    .badge-warning { background-color: #ffc107; color: #212529; }
    .badge-info { background-color: #17a2b8; color: white; }
    .badge-success { background-color: #28a745; color: white; }
    .badge-primary { background-color: #007bff; color: white; }
    .badge-danger { background-color: #dc3545; color: white; }
    .badge-secondary { background-color: #6c757d; color: white; }
    
    .booking-actions .btn {
        margin-bottom: 5px;
    }
    
    @media print {
        .booking-actions {
            display: none;
        }
        .btn {
            display: none;
        }
    }
</style>
@endpush
