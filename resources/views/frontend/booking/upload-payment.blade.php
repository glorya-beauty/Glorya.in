@extends('layouts.app')

@section('title', 'Upload Payment - Glorya Beauty')
@section('description', 'Upload your payment screenshot at Glorya Beauty')

@section('content')
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{ asset('images/testimonial/test-bg.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>Upload Payment Screenshot</h2>    
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Book Service</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('booking.payment', $booking->id) }}">Payment</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Upload Screenshot</li>
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

<!-- upload-payment-area -->
<section class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url({{ asset('images/bg/contact-bg.png') }})">
    <div class="contact-bg-an-01"><img src="{{ asset('images/bg/contact-bg-an-01.png') }}" alt="contact-bg-an-01"></div>
    <div class="contact-bg-an-02"><img src="{{ asset('images/bg/contact-bg-an-02.png') }}" alt="contact-bg-an-01"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="contact-bg02 wow fadeInLeft animated">
                    <div class="section-title mb-30">   
                        <h2>Upload Payment Screenshot</h2>
                        <span class="line5"> <img src="{{ asset('images/bg/circle_right.png') }}" alt="circle_left"></span>
                    </div>

                    <!-- Booking Summary -->
                    <div class="booking-summary mb-40" style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                        <h4>Booking Details</h4>
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
                                <p><strong>Payment Status:</strong> <span class="badge badge-warning">Pending Verification</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Form -->
                    <form action="{{ route('booking.upload.payment', $booking->id) }}" method="POST" enctype="multipart/form-data" class="contact-form">
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="upload-instructions mb-30" style="background: #e8f4fd; padding: 20px; border-radius: 8px; border-left: 4px solid #007bff;">
                                    <h5><i class="fas fa-info-circle"></i> Upload Instructions</h5>
                                    <ul>
                                        <li>Please upload a clear screenshot of your payment confirmation</li>
                                        <li>The screenshot should show the transaction ID, amount, and recipient details</li>
                                        <li>Accepted formats: JPEG, PNG, GIF (Max size: 2MB)</li>
                                        <li>Our team will verify your payment within 24 hours</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="contact-field p-relative c-message mb-20">
                                    <label for="payment_screenshot">Payment Screenshot *</label>
                                    <div class="file-upload-area" style="border: 2px dashed #ddd; padding: 30px; text-align: center; border-radius: 8px; background: #fafafa;">
                                        <i class="fas fa-cloud-upload-alt" style="font-size: 48px; color: #007bff; margin-bottom: 15px;"></i>
                                        <p>Click to upload or drag and drop</p>
                                        <p style="color: #666; font-size: 14px;">JPEG, PNG, GIF (Max. 2MB)</p>
                                        <input type="file" id="payment_screenshot" name="payment_screenshot" accept="image/*" required style="display: none;">
                                        <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('payment_screenshot').click()">
                                            Choose File
                                        </button>
                                    </div>
                                    
                                    <!-- Preview Area -->
                                    <div id="preview-area" style="display: none; margin-top: 20px;">
                                        <h6>Preview:</h6>
                                        <img id="image-preview" style="max-width: 100%; max-height: 300px; border-radius: 8px; border: 1px solid #ddd;">
                                        <p id="file-name" style="margin-top: 10px; color: #666;"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="contact-field p-relative c-message mb-20">
                                    <label for="notes">Additional Notes (Optional)</label>
                                    <textarea name="notes" id="notes" rows="3" placeholder="Any additional information about your payment..."></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="alert alert-warning">
                                    <strong>Important:</strong> By uploading this screenshot, you confirm that you have made the payment of {{ $booking->amount }}/- for the selected service. False payment screenshots will result in booking cancellation.
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="slider-btn">
                                    <button type="submit" class="btn ss-btn active" data-animation="fadeInRight" data-delay=".8s">
                                        <i class="fas fa-check btn-icon mr-1"></i> Submit Payment Screenshot
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upload-payment-area-end -->
@endsection

@push('styles')
<style>
    .file-upload-area {
        transition: all 0.3s ease;
    }
    .file-upload-area:hover {
        border-color: #007bff;
        background: #f0f8ff;
    }
    #preview-area {
        text-align: center;
    }
    .badge {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: normal;
    }
    .badge-warning {
        background-color: #ffc107;
        color: #212529;
    }
</style>
@endpush

@push('scripts')
<script>
    // File upload preview
    document.getElementById('payment_screenshot').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewArea = document.getElementById('preview-area');
        const imagePreview = document.getElementById('image-preview');
        const fileName = document.getElementById('file-name');

        if (file) {
            // Check file size (2MB limit)
            if (file.size > 2 * 1024 * 1024) {
                alert('File size must be less than 2MB');
                e.target.value = '';
                return;
            }

            // Check file type
            if (!file.type.match('image.*')) {
                alert('Please select an image file');
                e.target.value = '';
                return;
            }

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                fileName.textContent = 'Selected file: ' + file.name;
                previewArea.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            previewArea.style.display = 'none';
        }
    });

    // Drag and drop functionality
    const uploadArea = document.querySelector('.file-upload-area');
    const fileInput = document.getElementById('payment_screenshot');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        uploadArea.style.borderColor = '#007bff';
        uploadArea.style.background = '#f0f8ff';
    }

    function unhighlight(e) {
        uploadArea.style.borderColor = '#ddd';
        uploadArea.style.background = '#fafafa';
    }

    uploadArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        
        if (files.length > 0) {
            fileInput.files = files;
            
            // Trigger change event to show preview
            const event = new Event('change', { bubbles: true });
            fileInput.dispatchEvent(event);
        }
    }
</script>
@endpush
