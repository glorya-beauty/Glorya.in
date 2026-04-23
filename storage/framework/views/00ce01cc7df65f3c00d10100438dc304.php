<?php $__env->startSection('title', 'Services - Glorya Beauty'); ?>
<?php $__env->startSection('description', 'Explore our premium beauty services including skincare, nail art, makeup, and hair treatments'); ?>

<?php $__env->startSection('content'); ?>

<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?php echo e(asset('images/testimonial/test-bg.png')); ?>)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>Our Services</h2>    
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Services</li>
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

<!-- service-area -->
<section class="service-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-80">
                    <h2>Premium Beauty Services</h2>
                    <p>Discover our comprehensive range of beauty treatments designed to enhance your natural beauty</p>
                </div>
            </div>
        </div>

        <?php if($services->count() > 0): ?>
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $categoryServices): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="glorya-service-category mb-80">
                    <div class="category-header text-center mb-40">
                        <h3><i class="fas fa-spa"></i> <?php echo e($category); ?></h3>
                        <p><?php echo e(Str::title($category)); ?> tailored to enhance your beauty and confidence</p>
                    </div>
                    
                    <div class="row">
                        <?php $__currentLoopData = $categoryServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4 mb-30">
                                <div class="service-card">
                                    <?php if($service->image): ?>
                                        <img src="<?php echo e(asset('images/services/' . $service->image)); ?>" 
                                             style="height:350px;" 
                                             alt="<?php echo e($service->name); ?>"
                                             onerror="this.src='<?php echo e(asset('images/default-service.jpg')); ?>'">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/default-service.jpg')); ?>" 
                                             style="height:350px;" 
                                             alt="<?php echo e($service->name); ?>">
                                    <?php endif; ?>
                                    
                                    <div class="service-header">
                                        <h5><?php echo e($service->name); ?></h5>
                                        <div class="price-info">
                                            <span class="original-price">Rs. <?php echo e(number_format($service->original_price, 2)); ?></span>
                                            <?php if($service->discount_percentage > 0): ?>
                                                <span class="discount"><?php echo e($service->discount_percentage); ?>% OFF</span>
                                            <?php endif; ?>
                                            <span class="final-price">Rs. <?php echo e(number_format($service->final_price, 2)); ?></span>
                                            <?php if($service->duration): ?>
                                                <span class="time">Time - <?php echo e($service->duration); ?> Min</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="service-details">
                                        <p><?php echo e(Str::limit($service->description, 100)); ?></p>
                                    </div>
                                    
                                    <div class="service-action mt-3">
                                        <a href="<?php echo e(route('services.show', $service->id)); ?>" class="btn btn-outline-primary btn-sm mr-2">
                                            <i class="fas fa-eye"></i> View Details
                                        </a>
                                        <button class="btn btn-primary add-to-cart-btn btn-sm" 
                                                data-service-id="<?php echo e($service->id); ?>"
                                                data-service-name="<?php echo e($service->name); ?>"
                                                data-service-price="<?php echo e($service->final_price); ?>"
                                                data-service-image="<?php echo e($service->image ? asset('images/services/' . $service->image) : asset('images/default-service.jpg')); ?>"
                                                data-service-duration="<?php echo e($service->duration); ?>"
                                                data-service-category="<?php echo e($service->category); ?>">
                                            <i class="fas fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="text-center py-80">
                <div class="empty-services">
                    <i class="fas fa-spa fa-4x text-muted mb-30"></i>
                    <h3>No Services Available</h3>
                    <p class="text-muted">We're currently updating our service catalog. Please check back soon!</p>
                    <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary mt-20">
                        <i class="fas fa-phone"></i> Contact Us
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- service-area-end -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.service-area {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 60vh;
}

.glorya-service-category {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    margin-bottom: 40px;
}

.category-header h3 {
    color: #333;
    font-size: 2rem;
    margin-bottom: 15px;
    font-weight: 600;
}

.category-header h3 i {
    color: #cf921c;
    margin-right: 15px;
}

.category-header p {
    color: #666;
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

.service-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.service-card img {
    width: 100%;
    object-fit: cover;
}

.service-header {
    padding: 20px;
    background: linear-gradient(135deg, #000000 0%, #181E23 100%);
    color: white;
}

.service-header h5 {
    font-size: 1.2rem;
    margin-bottom: 15px;
    color: #cf921c;
}

.price-info {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 10px;
}

.original-price {
    text-decoration: line-through;
    color: #999;
    font-size: 0.9rem;
}

.discount {
    background: #28a745;
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: bold;
}

.final-price {
    font-weight: bold;
    font-size: 1.1rem;
    color: #cf921c;
}

.time {
    font-size: 0.85rem;
    color: #ccc;
}

.service-details {
    padding: 20px;
}

.service-details p {
    color: #666;
    line-height: 1.6;
    margin: 0;
}

.service-action {
    padding: 0 20px 20px;
    display: flex;
    gap: 10px;
    align-items: center;
}

.add-to-cart-btn:hover {
    background: #cf921c;
    border-color: #cf921c;
    transform: scale(1.05);
}

.empty-services {
    padding: 60px 30px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    max-width: 600px;
    margin: 0 auto;
}

@media (max-width: 768px) {
    .glorya-service-category {
        padding: 20px;
        margin-bottom: 30px;
    }
    
    .category-header h3 {
        font-size: 1.5rem;
    }
    
    .service-action {
        flex-direction: column;
    }
    
    .service-action .btn {
        width: 100%;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// Cart functionality is handled by cart-manager.js
// Additional service-specific JavaScript can be added here
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Gloryabeauty\resources\views/frontend/services/index.blade.php ENDPATH**/ ?>