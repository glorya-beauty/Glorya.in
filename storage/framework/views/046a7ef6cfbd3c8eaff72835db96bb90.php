<?php
use App\Helpers\ImageHelper;
?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
                                <span class="stat-number"><?php echo e($bookings->total()); ?></span>
                                <span class="stat-label">Total Bookings</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number"><?php echo e($bookings->where('status', 'pending')->count()); ?></span>
                                <span class="stat-label">Pending</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number"><?php echo e($bookings->where('payment_verified', 0)->count()); ?></span>
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
                        <form method="GET" action="<?php echo e(route('admin.bookings')); ?>">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control form-control-admin">
                                        <option value="">All Status</option>
                                        <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                        <option value="confirmed" <?php echo e(request('status') == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                                        <option value="completed" <?php echo e(request('status') == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                        <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="payment_verified">Payment</label>
                                    <select name="payment_verified" id="payment_verified" class="form-control form-control-admin">
                                        <option value="">All Payments</option>
                                        <option value="1" <?php echo e(request('payment_verified') == '1' ? 'selected' : ''); ?>>Verified</option>
                                        <option value="0" <?php echo e(request('payment_verified') == '0' ? 'selected' : ''); ?>>Not Verified</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="service">Service</label>
                                    <select name="service" id="service" class="form-control form-control-admin">
                                        <option value="">All Services</option>
                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($service); ?>" <?php echo e(request('service') == $service ? 'selected' : ''); ?>><?php echo e($service); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control form-control-admin" value="<?php echo e(request('customer_name')); ?>" placeholder="Search...">
                                </div>
                                <div class="col-md-2">
                                    <label for="date_from">Date From</label>
                                    <input type="date" name="date_from" id="date_from" class="form-control form-control-admin" value="<?php echo e(request('date_from')); ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="date_to">Date To</label>
                                    <input type="date" name="date_to" id="date_to" class="form-control form-control-admin" value="<?php echo e(request('date_to')); ?>">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-admin btn-primary-admin">
                                        <i class="fas fa-filter"></i> Apply Filters
                                    </button>
                                    <a href="<?php echo e(route('admin.bookings')); ?>" class="btn btn-secondary">
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
                        <h5 class="card-title mb-0">Bookings List (<?php echo e($bookings->total()); ?> total)</h5>
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
                                <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($booking->id); ?></td>
                                        <td>
                                            <strong><?php echo e($booking->customer_name); ?></strong><br>
                                            <small class="text-muted"><?php echo e($booking->customer_email); ?></small><br>
                                            <small class="text-muted"><?php echo e($booking->customer_phone); ?></small>
                                        </td>
                                        <td><?php echo e($booking->service_name); ?></td>
                                        <td><?php echo e($booking->booking_date ? $booking->booking_date->format('M d, Y') : 'N/A'); ?></td>
                                        <td><?php echo e($booking->time_slot); ?></td>
                                        <td>₹<?php echo e(number_format($booking->amount, 2)); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('admin.booking.status', $booking->id)); ?>" method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="pending" <?php echo e($booking->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                                    <option value="confirmed" <?php echo e($booking->status == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                                                    <option value="completed" <?php echo e($booking->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                                    <option value="cancelled" <?php echo e($booking->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('admin.booking.payment.verify', $booking->id)); ?>" method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <select name="payment_verified" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="0" <?php echo e(!$booking->payment_verified ? 'selected' : ''); ?>>Not Verified</option>
                                                    <option value="1" <?php echo e($booking->payment_verified ? 'selected' : ''); ?>>Verified</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <?php if($booking->payment_screenshot): ?>
                                                <?php
                                                    $imageUrl = ImageHelper::getPaymentScreenshotUrl($booking->payment_screenshot);
                                                    $imageExists = ImageHelper::paymentScreenshotExists($booking->payment_screenshot);
                                                ?>
                                                <?php if($imageExists): ?>
                                                    <img src="<?php echo e($imageUrl); ?>" 
                                                         class="payment-screenshot-thumb" 
                                                         alt="Payment Screenshot" 
                                                         title="Payment screenshot available"
                                                         onerror="this.src='<?php echo e(asset('images/no-image.jpg')); ?>'; console.log('Thumbnail failed to load:', this.src);">
                                                <?php else: ?>
                                                    <div class="no-image-placeholder" 
                                                         title="Payment screenshot file not found">
                                                        <i class="fas fa-exclamation-triangle"></i>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="mt-1">
                                                    <a href="<?php echo e($imageUrl); ?>" 
                                                       target="_blank" 
                                                       class="btn btn-sm btn-info">
                                                        <i class="fas fa-external-link-alt"></i> View
                                                    </a>
                                                    <a href="<?php echo e($imageUrl); ?>" 
                                                       download="payment-screenshot-<?php echo e($booking->id); ?>-<?php echo e(basename($booking->payment_screenshot)); ?>"
                                                       class="btn btn-sm btn-success">
                                                        <i class="fas fa-download"></i> Download
                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <span class="badge badge-unverified">No Screenshot</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="9" class="text-center">No bookings found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            Showing <?php echo e($bookings->firstItem()); ?> to <?php echo e($bookings->lastItem()); ?> of <?php echo e($bookings->total()); ?> entries
                        </div>
                        <div>
                            <?php echo e($bookings->links()); ?>

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

.btn-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    border: none;
    transition: all 0.3s ease;
}

.btn-success:hover {
    background: linear-gradient(135deg, #20c997 0%, #28a745 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(40,167,69,0.4);
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
// Simple functionality for admin booking page
$(document).ready(function() {
    // Handle image loading errors
    $('.payment-screenshot-thumb').on('error', function() {
        $(this).attr('src', '<?php echo e(asset("images/no-image.jpg")); ?>');
    });
    
    // Form submissions
    $('form').on('submit', function() {
        return true;
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/admin/bookings.blade.php ENDPATH**/ ?>