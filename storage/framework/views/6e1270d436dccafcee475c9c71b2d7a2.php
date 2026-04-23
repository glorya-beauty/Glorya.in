<?php $__env->startSection('title', 'My Bookings - Glorya Beauty'); ?>
<?php $__env->startSection('description', 'View your booking history at Glorya Beauty'); ?>

<?php $__env->startSection('content'); ?>
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?php echo e(asset('images/testimonial/test-bg.png')); ?>)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>My Bookings</h2>    
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
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
<section class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url(<?php echo e(asset('images/bg/contact-bg.png')); ?>)">
    <div class="contact-bg-an-01"><img src="<?php echo e(asset('images/bg/contact-bg-an-01.png')); ?>" alt="contact-bg-an-01"></div>
    <div class="contact-bg-an-02"><img src="<?php echo e(asset('images/bg/contact-bg-an-02.png')); ?>" alt="contact-bg-an-01"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="contact-bg02 wow fadeInLeft animated">
                    <div class="section-title mb-30">   
                        <h2>My Bookings</h2>
                        <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_right.png')); ?>" alt="circle_left"></span>
                    </div>

                    <?php if($bookings && $bookings->count() > 0): ?>
                        <div class="bookings-list">
                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="booking-card" style="background: #f9f9f9; padding: 25px; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid <?php echo e($booking->status == 'confirmed' ? '#28a745' : ($booking->status == 'payment_verified' ? '#17a2b8' : '#ffc107')); ?>;">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="booking-header mb-15">
                                                <h5 class="mb-10">
                                                    <?php echo e($booking->service_name); ?>

                                                    <span class="booking-id ml-2" style="color: #666; font-size: 14px;">#GLY-<?php echo e(str_pad($booking->id, 6, '0', STR_PAD_LEFT)); ?></span>
                                                </h5>
                                                <div class="booking-status">
                                                    <?php
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
                                                    ?>
                                                    <!-- <span class="badge <?php echo e($statusClass); ?>"><?php echo e($statusText); ?></span> -->
                                                </div>
                                            </div>
                                            
                                            <div class="booking-details">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p><strong>Date:</strong> <?php echo e($booking->booking_date ? $booking->booking_date->format('d M Y') : 'N/A'); ?></p>
                                                        <p><strong>Time:</strong> <?php echo e($booking->time_slot ?? 'N/A'); ?></p>
                                                        <p><strong>Amount:</strong> ₹<?php echo e(number_format($booking->amount, 2)); ?></p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p><strong>Phone:</strong> <?php echo e($booking->customer_phone); ?></p>
                                                        <p><strong>Address:</strong> <?php echo e(Str::limit($booking->customer_address ?? $booking->address ?? 'N/A', 50)); ?></p>
                                                        <p><strong>Booked on:</strong> <?php echo e($booking->created_at ? $booking->created_at->diffForHumans() : 'N/A'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="booking-actions text-right">
                                                <?php if($booking->status == 'payment_pending'): ?>
                                                    <a href="<?php echo e(route('booking.payment', $booking->id)); ?>" class="btn btn-warning btn-sm mb-10">
                                                        <i class="fas fa-credit-card"></i> Complete Payment
                                                    </a>
                                                <?php endif; ?>
                                                
                                                <?php if($booking->status == 'payment_verified' && !$booking->payment_screenshot): ?>
                                                    <a href="<?php echo e(route('booking.upload.payment', $booking->id)); ?>" class="btn btn-info btn-sm mb-10">
                                                        <i class="fas fa-upload"></i> Upload Screenshot
                                                    </a>
                                                <?php endif; ?>
                                                
                                                
                                                <div class="booking-date mt-10">
                                                    <small class="text-muted">
                                                        <?php echo e($booking->created_at ? $booking->created_at->diffForHumans() : 'N/A'); ?>

                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php if($booking->notes): ?>
                                        <div class="booking-notes mt-15" style="background: #fff; padding: 10px; border-radius: 6px; border-left: 3px solid #007bff;">
                                            <strong>Notes:</strong> <?php echo e($booking->notes); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="no-bookings text-center" style="padding: 60px 20px;">
                            <i class="fas fa-calendar-times" style="font-size: 64px; color: #ccc; margin-bottom: 20px;"></i>
                            <h4>No Bookings Found</h4>
                            <p class="text-muted mb-30">You haven't made any bookings yet. Book your first beauty service now!</p>
                            <a href="<?php echo e(route('services')); ?>" class="btn ss-btn active">
                                <i class="fas fa-plus btn-icon mr-1"></i> Book a Service
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Book Another Service Button -->
                    <?php if($bookings->count() > 0): ?>
                    <div class="text-center mt-40">
                        <a href="<?php echo e(route('services')); ?>" class="btn ss-btn active">
                            <i class="fas fa-plus btn-icon mr-1"></i> Book Another Service
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my-bookings-area-end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Glorya/resources/views/frontend/booking/my-bookings.blade.php ENDPATH**/ ?>