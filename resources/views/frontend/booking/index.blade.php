@extends('layouts.app')

@section('title', 'Book Service - Glorya Beauty')
@section('description', 'Book your beauty service appointment at Glorya Beauty')

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
                                    <li class="breadcrumb-item active" aria-current="page">Book Service</li>
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

<!-- booking-area -->
<section class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url({{ asset('images/bg/contact-bg.png') }})">
    <div class="contact-bg-an-01"><img src="{{ asset('images/bg/contact-bg-an-01.png') }}" alt="contact-bg-an-01"></div>
    <div class="contact-bg-an-02"><img src="{{ asset('images/bg/contact-bg-an-02.png') }}" alt="contact-bg-an-01"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="contact-bg02 wow fadeInLeft animated">
                    <div class="section-title mb-30">   
                        <h2>Book Your Service</h2>
                        <span class="line5"> <img src="{{ asset('images/bg/circle_right.png') }}" alt="circle_left"></span>
                    </div>
                    
                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data" class="contact-form">
                        @csrf
                        <div class="row">
                            <!-- Service Selection -->
                            <div class="col-lg-12">
                                <div class="contact-field p-relative c-subject mb-20">
                                    <label for="service_name">Select Service *</label>
                                    <select name="service_name" id="service_name" required>
                                        <option value="">Choose a Service</option>
                                        @foreach($services as $category => $categoryServices)
                                            <optgroup label="{{ ucfirst($category) }}">
                                                @foreach($categoryServices as $serviceName => $price)
                                                    <option value="{{ $serviceName }}" data-price="{{ $price }}">
                                                        {{ $serviceName }} - {{ $price }}/-</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Amount (Hidden, will be set by JavaScript) -->
                            <div class="col-lg-6">
                                <div class="contact-field p-relative c-subject mb-20">
                                    <label for="amount">Amount *</label>
                                    <input type="number" id="amount" name="amount" readonly required>
                                </div>
                            </div>

                            <!-- Customer Name -->
                            <div class="col-lg-6">
                                <div class="contact-field p-relative c-name mb-20">
                                    <label for="customer_name">Your Name *</label>
                                    <input type="text" id="customer_name" name="customer_name" value="{{ Auth::user()->name ?? '' }}" required>
                                </div>
                            </div>

                            <!-- Customer Email -->
                            <div class="col-lg-6">
                                <div class="contact-field p-relative c-email mb-20">
                                    <label for="customer_email">Email Address *</label>
                                    <input type="email" id="customer_email" name="customer_email" value="{{ Auth::user()->email ?? '' }}" required>
                                </div>
                            </div>

                            <!-- Customer Phone -->
                            <div class="col-lg-6">
                                <div class="contact-field p-relative c-subject mb-20">
                                    <label for="customer_phone">Phone Number *</label>
                                    <input type="tel" id="customer_phone" name="customer_phone" required>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-lg-12">
                                <div class="contact-field p-relative c-message mb-20">
                                    <label for="customer_address">Full Address *</label>
                                    <textarea name="customer_address" id="customer_address" rows="3" required placeholder="Enter your complete address"></textarea>
                                </div>
                            </div>

                            <!-- Location with Map -->
                            <div class="col-lg-12">
                                <div class="contact-field p-relative c-message mb-20">
                                    <label for="location">Location (Click on map to select)</label>
                                    <input type="text" id="location" name="location" readonly placeholder="Click on map to select location">
                                    <input type="hidden" id="latitude" name="latitude">
                                    <input type="hidden" id="longitude" name="longitude">
                                    
                                    <!-- Map Container -->
                                    <div id="map" style="height: 400px; margin-top: 15px; border-radius: 8px;"></div>
                                </div>
                            </div>

                            <!-- Booking Date -->
                            <div class="col-lg-6">
                                <div class="contact-field p-relative c-subject mb-20">
                                    <label for="booking_date">Preferred Date *</label>
                                    <input type="date" id="booking_date" name="booking_date" required min="{{ date('Y-m-d') }}">
                                </div>
                            </div>

                            <!-- Booking Time (Slots from 9 AM to 6 PM) -->
                            <div class="col-lg-6">
                                <div class="contact-field p-relative c-subject mb-20">
                                    <label for="booking_time">Preferred Time Slot *</label>
                                    <select name="booking_time" id="booking_time" required>
                                        <option value="">Select Time Slot</option>
                                        @for($hour = 9; $hour <= 18; $hour++)
                                            @for($minute = 0; $minute < 60; $minute += 60)
                                                @php
                                                    $time = sprintf('%02d:%02d', $hour, $minute);
                                                    $displayTime = date('h:i A', strtotime($time));
                                                    $endHour = $hour + 1;
                                                    $endTime = sprintf('%02d:%02d', $endHour, $minute);
                                                    $displayEndTime = date('h:i A', strtotime($endTime));
                                                @endphp
                                                <option value="{{ $time }}">{{ $displayTime }} - {{ $displayEndTime }}</option>
                                            @endfor
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-lg-12">
                                <div class="slider-btn">
                                    <button type="submit" class="btn ss-btn active" data-animation="fadeInRight" data-delay=".8s">
                                        <i class="fas fa-angle-right btn-icon mr-1"></i> Proceed to Payment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

