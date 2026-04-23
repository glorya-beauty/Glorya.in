@extends('layouts.app')

@section('title', 'Payment - Glorya Beauty')
@section('description', 'Complete your booking payment at Glorya Beauty')

@section('content')
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{ asset('images/testimonial/test-bg.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>Payment</h2>    
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Book Service</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Payment</li>
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

<!-- payment-area -->
<section class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url({{ asset('images/bg/contact-bg.png') }})">
    <div class="contact-bg-an-01"><img src="{{ asset('images/bg/contact-bg-an-01.png') }}" alt="contact-bg-an-01"></div>
    <div class="contact-bg-an-02"><img src="{{ asset('images/bg/contact-bg-an-02.png') }}" alt="contact-bg-an-01"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="contact-bg02 wow fadeInLeft animated">
                    <div class="section-title mb-30">   
                        <h2>Complete Your Payment</h2>
                        <span class="line5"> <img src="{{ asset('images/bg/circle_right.png') }}" alt="circle_left"></span>
                    </div>

                    <!-- Booking Summary -->
                    <div class="booking-summary mb-40" style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                        <h4>Booking Summary</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Service:</strong> {{ $booking->service_name }}</p>
                                <p><strong>Amount:</strong> {{ $booking->amount }}/-</p>
                                <p><strong>Date:</strong> {{ $booking->booking_date->format('d M Y') }}</p>
                                <p><strong>Time:</strong> {{ $booking->booking_time->format('h:i A') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ $booking->customer_name }}</p>
                                <p><strong>Email:</strong> {{ $booking->customer_email }}</p>
                                <p><strong>Phone:</strong> {{ $booking->customer_phone }}</p>
                                <p><strong>Address:</strong> {{ $booking->address }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="payment-instructions mb-40">
                        <h4>Payment Instructions</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="qr-code text-center" style="background: white; padding: 20px; border-radius: 8px; border: 1px solid #ddd;">
                                    <h5>Scan QR Code to Pay</h5>
                                    <img src="{{ asset('images/QR.png') }}" alt="Payment QR Code" style="max-width: 250px; height: auto; margin: 20px 0;">
                                    <p class="text-muted">Scan with any payment app (PhonePe, PayTM, Google Pay, etc.)</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="payment-details">
                                    <h5>Payment Details</h5>
                                    <ul class="list-unstyled">
                                        <li><strong>Amount to Pay:</strong> {{ $booking->amount }}/-</li>
                                        <li><strong>UPI ID:</strong> gloryabeauty@upi</li>
                                        <li><strong>Phone Number:</strong> 01141767035</li>
                                        <li><strong>Account Holder:</strong> Glorya Beauty</li>
                                    </ul>
                                    <div class="alert alert-info">
                                        <strong>Important:</strong> After making payment, please upload the payment screenshot on the next step for verification.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Proceed Button -->
                    <div class="text-center">
                        <a href="{{ route('booking.upload.payment', $booking->id) }}" class="btn ss-btn active">
                            <i class="fas fa-arrow-right btn-icon mr-1"></i> I Have Paid - Upload Screenshot
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- payment-area-end -->
@endsection
