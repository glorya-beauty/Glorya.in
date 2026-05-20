

<?php $__env->startSection('title', 'Services - Glorya Beauty'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.cart-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px 20px;
    border-radius: 8px;
    font-weight: 500;
    z-index: 9999;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    animation: slideIn 0.3s ease-out;
}

.cart-notification-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.cart-notification-error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.btn-add-to-cart {
    background: linear-gradient(135deg, #cf921c 0%, #d4a574 100%);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(207, 146, 28, 0.3);
}

.btn-add-to-cart:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(207, 146, 28, 0.4);
    background: linear-gradient(135deg, #b87f1a 0%, #c1965f 100%);
}

.btn-add-to-cart:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.service-action {
    text-align: center;
}

.cart-icon {
    position: relative;
    transition: all 0.3s ease;
}

.cart-icon:hover {
    transform: translateY(-2px);
}

.cart-count {
    transition: all 0.3s ease;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('description', 'Explore our premium beauty services including skincare, nail art, makeup, and hair treatments'); ?>

<?php $__env->startSection('content'); ?>

<style>
.service-select-wrapper {
    position: relative;
}

.service-select-wrapper::before {
    content: '\f5d8';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #cf921c;
    pointer-events: none;
    z-index: 10;
}

#service_name {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    transition: all 0.3s ease;
    border: 2px solid #e9ecef;
    position: relative;
}

#service_name:hover {
    border-color: #cf921c;
    box-shadow: 0 0 0 0.2rem rgba(207, 146, 28, 0.1);
}

#service_name:focus {
    border-color: #cf921c;
    box-shadow: 0 0 0 0.25rem rgba(207, 146, 28, 0.25);
    outline: none;
}

#service_name option {
    padding: 10px;
    background: #fff;
    border: none;
}

#service_name option:checked {
    background: linear-gradient(135deg, #cf921c 0%, #b8821a 100%);
    color: white;
    font-weight: 600;
}

#service_name optgroup {
    font-weight: 700;
    color: #000000;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 8px 10px;
    margin: 5px 0;
    border-radius: 4px;
}

.service-summary {
    color: black;
    border-radius: 12px;
    padding: 20px;
    margin-top: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    animation: slideInUp 0.5s ease;
}

.service-summary h6 {
    color: white;
    font-weight: 600;
    margin-bottom: 15px;
}

.service-summary ul {
    margin-bottom: 15px;
    padding-left: 20px;
}

.service-summary li {
    margin-bottom: 5px;
}

.service-summary .price-breakdown {
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    padding-top: 15px;
    margin-top: 15px;
}

@keyframes slideInUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.form-label.fw-bold.text-primary {
    color: #000000 !important;
    font-size: 16px;
    margin-bottom: 10px;
}

.form-label i {
    color: #cf921c;
}

/* Service Details Toggle Styles */
.toggle-service-details {
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 14px;
    transition: all 0.3s ease;
    border: 1px solid #cf921c;
    color: #cf921c;
    background: transparent;
    min-width: 40px;
}

.toggle-service-details:hover {
    background: #cf921c;
    color: white;
    transform: scale(1.05);
}

.toggle-service-details:focus {
    box-shadow: 0 0 0 0.2rem rgba(207, 146, 28, 0.25);
}

.service-details {
    transition: all 0.3s ease;
}

.service-details.collapse {
    display: none;
}