<script>
document.querySelector('form').addEventListener('submit', function(e) {
    const amountField = document.getElementById('amount');
    const addressField = document.getElementById('customer_address');
    
    console.log('Form submitting...');
    console.log('Amount field value:', amountField.value, 'Is NaN:', isNaN(amountField.value));
    console.log('Address value:', addressField.value, 'Length:', addressField.value.length);
    
    // Validate amount before submission
    if (!amountField.value || isNaN(amountField.value) || parseFloat(amountField.value) <= 0) {
        e.preventDefault();
        alert('Please select a service to set the amount correctly.');
        return false;
    }
    
    // Validate address
    if (!addressField.value || addressField.value.trim().length < 5) {
        e.preventDefault();
        alert('Please enter a complete address.');
        return false;
    }
    
    // Log final form data before submission
    console.log('Final form data before submission:');
    const formData = new FormData(this);
    for (let [key, value] of formData.entries()) {
        console.log(key + ':', value);
    }
    
    // Remove any unwanted 'address' field if it exists
    if (formData.has('address')) {
        console.log('Removing unwanted address field');
        formData.delete('address');
    }
    
    // Ensure customer_address field exists and has value
    if (!formData.has('customer_address') || !formData.get('customer_address')) {
        const addressField = document.getElementById('customer_address');
        if (addressField && addressField.value) {
            formData.set('customer_address', addressField.value);
            console.log('Added customer_address field:', addressField.value);
        }
    }
    
    // Allow normal form submission (don't prevent default)
    return true;
});
</script>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- booking-area-end -->
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map {
        height: 400px;
        border-radius: 8px;
        border: 2px solid #ddd;
    }
    .contact-field label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }
    .contact-field input,
    .contact-field select,
    .contact-field textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }
    .contact-field input:focus,
    .contact-field select:focus,
    .contact-field textarea:focus {
        border-color: #f26522;
        outline: none;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // Initialize map
    let map;
    let marker;
    let selectedLat = 28.5707; // Default: Delhi
    let selectedLng = 77.3209;

    function initMap() {
        map = L.map('map').setView([selectedLat, selectedLng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        marker = L.marker([selectedLat, selectedLng], {
            draggable: true
        }).addTo(map);

        // Update coordinates when marker is dragged
        marker.on('dragend', function(e) {
            const position = marker.getLatLng();
            selectedLat = position.lat;
            selectedLng = position.lng;
            updateLocationFields();
        });

        // Update coordinates when map is clicked
        map.on('click', function(e) {
            const position = e.latlng;
            selectedLat = position.lat;
            selectedLng = position.lng;
            marker.setLatLng(position);
            updateLocationFields();
        });
    }

    function updateLocationFields() {
        document.getElementById('latitude').value = selectedLat;
        document.getElementById('longitude').value = selectedLng;
        
        // Get address from coordinates (reverse geocoding)
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${selectedLat}&lon=${selectedLng}`)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    document.getElementById('location').value = data.display_name;
                }
            })
            .catch(error => console.log('Error getting address:', error));
    }

    // Update amount when service is selected
    document.getElementById('service_name').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        const amountField = document.getElementById('amount');
        
        if (price) {
            // Ensure price is a clean number
            const numericPrice = parseFloat(price) || 0;
            amountField.value = numericPrice;
            console.log('Service selected:', this.value, 'Price:', price, 'Amount field set to:', amountField.value);
        } else {
            amountField.value = '';
            console.log('No price found, amount field cleared');
        }
    });

    // Clean up amount field on page load in case it has currency symbols
    document.addEventListener('DOMContentLoaded', function() {
        const amountField = document.getElementById('amount');
        if (amountField.value) {
            const cleanAmount = parseFloat(amountField.value) || '';
            amountField.value = cleanAmount;
            console.log('Cleaned amount on page load:', amountField.value);
        }
    });

    // Initialize map when page loads
    document.addEventListener('DOMContentLoaded', function() {
        initMap();
    });
</script>
@endpush
