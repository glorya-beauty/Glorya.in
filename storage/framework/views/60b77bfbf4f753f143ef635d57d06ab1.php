<?php $__env->startSection('title', '<?php echo e($service->name); ?> - Glorya Beauty'); ?>
<?php $__env->startSection('description', '<?php echo e(Str::limit($service->description, 160)); ?>'); ?>

<?php $__env->startSection('content'); ?>

<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?php echo e(asset('images/testimonial/test-bg.png')); ?>)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2><?php echo e($service->name); ?></h2>    
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('services')); ?>">Services</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($service->name); ?></li>
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

<!-- service-detail-area -->
<section class="service-detail-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <!-- Service Image -->
            <div class="col-lg-6 mb-30">
                <div class="service-detail-image">
                    <?php if($service->image): ?>
                        <img src="<?php echo e(asset('images/services/' . $service->image)); ?>" 
                             alt="<?php echo e($service->name); ?>"
                             onerror="this.src='<?php echo e(asset('images/default-service.jpg')); ?>'"
                             class="img-fluid rounded">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/default-service.jpg')); ?>" 
                             alt="<?php echo e($service->name); ?>"
                             class="img-fluid rounded">
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Service Info -->
            <div class="col-lg-6 mb-30">
                <div class="service-detail-info">
                    <h2><?php echo e($service->name); ?></h2>
                    <div class="service-meta mb-30">
                        <span class="category-badge">
                            <i class="fas fa-tag"></i> <?php echo e($service->category); ?>

                        </span>
                        <?php if($service->duration): ?>
                            <span class="duration-badge">
                                <i class="fas fa-clock"></i> <?php echo e($service->duration); ?> Minutes
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="service-pricing mb-30">
                        <div class="price-info">
                            <?php if($service->discount_percentage > 0): ?>
                                <span class="original-price">Rs. <?php echo e(number_format($service->original_price, 2)); ?></span>
                                <span class="discount-badge"><?php echo e($service->discount_percentage); ?>% OFF</span>
                            <?php endif; ?>
                            <span class="final-price">Rs. <?php echo e(number_format($service->final_price, 2)); ?></span>
                        </div>
                    </div>
                    
                    <div class="service-description mb-30">
                        <h4>About This Service</h4>
                        <p><?php echo e($service->description); ?></p>
                    </div>
                    
                    <?php if($service->subcategory): ?>
                        <div class="service-type mb-30">
                            <h4>Service Type</h4>
                            <p><?php echo e($service->subcategory); ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-action">
                        <button class="btn btn-primary btn-lg add-to-cart-btn" 
                                data-service-id="<?php echo e($service->id); ?>"
                                data-service-name="<?php echo e($service->name); ?>"
                                data-service-price="<?php echo e($service->final_price); ?>"
                                data-service-image="<?php echo e($service->image ? asset('images/services/' . $service->image) : asset('images/default-service.jpg')); ?>"
                                data-service-duration="<?php echo e($service->duration); ?>"
                                data-service-category="<?php echo e($service->category); ?>">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                        
                        <a href="<?php echo e(route('services')); ?>" class="btn btn-outline-primary btn-lg ml-3">
                            <i class="fas fa-arrow-left"></i> Back to Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Services -->
        <?php if($relatedServices->count() > 0): ?>
            <div class="row mt-80">
                <div class="col-lg-12">
                    <div class="related-services">
                        <h3 class="section-title mb-40">Related Services</h3>
                        <div class="row">
                            <?php $__currentLoopData = $relatedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-3 mb-30">
                                    <div class="related-service-card">
                                        <?php if($relatedService->image): ?>
                                            <img src="<?php echo e(asset('images/services/' . $relatedService->image)); ?>" 
                                                 alt="<?php echo e($relatedService->name); ?>"
                                                 onerror="this.src='<?php echo e(asset('images/default-service.jpg')); ?>'">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('images/default-service.jpg')); ?>" 
                                                 alt="<?php echo e($relatedService->name); ?>">
                                        <?php endif; ?>
                                        
                                        <div class="related-service-info">
                                            <h5><?php echo e($relatedService->name); ?></h5>
                                            <div class="price">
                                                <?php if($relatedService->discount_percentage > 0): ?>
                                                    <span class="original-price">Rs. <?php echo e(number_format($relatedService->original_price, 2)); ?></span>
                                                <?php endif; ?>
                                                <span class="final-price">Rs. <?php echo e(number_format($relatedService->final_price, 2)); ?></span>
                                            </div>
                                            <div class="action">
                                                <a href="<?php echo e(route('services.show', $relatedService->id)); ?>" class="btn btn-outline-primary btn-sm">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- service-detail-area-end -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.service-detail-area {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 60vh;
}

.service-detail-image img {
    width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.service-detail-info {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.service-detail-info h2 {
    color: #333;
    font-size: 2.5rem;
    margin-bottom: 20px;
    font-weight: 600;
}

.service-meta {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.category-badge, .duration-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 500;
}

.category-badge {
    background: #f8f9fa;
    color: #333;
    border: 1px solid #e9ecef;
}

.duration-badge {
    background: #e3f2fd;
    color: #1976d2;
}

.service-pricing .price-info {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.original-price {
    text-decoration: line-through;
    color: #999;
    font-size: 1.2rem;
}

.discount-badge {
    background: #28a745;
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: bold;
}

.final-price {
    font-size: 2rem;
    font-weight: bold;
    color: #cf921c;
}

.service-description h4, .service-type h4 {
    color: #333;
    font-size: 1.3rem;
    margin-bottom: 15px;
}

.service-description p {
    color: #666;
    line-height: 1.8;
    font-size: 1.1rem;
}

.service-action {
    margin-top: 30px;
}

.related-services {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.section-title {
    color: #333;
    font-size: 2rem;
    margin-bottom: 30px;
    text-align: center;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: #cf921c;
}

.related-service-card {
    background: #f8f9fa;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
}

.related-service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.related-service-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.related-service-info {
    padding: 20px;
}

.related-service-info h5 {
    color: #333;
    font-size: 1rem;
    margin-bottom: 10px;
    line-height: 1.4;
}

.related-service-info .price {
    margin-bottom: 15px;
}

.related-service-info .original-price {
    text-decoration: line-through;
    color: #999;
    font-size: 0.9rem;
}

.related-service-info .final-price {
    font-weight: bold;
    color: #cf921c;
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .service-detail-info {
        padding: 25px;
    }
    
    .service-detail-info h2 {
        font-size: 2rem;
    }
    
    .final-price {
        font-size: 1.5rem;
    }
    
    .service-action {
        text-align: center;
    }
    
    .service-action .btn {
        width: 100%;
        margin: 10px 0;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// Cart functionality is handled by cart-manager.js
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Gloryabeauty\resources\views/frontend/services/show.blade.php ENDPATH**/ ?>