.service-details.collapse.show {
    display: block;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Arrow animation */
.toggle-service-details i {
    transition: transform 0.3s ease;
}

.toggle-service-details:hover i {
    transform: scale(1.1);
}

/* Mobile responsive adjustments */
@media (max-width: 768px) {
    .toggle-service-details {
        padding: 8px 12px;
        font-size: 16px;
        min-width: 45px;
    }
    
    .service-details {
        margin-top: 15px;
    }
}

/* Service Image Styles */
.service-card {
    border: 1px solid #e9ecef;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    background: #fff;
}

.service-card:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

.service-card img {
    transition: transform 0.3s ease;
}

.service-card:hover img {
    transform: scale(1.05);
}

.service-header {
    padding: 20px;
}

.service-details {
    padding: 0 20px 20px;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .service-header {
        padding: 15px;
    }
    
    .service-details {
        padding: 0 15px 15px;
    }
}

@media (max-width: 768px) {
    .service-header {
        padding: 12px;
    }
    
    .service-details {
        padding: 0 12px 12px;
    }
}
</style>


<!-- Success Message -->
<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show text-center" style="margin-top: 20px;">
        <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!-- main-area -->
   <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?php echo e(asset('images/testimonial/test-bg.png')); ?>)">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
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
            <section id="glorya-services" class="pt-100 pb-100">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="section-title center-align mb-50 text-center">
                                 <h2>Our Premium Beauty Services</h2>
                                 <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_left.png')); ?>" alt="circle_left"></span>
                                 <p class="mt-3">Discover our complete range of beauty and wellness services designed to enhance your natural beauty</p>
                             </div>
                         </div>
                     </div>
                     <div class="row mb-60">
                        <!-- Skin Care Card -->
                         <div class="col-lg-4 col-md-6 mb-30">
                             <div class="service-category-card">
                                 <div class="service-image" style="height:350px;">
                                     <img src="<?php echo e(asset('images/services/sk.jpeg')); ?>" alt="Skin Care">
                                     <div class="service-overlay">
                                         <div class="service-icon">
                                             <i class="fas fa-spa"></i>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="service-content">
                                     <h3>Skin Care</h3>
                                     <p>Rejuvenating facials and skin treatments</p>
                                     <ul class="service-features">
                                         <li><i class="fas fa-check"></i> Facials</li>
                                         <li><i class="fas fa-check"></i> Clean-ups</li>
                                         <li><i class="fas fa-check"></i> D-TAN</li>
                                         <li><i class="fas fa-check"></i> Bleach</li>
                                     </ul>
                                     <div class="service-price">
                                         <span class="price-label">Starting from</span>
                                         <span class="price-amount">₹329</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- Makeup Services Card -->
                          
                         <div class="col-lg-4 col-md-6 mb-30">
                             <div class="service-category-card">
                                 <div class="service-image" style="height:350px;">
                                    <img src="<?php echo e(asset('images/services/re.jpeg')); ?>" alt="Makeup Services">
                                   <div class="service-overlay">
                                    
                                           <div class="service-icon">
                                              <i class="fas fa-palette"></i>
                                     
                                         </div>
                                     </div>
                                 </div>
                                 <div class="service-content">
                                     <h3>Makeup Services</h3>
                                     <p>Professional makeup artistry for every occasion</p>
                                     <ul class="service-features">
                                         <li><i class="fas fa-check"></i> Bridal Makeup</li>
                                         <li><i class="fas fa-check"></i> HD Makeup</li>
                                         <li><i class="fas fa-check"></i> Party Makeup</li>
                                         <li><i class="fas fa-check"></i> Eye Makeup</li>
                                     </ul>
                                     <div class="service-price">
                                         <span class="price-label">Starting from</span>
                                         <span class="price-amount">₹499</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         
                         <!-- Hair Services Card -->
                         <div class="col-lg-4 col-md-6 mb-30">
                             <div class="service-category-card">
                                 <div class="service-image" style="height:350px;">
                                     <img src="<?php echo e(asset('images/services/hair.jpeg')); ?>" alt="Hair Services">
                                     <div class="service-overlay">
                                         <div class="service-icon">
                                             <i class="fas fa-cut"></i>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="service-content">
                                     <h3>Hair Services</h3>
                                     <p>Expert hair styling and treatments</p>
                                     <ul class="service-features">
                                         <li><i class="fas fa-check"></i> Blow Dry</li>
                                         <li><i class="fas fa-check"></i> Hair Styling</li>
                                         <li><i class="fas fa-check"></i> Hair Cuts</li>
                                         <li><i class="fas fa-check"></i> Hair Treatments</li>
                                     </ul>
                                     <div class="service-price">
                                         <span class="price-label">Starting from</span>
                                         <span class="price-amount">₹299</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         
                         
                         
                         <!-- Nail Services Card -->
                         <div class="col-lg-4 col-md-6 mb-30">
                             <div class="service-category-card">
                                 <div class="service-image" style="height:350px;">
                                     <img src="<?php echo e(asset('images/services/marble.jpeg')); ?>" alt="Nail Services">
                                     <div class="service-overlay">
                                         <div class="service-icon">
                                             <i class="fas fa-hand-sparkles"></i>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="service-content">
                                     <h3>Nail Services</h3>
                                     <p>Beautiful nail art and care services</p>
                                     <ul class="service-features">
                                         <li><i class="fas fa-check"></i> Gel Polish</li>
                                         <li><i class="fas fa-check"></i> Nail Art</li>
                                         <li><i class="fas fa-check"></i> French Nails</li>
                                         <li><i class="fas fa-check"></i> Custom Design</li>
                                     </ul>
                                     <div class="service-price">
                                         <span class="price-label">Starting from</span>
                                         <span class="price-amount">₹499</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         
                         <!-- Waxing Services Card -->
                         <div class="col-lg-4 col-md-6 mb-30">
                             <div class="service-category-card">
                                 <div class="service-image" style="height:350px;">
                                     <img src="<?php echo e(asset('images/services/wax.jpeg')); ?>" alt="Waxing Services">
                                     <div class="service-overlay">
                                         <div class="service-icon">
                                             <i class="fas fa-fire"></i>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="service-content">
                                     <h3>Waxing Services</h3>
                                     <p>Professional waxing for smooth skin</p>
                                     <ul class="service-features">
                                         <li><i class="fas fa-check"></i> Full Body Wax</li>
                                         <li><i class="fas fa-check"></i> Leg Wax</li>
                                         <li><i class="fas fa-check"></i> Arm Wax</li>
                                         <li><i class="fas fa-check"></i> Bikini Wax</li>
                                     </ul>
                                     <div class="service-price">
                                         <span class="price-label">Starting from</span>
                                         <span class="price-amount">₹39</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         
                         <!-- Special Packages Card -->
                         <div class="col-lg-4 col-md-6 mb-30">
                             <div class="service-category-card featured">
                                 <div class="service-badge">
                                     <span>Popular</span>
                                 </div>
                                 <div class="service-image" style="height:350px;">
                                     <img src="<?php echo e(asset('images/services/party.jpeg')); ?>" alt="Special Packages">
                                     <div class="service-overlay">
                                         <div class="service-icon">
                                             <i class="fas fa-star"></i>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="service-content">
                                     <h3>Special Packages</h3>
                                     <p>Complete beauty transformation packages</p>
                                     <ul class="service-features">
                                         <li><i class="fas fa-check"></i> Bridal Packages</li>
                                         <li><i class="fas fa-check"></i> Party Packages</li>
                                         <li><i class="fas fa-check"></i> Premium Packages</li>
                                         <li><i class="fas fa-check"></i> Custom Packages</li>
                                     </ul>
                                     <div class="service-price">
                                         <span class="price-label">Starting from</span>
                                         <span class="price-amount">₹1,999</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                    <!-- Dynamic Services Section -->
                    <?php if($categories->count() > 0): ?>
                    <div class="glorya-service-category mb-80">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="category-header text-center mb-40">
                                <h3><i class="fas fa-spa"></i> <?php echo e($category->name); ?></h3>
                                <p><?php echo e($category->description ?? 'Premium ' . $category->name . ' services for your beauty needs'); ?></p>
                            </div>
                            
                            <?php if($category->services && $category->services->count() > 0): ?>
                            <div class="row">
                                <?php $__currentLoopData = $category->services->groupBy('subcategory'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory => $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-12">
                                    <div class="service-subcategory mb-40">
                                        <h4 class="subcategory-title"><?php echo e($subcategory ?: 'General Services'); ?></h4>
                                        
                                        <div class="row">
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-12 col-sm-6 col-lg-4 mb-30">
                                                <div class="service-card">
                                                    <?php if($service->image): ?>
                                                    <img src="<?php echo e(asset('storage/' . $service->image)); ?>"
                                                        style="height:350px; width: 100%; object-fit: cover;"
                                                        alt="<?php echo e($service->name); ?>">
                                                   <?php endif; ?>                                                    <div class="service-header">
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <div>
                                                                <h5><?php echo e(strtoupper($service->name)); ?></h5>
                                                                <div class="price-info">
                                                                    <?php if($service->original_price && $service->original_price > $service->final_price): ?>
                                                                    <span class="original-price">₹<?php echo e(number_format($service->original_price, 0)); ?></span>
                                                                    <span class="discount"><?php echo e(round((($service->original_price - $service->final_price) / $service->original_price * 100))); ?>% OFF</span>
                                                                    <?php endif; ?>
                                                                    
                                                                    <span class="final-price">₹<?php echo e(number_format($service->final_price, 0)); ?></span>
                                                                    <?php if($service->duration): ?>
                                                                    <span class="time">Time - <?php echo e($service->duration); ?> Min</span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-sm btn-outline-info toggle-service-details" 
                                                                    onclick="toggleServiceDetails('<?php echo e(str_replace(' ', '-', strtolower($service->name)) . '-' . $service->id); ?>')">
                                                                <i class="fas fa-chevron-down" id="arrow-<?php echo e(str_replace(' ', '-', strtolower($service->name)) . '-' . $service->id); ?>"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="service-details collapse" id="details-<?php echo e(str_replace(' ', '-', strtolower($service->name)) . '-' . $service->id); ?>">
                                                        <p><?php echo $service->description; ?></p>
                                                        
                                                        <p><?php echo $service->short_description; ?></p>

                                                    </div>
                                                    <div class="service-action mt-3">
                                                        <button class="btn btn-add-to-cart" 
                                                                onclick="addToCart('<?php echo e($service->name); ?>', <?php echo e($service->final_price); ?>, '<?php echo e($service->image ? asset('storage/' . $service->image) : asset('images/services/default.jpg')); ?>', '<?php echo e($service->duration ?? '45'); ?> Min', '<?php echo e($category->name); ?>')">
                                                            <i class="fas fa-shopping-cart"></i> Add to Cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php else: ?>
                            <div class="text-center mt-50">
                                <p class="text-muted">No services available in this category yet.</p>
                            </div>
                            <?php endif; ?>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <div class="text-center mt-100">
                        <h3>No Services Available</h3>
                        <p class="text-muted">Check back soon for our amazing beauty services!</p>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
            <!-- glorya-services-area-end -->
            
            
         
            
                
<?php $__env->stopSection(); ?>


<script>
// Cart functionality
window.addToCart = function(serviceName, servicePrice, serviceImage, serviceTime, serviceCategory, buttonElement) {
    console.log('Adding to cart:', serviceName, servicePrice, serviceImage, serviceTime, serviceCategory);
    
    $.ajax({
        url: '<?php echo e(route("cart.add")); ?>',
        type: 'POST',
        data: {
            '_token': '<?php echo e(csrf_token()); ?>',
            'service_name': serviceName,
            'service_price': servicePrice,
            'service_image': serviceImage,
            'service_time': serviceTime,
            'service_category': serviceCategory
        },
        success: function(response) {
            if (response.success) {
                // Update cart count
                updateCartCount(response.cart_count);
                
                // Show appropriate message based on user type
                let message = response.message;
                if (response.is_guest) {
                    message += ' Please register or login to checkout.';
                }
                showNotification(message, 'success');
                
                // Change button temporarily
                if (buttonElement) {
                    const originalText = buttonElement.innerHTML;
                    buttonElement.innerHTML = '<i class="fas fa-check"></i> Added!';
                    buttonElement.disabled = true;
                    
                    // Reset button after 2 seconds
                    setTimeout(function() {
                        buttonElement.innerHTML = originalText;
                        buttonElement.disabled = false;
                    }, 2000);
                }
            } else {
                showNotification(response.message, 'error');
            }
        },
        error: function(xhr) {
            let errorMessage = 'Error adding to cart. Please try again.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            } else if (xhr.responseText) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.message) {
                        errorMessage = response.message;
                    }
                } catch (e) {
                    // Keep default error message
                }
            }
            showNotification(errorMessage, 'error');
        }
    });
};

