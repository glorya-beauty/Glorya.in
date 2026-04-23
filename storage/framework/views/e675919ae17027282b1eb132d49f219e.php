<?php $__env->startSection('title', 'Booking Successful - Glorya Beauty'); ?>
<?php $__env->startSection('description', 'Your booking has been successfully confirmed at Glorya Beauty'); ?>

<?php $__env->startSection('content'); ?>
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?php echo e(asset('images/testimonial/test-bg.png')); ?>)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>Booking Successful</h2>    
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Booking Successful</li>
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

<!-- success-area -->
<section class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url(<?php echo e(asset('images/bg/contact-bg.png')); ?>)">
    <div class="contact-bg-an-01"><img src="<?php echo e(asset('images/bg/contact-bg-an-01.png')); ?>" alt="contact-bg-an-01"></div>
    <div class="contact-bg-an-02"><img src="<?php echo e(asset('images/bg/contact-bg-an-02.png')); ?>" alt="contact-bg-an-01"></div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="success-message text-center wow fadeInLeft animated">
                    <!-- Success Icon -->
                    <div class="success-icon mb-30">
                        <i class="fas fa-check-circle" style="font-size: 80px; color: #28a745;"></i>
                    </div>

                    <div class="section-title mb-30">   
                        <h2>Booking Successful!</h2>
                        <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_right.png')); ?>" alt="circle_left"></span>
                    </div>

                    <div class="success-content mb-40">
                        <p class="lead">Thank you for booking with Glorya Beauty!</p>
                        <p>Your booking has been received and is currently under verification. We will confirm your appointment within 24 hours.</p>
                    </div>

                    <!-- Booking Details Card -->
                    <div class="booking-details-card" style="background: #f9f9f9; padding: 30px; border-radius: 12px; text-align: left; margin-bottom: 30px;">
                        <h4 class="mb-20">Booking Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-item mb-15">
                                    <strong>Booking ID:</strong> #GLY-<?php echo e(str_pad($booking->id, 6, '0', STR_PAD_LEFT)); ?>

                                </div>
                                <div class="detail-item mb-15">
                                    <strong>Service:</strong> <?php echo e($booking->service_name); ?>

                                </div>
                                <div class="detail-item mb-15">
                                    <strong>Base Amount:</strong> <?php echo e($booking->base_amount ?? 'N/A'); ?>/-
                                </div>
                                <div class="detail-item mb-15">
                                    <strong>GST (5%):</strong> <?php echo e($booking->base_amount ? number_format($booking->base_amount * 0.05, 2) : 'N/A'); ?>/-
                                </div>
                                <div class="detail-item mb-15">
                                    <strong>Total Amount:</strong> <?php echo e($booking->amount); ?>/-
                                </div>
                                <div class="detail-item mb-15">
                                    <strong>Date:</strong> <?php echo e($booking->booking_date ? (is_string($booking->booking_date) ? \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') : $booking->booking_date->format('d M Y')) : 'N/A'); ?>

                                </div>
                                <div class="detail-item mb-15">
                                    <strong>Time:</strong> <?php echo e($booking->time_slot ?? $booking->booking_time ?? 'N/A'); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item mb-15">
                                    <strong>Name:</strong> <?php echo e($booking->customer_name); ?>

                                </div>
                                <div class="detail-item mb-15">
                                    <strong>Email:</strong> <?php echo e($booking->customer_email); ?>

                                </div>
                                <div class="detail-item mb-15">
                                    <strong>Phone:</strong> <?php echo e($booking->customer_phone); ?>

                                </div>
                                <div class="detail-item mb-15">
                                    <strong>Address:</strong> <?php echo e($booking->customer_address ?? $booking->address ?? 'N/A'); ?>

                                </div>
                                <div class="detail-item mb-15">
                                    <strong>Status:</strong> 
                                    <span class="badge badge-info">Payment Verification Pending</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Next Steps -->
                    <div class="next-steps mb-40" style="background: #e8f4fd; padding: 20px; border-radius: 8px; text-align: left;">
                        <h5><i class="fas fa-info-circle"></i> What happens next?</h5>
                        <ol>
                            <li>Our team will verify your payment within 24 hours</li>
                            <li>You will receive a confirmation email/SMS once verified</li>
                            <li>Your appointment will be confirmed and added to our schedule</li>
                            <li>Please arrive 10 minutes before your appointment time</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- success-area-end -->

<!-- Thank You Modal -->
<div class="modal fade" id="thankYouModal" tabindex="-1" role="dialog" aria-labelledby="thankYouModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title w-100 text-center" id="thankYouModalLabel">
                    <i class="fas fa-check-circle mr-2"></i>Thank You! Booking Successful!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="success-animation mb-4">
                    <i class="fas fa-check-circle" style="font-size: 80px; color: #28a745; animation: pulse 2s infinite;"></i>
                </div>
                <h3 class="text-success mb-3">Your Booking Has Been Received!</h3>
                <p class="lead">Thank you for choosing Glorya Beauty! Your booking has been successfully submitted.</p>
                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Next Steps:</strong> Our team will verify your payment and confirm your appointment within 24 hours.
                </div>
                <div class="booking-summary mt-4 p-3 bg-light rounded">
                    <h5 class="mb-3">Booking Details</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Booking Number:</strong> <?php echo e($booking->booking_number ?? '#GLY-' . str_pad($booking->id, 6, '0', STR_PAD_LEFT)); ?><br>
                            <strong>Service:</strong> <?php echo e($booking->service_name); ?><br>
                            <strong>Date:</strong> <?php echo e($booking->booking_date ? (is_string($booking->booking_date) ? \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') : $booking->booking_date->format('d M Y')) : 'N/A'); ?><br>
                            <strong>Time:</strong> <?php echo e($booking->time_slot ?? $booking->booking_time ?? 'N/A'); ?>

                        </div>
                        <div class="col-md-6">
                            <strong>Total Amount:</strong> <?php echo e($booking->amount); ?>/-<br>
                            <strong>Status:</strong> <span class="badge badge-info">Payment Verification Pending</span><br>
                            <strong>Email:</strong> <?php echo e($booking->customer_email); ?><br>
                            <strong>Phone:</strong> <?php echo e($booking->customer_phone); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Close
                </button>
                <a href="<?php echo e(route('booking.my')); ?>" class="btn btn-info">
                    <i class="fas fa-list mr-2"></i>My Bookings
                </a>
                <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">
                    <i class="fas fa-home mr-2"></i>Go to Home
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .success-icon {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    
    
    .next-steps ol {
        margin: 0;
        padding-left: 20px;
    }
    
    .next-steps li {
        margin-bottom: 8px;
    }
    
    .success-animation {
        animation: bounceIn 0.6s ease-out;
    }
    
    @keyframes bounceIn {
        0% { transform: scale(0.3); opacity: 0; }
        50% { transform: scale(1.05); }
        70% { transform: scale(0.9); }
        100% { transform: scale(1); opacity: 1; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    console.log('Success page loaded, preparing modal...');
    
    // Check if modal exists
    if ($('#thankYouModal').length === 0) {
        console.error('Modal not found!');
        return;
    }
    
    // Show thank you modal immediately after page load
    setTimeout(function() {
        console.log('Attempting to show modal...');
        try {
            // Ensure Bootstrap is loaded
            if (typeof $.fn.modal === 'function') {
                $('#thankYouModal').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
                console.log('Modal shown successfully with Bootstrap');
            } else {
                console.log('Bootstrap modal not available, using fallback');
                // Fallback: show modal with vanilla JS
                const modal = document.getElementById('thankYouModal');
                if (modal) {
                    modal.style.display = 'block';
                    modal.classList.add('show');
                    modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
                    document.body.classList.add('modal-open');
                    
                    // Add backdrop manually
                    const backdrop = document.createElement('div');
                    backdrop.className = 'modal-backdrop fade show';
                    document.body.appendChild(backdrop);
                }
            }
        } catch (error) {
            console.error('Error showing modal:', error);
            // Final fallback: show alert
            alert('Thank you! Your booking has been submitted successfully and is pending verification.\n\nBooking Number: ' + 
                  ('<?php echo e($booking->booking_number ?? "#GLY-" . str_pad($booking->id, 6, "0", STR_PAD_LEFT)); ?>') + 
                  '\nTotal Amount: <?php echo e($booking->amount); ?>/-');
        }
    }, 100); // Reduced delay for faster display
    
    // Don't auto-hide modal - let user close it manually
    // Add close handler for manual close button
    $('#thankYouModal').on('hidden.bs.modal', function () {
        console.log('Modal closed by user');
    });
    
    // Debug function to manually show modal (can be called from console)
    window.showThankYouModal = function() {
        $('#thankYouModal').modal('show');
    };
    
    console.log('Modal setup complete. You can manually show modal by calling: showThankYouModal()');
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Gloryabeauty\resources\views/frontend/booking/success.blade.php ENDPATH**/ ?>