window.updateCartCount = function(count) {
    $('.cart-count').text(count);
    if (count > 0) {
        $('.cart-count').show();
    } else {
        $('.cart-count').hide();
    }
};

window.showNotification = function(message, type) {
    var notification = $('<div class="cart-notification cart-notification-' + type + '">' + message + '</div>');
    $('body').append(notification);
    
    setTimeout(function() {
        notification.fadeOut('slow', function() {
            $(this).remove();
        });
    }, 3000);
};

// Toggle service details collapse
window.toggleServiceDetails = function(serviceId) {
    const detailsElement = document.getElementById('details-' + serviceId);
    const arrowElement = document.getElementById('arrow-' + serviceId);
    
    if (detailsElement) {
        const isCollapsed = detailsElement.classList.contains('show');
        
        if (isCollapsed) {
            // Collapse
            detailsElement.classList.remove('show');
            arrowElement.classList.remove('fa-chevron-up');
            arrowElement.classList.add('fa-chevron-down');
        } else {
            // Expand
            detailsElement.classList.add('show');
            arrowElement.classList.remove('fa-chevron-down');
            arrowElement.classList.add('fa-chevron-up');
        }
    }
};

// Load cart count on page load (works for both guests and authenticated users)
$.get('<?php echo e(route("cart.count")); ?>', function(response) {
    updateCartCount(response.count);
});
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/frontend/services.blade.php ENDPATH**/ ?>