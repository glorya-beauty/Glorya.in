

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
</style>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to Glorya Beauty</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login')); ?>" id="loginForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="login_email">Email Address</label>
                        <input type="email" class="form-control" id="login_email" name="email" 
                               value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password</label>
                        <input type="password" class="form-control" id="login_password" name="password" required>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn ss-btn active btn-block">Login</button>
                    <div class="text-center mt-3">
                        <p>Don't have an account? <a href="#" onclick="showRegisterModal();">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register for Glorya Beauty</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('register')); ?>" id="registerForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="register_name">Full Name</label>
                        <input type="text" class="form-control" id="register_name" name="name" 
                               value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="register_email">Email Address</label>
                        <input type="email" class="form-control" id="register_email" name="email" 
                               value="<?php echo e(old('email')); ?>" required autocomplete="email">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="register_password">Password</label>
                        <input type="password" class="form-control" id="register_password" name="password" required>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="register_password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="register_password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn ss-btn active btn-block">Register</button>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="#" onclick="showLoginModal();">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
                                    <h2>Services</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pricing</li>
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
                     
                     <!-- Service Categories with Images -->
                     <div class="row mb-60">
                        <!-- Skin Care Card -->
                         <div class="col-lg-4 col-md-6 mb-30">
                             <div class="service-category-card">
                                 <div class="service-image" style ="height:350px;">
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
                                         <li><i class="fas fa-check"></i> De-tan</li>
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
                                  
                                           <div class="service-icon">
                                            <div class="service-overlay">
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
                                 <div class="service-image" style ="height:350px;">
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
                     
                     
                    <!-- Detailed Services Section -->
                    <div class="glorya-service-category mb-80">
                       
                           <!-- Skin Care & Waxing Services -->
                    <div class="glorya-service-category mb-80">
                        <div class="category-header text-center mb-40">
                            <h3><i class="fas fa-spa"></i> Skin Care & Waxing Services</h3>
                            <p>Complete skincare treatments and professional waxing services for smooth, glowing skin</p>
                        </div>
                        
                        <div class="row">
                            <!-- Manicure Services -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Manicure Services</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <div class="service-card detailed">
                                                <div class="service-header">
                                                    <h5>MANICURE</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹856</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹599</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>"Get soft, beautiful hands at home with our professional manicure services. We provide complete nail care including cleaning, shaping, scrub, massage, and polish – all in the comfort of your home. Hygienic, relaxing, and perfect for self-care."</p>
                                                    
                                                    <h6>Benefits of Manicure:</h6>
                                                    <ul>
                                                        <li>Clean & healthy nails</li>
                                                        <li>Soft, smooth hands</li>
                                                        <li>Stress relief</li>
                                                        <li>Improves appearance</li>
                                                        <li>Boosts confidence</li>
                                                    </ul>
                                                    
                                                    <h6>How it works:</h6>
                                                    <ol>
                                                        <li><strong>Sanitization</strong> - Clean hands (client + beautician), Use sanitizer / disinfect tools</li>
                                                        <li><strong>Nail Shaping</strong> - Trim nails if needed, Shape using nail filer (round, square, almond)</li>
                                                        <li><strong>Cuticle Care</strong> - Apply cuticle cream, Gently push back cuticles, Remove dead cuticle (if required)</li>
                                                        <li><strong>Soaking</strong> - Soak hands in warm water + shampoo/salt (5–10 mins), Softens skin and cuticles</li>
                                                        <li><strong>Scrubbing</strong> - Apply hand scrub, Removes dead skin, Focus on fingers & knuckles</li>
                                                        <li><strong>Massage</strong> - Use massage cream or lotion, Relaxing hand massage (5–10 mins), Improves blood circulation</li>
                                                    </ol>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('MANICURE', 599, 'images/services/mn.jpg', '45 Min', 'Manicure Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Pedicure Services -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Pedicure Services</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/rg.jpg')); ?>" style="height:350px;" alt="Regular / Basic Pedicure">
                                                <div class="service-header">
                                                    <h5>REGULAR / BASIC PEDICURE</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,284</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹899</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <h6>Benefits of Pedicure:</h6>
                                                    <ul>
                                                        <li>Keeps feet clean & healthy</li>
                                                        <li>Removes dead skin buildup</li>
                                                        <li>Softens rough heels</li>
                                                        <li>Improves blood circulation</li>
                                                        <li>Gives a neat, polished look</li>
                                                    </ul>
                                                    
                                                    <h6>How it works:</h6>
                                                    <ul>
                                                        <li>Foot cleansing & warm water soak</li>
                                                        <li>Nail trimming & shaping</li>
                                                        <li>Cuticle cleaning</li>
                                                        <li>Dead skin removal (light)</li>
                                                        <li>Foot scrub exfoliation</li>
                                                        <li>Relaxing foot massage</li>
                                                        <li>Nail polish application</li>
                                                    </ul>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('REGULAR / BASIC PEDICURE', 899, 'images/services/rg.jpg', '45 Min', 'Pedicure Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/rp.jpg')); ?>" style="height:350px;" alt="Raaga / Premium Pedicure">
                                                <div class="service-header">
                                                    <h5>RAAGA / PREMIUM PEDICURE</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹2,141</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,499</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <h6>Benefits of Raaga / Premium Pedicure:</h6>
                                                    <ul>
                                                        <li>Deep hydration & nourishment</li>
                                                        <li>Helps reduce tan and dullness</li>
                                                        <li>Softens rough & cracked heels</li>
                                                        <li>Relieves stress & foot fatigue</li>
                                                        <li>Improves blood circulation</li>
                                                        <li>Gives smooth, glowing, well-groomed feet</li>
                                                    </ul>
                                                    
                                                    <h6>How it works:</h6>
                                                    <ul>
                                                        <li>Premium foot soak (with Raaga products)</li>
                                                        <li>Nail trimming & shaping</li>
                                                        <li>Advanced cuticle care</li>
                                                        <li>Deep exfoliation (tan & dead skin removal)</li>
                                                        <li>Crack heel / rough skin care (light treatment)</li>
                                                        <li>Extended relaxing foot massage</li>
                                                        <li>Nourishing foot mask</li>
                                                        <li>Hot towel therapy</li>
                                                        <li>Nail polish application</li>
                                                    </ul>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('RAAGA / PREMIUM PEDICURE', 1499, 'images/services/rp.jpg', '45 Min', 'Pedicure Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/op.jpg')); ?>" style="height:350px;" alt="O3+ Pedicure">
                                                <div class="service-header">
                                                    <h5>O3+ Pedicure</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹2,284</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,599</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <h6>Benefits O3+ Pedicure:</h6>
                                                    <ul>
                                                        <li>Helps remove tan & dullness</li>
                                                        <li>Brightens and evens out skin tone</li>
                                                        <li>Deeply hydrates and nourishes skin</li>
                                                        <li>Softens rough and dry feet</li>
                                                        <li>Relieves stress & fatigue</li>
                                                        <li>Leaves feet smooth, glowing & refreshed</li>
                                                    </ul>
                                                    
                                                    <h6>How it works:</h6>
                                                    <ul>
                                                        <li>O3+ cleansing foot soak</li>
                                                        <li>Nail trimming & shaping</li>
                                                        <li>Cuticle cleaning</li>
                                                        <li>Dead skin removal (light)</li>
                                                        <li>Foot scrub exfoliation</li>
                                                        <li>Relaxing foot massage</li>
                                                        <li>Nail polish application</li>
                                                    </ul>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('O3+ Pedicure', 1599, 'images/services/op.jpg', '45 Min', 'Pedicure Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Waxing Services -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Waxing & Threading Services</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/ro.png')); ?>" style="height:350px;" alt="Roll in Waxing">
                                                <div class="service-header">
                                                    <h5>Roll on Waxing (Full Arms, Legs & Underarms)</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,284</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹899</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <h6>Benefits Roll on Waxing:</h6>
                                                    <ul>
                                                        <li>Hygienic & single-use with no risk of burns</li>
                                                        <li>Two wax types for you to pick from: Rica or white chocolate</li>
                                                    </ul>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Roll on Waxing (Full Arms, Legs & Underarms)', 899, 'images/services/ro.png', '45 Min', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/sp.jpg')); ?>" style="height:350px;" alt="Spatula Waxing">
                                                <div class="service-header">
                                                    <h5>Spatula Waxing (Full Arms, Legs & Underarms)</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,141</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹799</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <h6>Benefits Spatula Waxing:</h6>
                                                    <ul>
                                                        <li>Painless & irritation-free removal</li>
                                                        <li>Three wax types for you to pick from: Rica Aloe vera (liposoluble wax), honey nature (white chocolate) & honey cold wax</li>
                                                    </ul>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Spatula Waxing (Full Arms, Legs & Underarms)', 799, 'images/services/sp.jpg', '45 Min', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/bi.jpg')); ?>" style="height:350px;" alt="Rica Brazilian Stripless Bikini Waxing">
                                                <div class="service-header">
                                                    <h5>Rica Brazilian Stripless Bikini Waxing</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,713</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <h6>Benefits Rica Brazilian Stripless Bikini Waxing:</h6>
                                                    <ul>
                                                        <li>Painless peel-off wax covering full pelvic area (buttocks not included)</li>
                                                        <li>Intimate waxing in the privacy of your home</li>
                                                    </ul>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Rica Brazilian Stripless Bikini Waxing', 1199, 'images/services/bi.jpg', '45 Min', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/fa.jpg')); ?>" style="height:350px;" alt="Rica Brazilian Stripless Bikini Waxing">
                                                <div class="service-header">
                                                    <h6>Full Arms/Underarms Waxing (Normal)</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹570</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹399</span>
                                                        <span class="time">Time - 30 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Service: Bikini/bikini line waxing is not included</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Full Arms/Underarms Waxing (Normal)', 399, 'images/services/fa.jpg', '30 Min', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/fl.jpg')); ?>" style="height:350px;" alt="Full Leg Waxing">
                                                <div class="service-header">
                                                    <h6>Full Leg Waxing (Normal)</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹570</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹399</span>
                                                        <span class="time">Time - 35 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Service: Bikini/bikini line waxing is not included</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Full Leg Waxing (Normal)', 399, 'images/services/fl.jpg', '35 Min', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/fs.jpg')); ?>" style="height:350px;" alt="Full Body Waxing">
                                                <div class="service-header">
                                                    <h6>Full Body Waxing</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,427</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹999</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Covers full arms, full legs, underarms, stomach & back</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Full Body Waxing', 999, 'images/services/fs.jpg', '45 Min', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                 <img src="<?php echo e(asset('images/services/hle.jpg')); ?>" style="height:350px;" alt="Full Body Waxing">
                                                <div class="service-header">
                                                    <h6>Half Legs Waxing</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹241</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹169</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Waxing covers area from toe to knee</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Half Legs Waxing', 169, 'images/services/hle.jpg', 'Time - N/A', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                             <img src="<?php echo e(asset('images/services/bkw.jpg')); ?>" style="height:350px;" alt="Full Body Waxing">    
                                            <div class="service-header">
                                                    <h6>Bikini Waxing</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹999</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹699</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Covers full pelvic area (buttocks not included)</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Bikini Waxing', 699, 'images/services/bkw.jpg', 'Time - N/A', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                 <img src="<?php echo e(asset('images/services/ard.jpg')); ?>" style="height:350px;" alt="Full Body Waxing">
                                                <div class="service-header">
                                                    <h6>Underarms Waxing</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹56</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹39</span>
                                                    </div>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Underarms Waxing', 39, 'images/services/ard.jpg', 'Time - N/A', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                 <img src="<?php echo e(asset('images/services/sto.jpg')); ?>" style="height:350px;" alt="Full Body Waxing">
                                                <div class="service-header">
                                                    <h6>Stomach Waxing</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹356</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹249</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Covers the area from below the bust to the pelvis</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Stomach Waxing', 249, 'images/services/sto.jpg', 'Time - N/A', 'Waxing & Threading Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Facial Services -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Facial Services</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/kf.jpg')); ?>" style="height:350px;" alt="Korean Glass Skin Facial">
                                                <div class="service-header">
                                                    <h5>Korean Glass skin Facial</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,713</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 hr 20 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Delivers long-lasting hydration for a dewy, glass-skin glow. Suitable for normal to dry skin.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Korean Glass skin Facial', 1199, 'images/services/kf.jpg', '1 hr 20 mins', 'Facial Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/ar.jpg')); ?>" style="height:350px;" alt="Aroma Magic Instant Glow Facial">
                                                <div class="service-header">
                                                    <h5>Aroma Magic Instant Glow Facial</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,141</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹799</span>
                                                        <span class="time">Time - 1 hr 10 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Refreshes tired skin & brings back a natural glow. Suitable for combination skin.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Aroma Magic Instant Glow Facial', 799, 'images/services/ar.jpg', '1 hr 10 mins', 'Facial Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/o3f.jpg')); ?>" style="height:350px;" alt="O3+ Shine & Glow Facial">
                                                <div class="service-header">
                                                    <h5>O3+ Shine & Glow Facial</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹2,284</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,299</span>
                                                        <span class="time">Time - 1 hr 20 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Reduces hyperpigmentation to even out skin tone. Suitable for normal to oily skin.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('O3+ Shine & Glow Facial', 1299, 'images/services/o3f.jpg', '1 hr 20 mins', 'Facial Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/arf.jpg')); ?>" style="height:350px;" alt="Sara Lightening Glow Facial">
                                                <div class="service-header">
                                                    <h5>Sara Lightening Glow Facial</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,213</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹849</span>
                                                        <span class="time">Time - 1 hr 20 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Boosts hydration overall skin clarity. Suitable for combination skin.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Sara Lightening Glow Facial', 849, 'images/services/arf.jpg', '1 hr 20 mins', 'Facial Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/yf.jpg')); ?>" style="height:350px;" alt="O3+ Feel Youthful Facial">
                                                <div class="service-header">
                                                    <h5>O3+ Feel Youthful Facial</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,713</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 hr 20 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Restores moisture to keep skin soft, supple & youthful. Suitable for all skin types.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('O3+ Feel Youthful Facial', 1199, 'images/services/yf.jpg', '1 hr 20 mins', 'Facial Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/bp.jpg')); ?>" style="height:350px;" alt="O3+ Feel Youthful Facial">
                                                
                                                <div class="service-header">
                                                    <h5>O3+ Power Brightening Facial</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹2,284</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,599</span>
                                                        <span class="time">Time - 1 hr 30 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Fades spots & refines texture for a clearer skin. Suitable for normal to oily skin.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('O3+ Power Brightening Facial', 1599, 'images/services/bp.jpg', '1 hr 30 mins', 'Facial Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/wf.jpg')); ?>" style="height:350px;" alt="O3+ Feel Youthful Facial">
                                                
                                                <div class="service-header">
                                                    <h5>Firming Wine Glow Facial</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,284</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹899</span>
                                                        <span class="time">Time - 1 hr 20 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Tightens the skin & boosts elasticity for a firmer look. Suitable for normal to dry skin.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Firming Wine Glow Facial', 899, 'images/services/wf.jpg', '1 hr 20 mins', 'Facial Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/krf.jpg')); ?>" style="height:350px;" alt="O3+ Feel Youthful Facial">
                                                
                                                <div class="service-header">
                                                    <h5>Korean Glass Skin Facial</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹2,570</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,799</span>
                                                        <span class="time">Time - 1hr 30 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Boosts blood circulation & lymphatic drainage, reducing puffiness. Lifts jawline and cheek area with upward gliding, similar to yoga's toning movement.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Korean Glass Skin Facial', 1799, 'images/services/krf.jpg', '1hr 30 mins', 'Facial Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Bridal & Premium Facials -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Bridal & Premium Facials</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/kff.jpg')); ?>" style="height:350px;" alt="O3+ Bridal Facial Kit">
                                                <div class="service-header">
                                                    <h5>O3+ Bridal Facial Kit Vitamin C Glowing Skin Facial</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹3,284</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹2,299</span>
                                                        <span class="time">Time - 1 hr 40 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Open pores, rough texture skin uneven tone</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('O3+ Bridal Facial Kit Vitamin C Glowing Skin Facial', 2299, 'images/services/kff.jpg', '1 hr 40 mins', 'Bridal & Premium Facials')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/ju.jpg')); ?>" style="height:350px;" alt="O3+ Professional Whitening Facial Kit">
                                                <div class="service-header">
                                                    <h5>O3+ Professional Whitening Facial Kit</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,284</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹899</span>
                                                        <span class="time">Time - 1 hr 10 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>All skin type</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('O3+ Professional Whitening Facial Kit', 899, 'images/services/ju.jpg', '1 hr 10 mins', 'Bridal & Premium Facials')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/srf.jpg')); ?>" style="height:350px;" alt="Sara Gold Facial Kit">
                                                <div class="service-header">
                                                    <h5>Sara Gold Facial Kit For Radiance & Shine Glow For All Skin Types 43gm</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,641</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,149</span>
                                                        <span class="time">Time - 1 hr</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Brighter Complexion & Anti-aging. All skin types</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Sara Gold Facial Kit For Radiance & Shine Glow For All Skin Types 43gm', 1149, 'images/services/srf.jpg', '1 hr', 'Bridal & Premium Facials')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/dif.jpg')); ?>" style="height:350px;" alt="Pakdee Diamond Glass Shine Facial Kit">
                                                <div class="service-header">
                                                    <h5>Pakdee DIAMOND GLASS SHINE FACIAL KIT Radiant Diamond</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,599</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 hr 10 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Reduces fine lines and wrinkles, detoxify and purify skin, helps lighten pigmentation dark spots & blemishes, instant Glow and glass like shine to skin. All skin types</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Pakdee DIAMOND GLASS SHINE FACIAL KIT Radiant Diamond', 1199, 'images/services/dif.jpg', '1 hr 10 mins', 'Bridal & Premium Facials')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/gh.jpg')); ?>" style="height:350px;" alt="Sara Hydra Aqua Bomb Facial Kit">
                                                <div class="service-header">
                                                    <h5>SARA Hydra Aqua Bomb Facial Kit For Skin Brightening With Hyaluronic & Tea Tree</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,999</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,549</span>
                                                        <span class="time">Time - 1 hr 30 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>All skin types</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('SARA Hydra Aqua Bomb Facial Kit For Skin Brightening With Hyaluronic & Tea Tree', 1549, 'images/services/gh.jpg', '1 hr 30 mins', 'Bridal & Premium Facials')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Clean-up Services -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Clean-up Services</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/cleanup.jpeg')); ?>" style="height:250px;" alt="Sara Fruit Cleanup">
                                                <div class="service-header">
                                                    <h5>Sara Fruit Cleanup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹699</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹549</span>
                                                        <span class="time">Time - 45 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Provides antioxidant protection to counter pollution & UV effects. Suitable for all skin type.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Sara Fruit Cleanup', 549, 'images/services/cleanup.jpeg', '45 mins', 'Clean-up Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/sk.jpeg')); ?>" style="height:250px;" alt="O3+ Tan Clear Cleanup">
                                                <div class="service-header">
                                                    <h5>O3+ Tan Clear Cleanup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹899</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹699</span>
                                                        <span class="time">Time - 45 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Targets tan & dullness for a nourished looking skin. Suitable for all skin types.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('O3+ Tan Clear Cleanup', 699, 'images/services/sk.jpeg', '45 mins', 'Clean-up Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/pin.jpg')); ?>" style="height:250px;" alt="03 professional seaweed cleanup">
                                                <div class="service-header">
                                                    <h5>03 professional seaweed cleanup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹759</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹589</span>
                                                        <span class="time">Time - 45 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Relieves dryness & dullness for a nourished looking skin. Suitable for all skin types.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('03 professional seaweed Cleanup', 589, 'images/services/pin.jpg', '45 mins', 'Clean-up Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Bleach Services -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Bleach Services</h4>
                                    <p>Professional Bleach to Helps even out Skin Tone, Reduce Tan & Dark Spots</p>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/fleg.jpg')); ?>" style="height:350px;" alt="Full Legs Bleach">
                                                <div class="service-header">
                                                    <h6>Full Legs</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹599</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹599</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Professional leg bleaching treatment for flawless skin tone. Effectively lightens dark spots and uneven pigmentation, leaving your legs smooth, bright, and perfectly uniform.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Full Legs Bleach', 599, 'images/services/fleg.jpg', 'Time - N/A', 'Bleach Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/fbl.jpg')); ?>" style="height:350px;" alt="Full Body Bleach">
                                                <div class="service-header">
                                                    <h6>Full Body</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,449</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,099</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Complete body bleaching treatment from neck to feet. Our advanced formula safely lightens overall skin tone, reduces dark spots, and provides a uniform, radiant complexion.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Full Body Bleach', 1099, 'images/services/fbl.jpg', 'Time - N/A', 'Bleach Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/abl.jpg')); ?>" style="height:350px;" alt="Full Arms Bleach">
                                                <div class="service-header">
                                                    <h6>Full Arms</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹449</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹349</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Targeted arm bleaching for even skin tone. Removes discoloration and dark patches, leaving your arms smooth, bright, and perfectly matched to your desired complexion.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Full Arms Bleach', 349, 'images/services/abl.jpg', 'Time - N/A', 'Bleach Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/cbl.jpg')); ?>" style="height:350px;" alt="Chest Bleach">
                                                <div class="service-header">
                                                    <h6>Chest</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹349</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹269</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Gentle chest bleaching for flawless décolletage. Perfect for evening out skin tone and reducing pigmentation, ideal for low-cut outfits and special occasions.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Chest Bleach', 269, 'images/services/cbl.jpg', 'Time - N/A', 'Bleach Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/fnb.jpg')); ?>" style="height:350px;" alt="Face & Neck Bleach">
                                                <div class="service-header">
                                                    <h6>Face & Neck</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹349</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹269</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Professional face and neck bleaching treatment. Safely lightens facial pigmentation, evens out skin tone, and reduces dark spots for a brighter, more radiant complexion.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Face & Neck Bleach', 269, 'images/services/fnb.jpg', 'Time - N/A', 'Bleach Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/bbl.jpg')); ?>" style="height:350px;" alt="Back Bleach">
                                                <div class="service-header">
                                                    <h6>Back</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹449</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹349</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Complete back bleaching treatment for uniform skin tone. Addresses stubborn pigmentation and dark spots across shoulders and back, perfect for backless outfits.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Back Bleach', 349, 'images/services/bbl.jpg', 'Time - N/A', 'Bleach Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- De-tan Services -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">De-tan Services</h4>
                                    <p>A targeted detan service to help reduce pigmentation, tan & dark spots</p>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/sk.jpeg')); ?>" style="height:350px"alt="Face & Neck De-tan">
                                                <div class="service-header">
                                                    <h6>Face & Neck</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹399</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹309</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Specialized de-tan treatment for face and neck area. Our gentle yet effective formula removes sun damage and uneven pigmentation, revealing brighter, more even-toned skin with a natural glow.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Face & Neck De-tan', 309, 'images/services/sk.jpeg', 'Time - N/A', 'De-tan Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/fam.jpg')); ?>" style="height:350px;" alt="Full Arms De-tan">
                                                <div class="service-header">
                                                    <h6>Full Arms</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹399</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹309</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Complete arm de-tan treatment from shoulders to wrists. Perfect for removing tan lines and achieving uniform skin tone, leaving your arms smooth, bright, and evenly colored.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Full Arms De-tan', 309, 'images/services/fam.jpg', 'Time - N/A', 'De-tan Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/cdt.jpg')); ?>" style="height:350px;" alt="Chest De-tan">
                                                <div class="service-header">
                                                    <h6>Chest</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹449</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹349</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Targeted chest de-tan treatment to address stubborn pigmentation. Ideal for those who wear low-cut outfits, this service evens out skin tone and reduces discoloration for a flawless décolletage.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Chest De-tan', 349, 'images/services/cdt.jpg', 'Time - N/A', 'De-tan Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/flt.jpg')); ?>" style="height:350px;" alt="Full Legs De-tan">
                                                <div class="service-header">
                                                    <h6>Full Legs</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹599</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹449</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Comprehensive leg de-tan from thighs to ankles. Removes stubborn tan lines and evens out skin tone, perfect for achieving smooth, uniform legs for shorts and skirts.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Full Legs De-tan', 449, 'images/services/flt.jpg', 'Time - N/A', 'De-tan Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/bt.jpg')); ?>" style="height:350px;" alt="Back De-tan">
                                                <div class="service-header">
                                                    <h6>Back</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹449</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹349</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Complete back de-tan treatment for even skin tone. Addresses stubborn tan and pigmentation across shoulders and back, perfect for backless outfits and swimwear.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Back De-tan', 349, 'images/services/bt.jpg', 'Time - N/A', 'De-tan Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/fbt.jpg')); ?>" style="height:350px;" alt="Full Body De-tan">
                                                <div class="service-header">
                                                    <h6>Full Body</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,599</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Ultimate full body de-tan experience. Comprehensive treatment from neck to feet that removes all traces of tan, evens out skin tone, and leaves your entire body glowing and uniform.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Full Body De-tan', 1199, 'images/services/fbt.jpg', 'Time - N/A', 'De-tan Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Special Pedicure -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Special Pedicure</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-30">
                                            <div class="service-card">
                                                                                            <img src="<?php echo e(asset('images/services/rcp.jpg')); ?>" style="height:350px;" alt="Full Body De-tan">    
                                            <div class="service-header">
                                                    <h5>Rose Crystal Pedicure</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹759</span>
                                                        <span class="discount">30% OFF</span>
                                                        <span class="final-price">₹589</span>
                                                        <span class="time">Time - 1 hr 30 mins</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Olive oil & jojoba oil provide intense & long lasting hydration. Includes crystal soak treatment with foot, shoulder & palm massage.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Rose Crystal Pedicure', 589, 'images/services/rcp.jpg', '1 hr 30 mins', 'Special Pedicure')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="service-cards-grid mb-60">
                                <div class="row">
                                    <!-- Service Card 1 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/be.jpeg')); ?>">
                                            </div>
                                            <div class="service-content">
                                                <h4>Bleach</h4>
                                                <div class="pricing-info">
                                                   full legs	
Price - ₹599	
full body	
Price - ₹1,449	
full arms	
Price - ₹449	
chest	
Price - ₹349	
face & neck 	
Price - ₹349	
back	
Price - ₹449	

                                                
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Bleach Services', 599, 'images/services/Bleach.jpeg', 'Time - N/A', 'Bleach Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 2 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/Manicure.jpeg')); ?>" alt="One-Side Open Style">
                                                
                                            </div>
                                            <div class="service-content">
                                                <h4>Manicure</h4>
                                                <div class="pricing-info">
                                                    Price - ₹779									
Discount Offer - 30%									
Final Price - ₹599									
Time - 45 Min									

                                                
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Manicure', 599, 'images/services/Manicure.jpeg', '45 Min', 'Manicure Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 3 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/regular.jpeg')); ?>" alt="Open Half-Tie Style">
                                                
                                            </div>
                                            <div class="service-content">
                                                <h4>Regular Basic Pedicure</h4>
                                                <div class="pricing-info">
                                                   Price - ₹1,169									
Discount Offer - 30%									
Final Price - ₹899									
Time - 45 Min									

                                    
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Regular Basic Pedicure', 899, 'images/services/regular.jpeg', '45 Min', 'Pedicure Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 4 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/reg1.jpeg')); ?>" alt="Hair Straightening">

                                            </div>
                                            <div class="service-content">
                                                <h4>Regular Premium Pedicure</h4>
                                                <div class="pricing-info">
                                                   Price - ₹1,949									
Discount Offer - 30%									
Final Price - ₹1,499									
Time - 45 Min									

                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Regular Premium Pedicure', 1499, 'images/services/reg1.jpeg', '45 Min', 'Pedicure Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 5 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/cleanup.jpeg')); ?>" alt="Curls & Waves">
                                            
                                            </div>
                                            <div class="service-content">
                                                <h4>Cleanup</h4>
                                                <div class="pricing-info">
                                                	Sara fruit cleanup :				
	Price - ₹699				
	Time - 45 mins				

                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Sara Fruit Cleanup', 699, 'images/services/cleanup.jpeg', '45 mins', 'Clean-up Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
</div>
              
                    
                    <!-- Hair Services -->
                    <div class="glorya-service-category mb-80">
                        <div class="category-header text-center mb-40">
                            <h3><i class="fas fa-cut"></i> Hair Services</h3>
                            <p>Professional hair styling and treatments</p>
                        </div>
                        
                        <div class="row">
                            <!-- Blow Dry Services -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Blow Dry Services</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-30">
                                            <div class="service-card detailed">
                                                <img src="<?php echo e(asset('images/services/sb.jpg')); ?>" style="height:350px;" alt="Straight & Smooth Blow Dry">
                                                <div class="service-header">
                                                    <h5>Straight & Smooth Blow Dry</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹399</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <h6>Service Process:</h6>
                                                    <ol>
                                                        <li><strong>Hair Consultation</strong> - Hair type analysis (dry, frizzy, damaged, normal), Understanding client preference (natural straight / sleek finish)</li>
                                                        <li><strong>Heat Protection Application</strong> - Professional heat protectant applied, Prevents damage from blow-drying tools</li>
                                                        <li><strong>Sectioning & Blow-Dry</strong> - Hair is divided into sections, Blow-dried using round/flat brush for smooth straight finish</li>
                                                        <li><strong>Straightening Finish (If Needed)</strong> - Light use of straightener for extra sleekness, Adds long-lasting smooth effect</li>
                                                        <li><strong>Serum & Finishing</strong> - Anti-frizz serum applied, Adds shine, smoothness, and polish</li>
                                                    </ol>
                                                    
                                                    <h6>After Care (Client Guidance):</h6>
                                                    <ul>
                                                        <li>Avoid tying hair tightly for a few hours</li>
                                                        <li>Keep hair away from moisture/sweat for longer-lasting results</li>
                                                        <li>Use a silk pillowcase to reduce frizz</li>
                                                        <li>Apply light serum if needed for shine</li>
                                                        <li>Professional blow-dry at home recommended</li>
                                                    </ul>
                                                    <p>sleek, smooth & straight hair with a professional blow-dry</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Straight & Smooth Blow Dry', 399, 'images/services/sb.jpg', '45 Min', 'Hair Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 mb-30">
                                            <div class="service-card detailed">
                                                <img src="<?php echo e(asset('images/services/co.jpg')); ?>" style="height:350px;" alt="In Curl / Out Curl Blow Dry">
                                                <div class="service-header">
                                                    <h5>In Curl / Out Curl Blow Dry</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹399</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <h6>Service Process:</h6>
                                                    <ol>
                                                        <li><strong>Hair Consultation</strong> - Hair type analysis (dry, frizzy, damaged, normal), Understanding client preference (natural straight / sleek finish)</li>
                                                        <li><strong>Heat Protection Application</strong> - Professional heat protectant applied, Prevents damage from blow-drying tools</li>
                                                        <li><strong>Sectioning & Blow-Dry</strong> - Hair is divided into sections, Blow-dried using round/flat brush for smooth finish</li>
                                                        <li><strong>Curling Technique</strong> - Professional curling iron used to create bouncy, defined curls or relaxed waves</li>
                                                        <li><strong>Straightening Finish (If Needed)</strong> - Light use of straightener for extra sleekness, Adds long-lasting smooth effect</li>
                                                        <li><strong>Serum & Finishing</strong> - Anti-frizz serum applied, Adds shine, smoothness, and polish</li>
                                                    </ol>
                                                    
                                                    <h6>After Care (Client Guidance):</h6>
                                                    <ul>
                                                        <li>Avoid tying hair tightly for a few hours</li>
                                                        <li>Keep hair away from moisture/sweat for longer-lasting results</li>
                                                        <li>Use a silk pillowcase to reduce frizz</li>
                                                        <li>Apply light serum if needed for shine</li>
                                                        <li>Professional blow-dry at home recommended</li>
                                                        <li>For curly hair: Use curl-enhancing products</li>
                                                        <li>For straight hair: Use anti-frizz products</li>
                                                    </ul>
                                                    <p>Voluminous, defined curls or relaxed waves with professional styling</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('In Curl / Out Curl Blow Dry', 399, 'images/services/co.jpg', '45 Min', 'Hair Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Advanced Hair Styling -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Advanced Hair Styling</h4>
                                    
                                    <div class="hairstyling-table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Service Type</th>
                                                        <th>Total Price</th>
                                                        <th>Discount</th>
                                                        <th>Discount Price</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Ponytail / Braid</td>
                                                        <td>₹1,125</td>
                                                        <td>25%</td>
                                                        <td>₹899</td>
                                                        <td>60 Min</td>
                                                    </tr>
                                                    <tr>
                                                        <td>One-Side Open Style</td>
                                                        <td>₹1,125</td>
                                                        <td>25%</td>
                                                        <td>₹899</td>
                                                        <td>60 Min</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Open Half-Tie Style</td>
                                                        <td>₹1,125</td>
                                                        <td>25%</td>
                                                        <td>₹899</td>
                                                        <td>60 Min</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hair Straightening</td>
                                                        <td>₹659</td>
                                                        <td>25%</td>
                                                        <td>₹549</td>
                                                        <td>45 Min</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Curls & Waves</td>
                                                        <td>₹659</td>
                                                        <td>25%</td>
                                                        <td>₹549</td>
                                                        <td>45 Min</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="service-process">
                                            <h6>Service Process:</h6>
                                            <ol>
                                                <li><strong>Equipment set-up</strong> - Sterilized tools, equipment, and products are prepared for your styling session.</li>
                                                <li><strong>Consultation</strong> - A consultation to understand your preferences and choose the perfect style.</li>
                                                <li><strong>Preparation</strong> - Schwarzkopf shine mousse and protectant serum are applied to prevent heat damage.</li>
                                                <li><strong>Hair styling</strong> - Your chosen style is crafted, followed by Schwarzkopf fixing spray to lock in the look.</li>
                                            </ol>
                                            
                                            <h6>Points to remember:</h6>
                                            <ul>
                                                <li>Hair wash not included in the service. Please ensure your hair and scalp are washed thoroughly before hand for best results.</li>
                                                <li>Accessories not included with the service.</li>
                                                <li>Hair extension not included with the service.</li>
                                                <li>Professional will carry the required hair accessories</li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Service Cards Grid -->
                    <div class="service-cards-grid mb-60">
                        <div class="row">
                            <!-- Service Card 1 -->
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="service-card">
                                    <div class="service-image" style="object-fit:inherit;height:350px;">
                                        <img src="<?php echo e(asset('images/services/ponytail.jpeg')); ?>" alt="Ponytail / Braid">
                                        
                                    </div>
                                    <div class="service-content">
                                        <h4>Ponytail / Braid</h4>
                                        <p>Professional ponytail and braid styling for any occasion</p>
                                        <div class="pricing-info">
                                            <span class="original-price">₹1,125</span>
                                            <span class="discounted-price">₹899</span>
                                            <span class="duration">60 Min</span>
                                        </div>
                                        <div class="service-action mt-3">
                                            <button class="btn btn-add-to-cart" 
                                                    onclick="addToCart('Ponytail / Braid', 899, 'images/services/ponytail.jpeg', '60 Min', 'Hair Services')">
                                                <i class="fas fa-shopping-cart"></i> Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             
                            <!-- Service Card 2 -->
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="service-card">
                                    <div class="service-image" style="object-fit:inherit;height:350px;">
                                        <img src="<?php echo e(asset('images/services/oneside-open.jpeg')); ?>" alt="One-Side Open Style">
                                        
                                    </div>
                                    <div class="service-content">
                                        <h4>One-Side Open Style</h4>
                                        <p>Elegant one-side open hairstyle for special events</p>
                                        <div class="pricing-info">
                                            <span class="original-price">₹1,125</span>
                                            <span class="discounted-price">₹899</span>
                                            <span class="duration">60 Min</span>
                                        </div>
                                        <div class="service-action mt-3">
                                            <button class="btn btn-add-to-cart" 
                                                    onclick="addToCart('One-Side Open Style', 899, 'images/services/oneside-open.jpeg', '60 Min', 'Hair Services')">
                                                <i class="fas fa-shopping-cart"></i> Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Service Card 3 -->
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="service-card">
                                    <div class="service-image" style="object-fit:inherit;height:350px;">
                                        <img src="<?php echo e(asset('images/services/half-tie.jpeg')); ?>" alt="Open Half-Tie Style">
                                        
                                    </div>
                                    <div class="service-content">
                                        <h4>Open Half-Tie Style</h4>
                                        <p>Stylish half-tie hairstyle for modern look</p>
                                        <div class="pricing-info">
                                            <span class="original-price">₹1,125</span>
                                            <span class="discounted-price">₹899</span>
                                            <span class="duration">60 Min</span>
                                        </div>
                                        <div class="service-action mt-3">
                                            <button class="btn btn-add-to-cart" 
                                                    onclick="addToCart('Open Half-Tie Style', 899, 'images/services/half-tie.jpeg', '60 Min', 'Hair Services')">
                                                <i class="fas fa-shopping-cart"></i> Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Service Card 4 -->
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="service-card">
                                    <div class="service-image" style="object-fit:inherit;height:350px;">
                                        <img src="<?php echo e(asset('images/services/straightening.jpeg')); ?>" alt="Hair Straightening">
                                        <div class="service-overlay">
                                            <span class="service-price-tag">₹549</span>
                                            <span class="discount-tag">25% OFF</span>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <h4>Hair Straightening</h4>
                                        <p>Professional hair straightening treatment</p>
                                        <div class="pricing-info">
                                            <span class="original-price">₹659</span>
                                            <span class="discounted-price">₹549</span>
                                            <span class="duration">45 Min</span>
                                        </div>
                                        <div class="service-action mt-3">
                                            <button class="btn btn-add-to-cart" 
                                                    onclick="addToCart('Hair Straightening', 549, 'images/services/straightening.jpeg', '45 Min', 'Hair Services')">
                                                <i class="fas fa-shopping-cart"></i> Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Service Card 5 -->
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="service-card">
                                    <div class="service-image" style="object-fit:inherit;height:350px;">
                                        <img src="<?php echo e(asset('images/services/curls-waves.jpeg')); ?>" alt="Curls & Waves">
                                        <div class="service-overlay">
                                            <span class="service-price-tag">₹549</span>
                                            <span class="discount-tag">25% OFF</span>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <h4>Curls & Waves</h4>
                                        <p>Beautiful curls and waves styling</p>
                                        <div class="pricing-info">
                                            <span class="original-price">₹659</span>
                                            <span class="discounted-price">₹549</span>
                                            <span class="duration">45 Min</span>
                                        </div>
                                        <div class="service-action mt-3">
                                            <button class="btn btn-add-to-cart" 
                                                    onclick="addToCart('Curls & Waves', 549, 'images/services/curls-waves.jpeg', '45 Min', 'Hair Services')">
                                                <i class="fas fa-shopping-cart"></i> Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                        </div>
                    </div>
               
                     
                        
                            <!-- Makeup Packages -->
                            <div class="category-header text-center mb-40">
                            <h3 class="text-center"><i class="fas fa-palette"></i> Makeup Services</h3>
                            <p>Professional makeup services for every occasion</p>
                        </div>
                      <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Makeup Packages</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/basic.jpeg')); ?>" style="height:350px;" alt="Basic Makeup Package">
                                                <div class="service-header">
                                                    <h5>Basic Makeup Package</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹2,399</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹1,999</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Includes basic makeup & basic hairstyling; suitable for daytime events and brunches.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Basic Makeup Package', 1999, 'images/services/basic.jpeg', '45 Min', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/hd.jpg')); ?>" style="height:350px;" alt="HD Makeup Package">
                                                <div class="service-header">
                                                    <h5>HD Makeup Package</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹3,599</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹2,999</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Includes HD makeup & advanced hairstyling for evening functions or photoshoots.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('HD Makeup Package', 2999, 'images/services/hd.jpg', '45 Min', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/lux.jpeg')); ?>" style="height:350px;" alt="Luxe Makeup Package">
                                                <div class="service-header">
                                                    <h5>Luxe Makeup Package</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹4,319</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹3,599</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Features luxury makeup & advanced hairstyling for weddings and festive gatherings.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Luxe Makeup Package', 3599, 'images/services/lux.jpeg', '45 Min', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/combo.jpg')); ?>" style="height:350px;" alt="Premium Makeup Combo">
                                                <div class="service-header">
                                                    <h5>Premium Makeup Combo</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹3,119</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹2,599</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Combines premium makeup services with specialized treatments for a complete glamour look.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Premium Makeup Combo', 2599, 'images/services/combo.jpg', '45 Min', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/bs.jpg')); ?>" style="height:350px;" alt="Basic Bridal Makeup">
                                                <div class="service-header">
                                                    <h5>Basic Bridal Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹8,399</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹6,999</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Includes hair styling, and saree draping</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Basic Bridal Makeup', 6999, 'images/services/bs.jpg', '45 Min', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/br.jpg')); ?>" style="height:350px;" alt="Premium Bridal Makeup">
                                                <div class="service-header">
                                                    <h5>Premium Bridal Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹9,599</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹7,999</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Includes eye lashes and advanced hair styling</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Premium Bridal Makeup', 7999, 'images/services/br.jpg', '45 Min', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/pk.jpg')); ?>" style="height:350px;" alt="Basic Party Makeup">
                                                <div class="service-header">
                                                    <h5>Basic Party Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,199</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹999</span>
                                                        <span class="time">Time - 45 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Base makeup and basic eye makeup; hair styling not included</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Basic Party Makeup', 999, 'images/services/pk.jpg', '45 Min', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Individual Services -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Individual Services</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/er.jpg')); ?>" style="height:350px;" alt="Basic Makeup (Light/Everyday)">
                                                <div class="service-header">
                                                    <h6>Basic Makeup (Light/Everyday)</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,559</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹1,299</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Light and natural makeup perfect for everyday wear, enhancing your features while maintaining a subtle look.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Basic Makeup (Light/Everyday)', 1299, 'images/services/er.jpg', 'Time - N/A', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/mat.jpg')); ?>" style="height:350px;" alt="HD Finish Makeup">
                                                <div class="service-header">
                                                    <h6>HD Finish Makeup</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹2,519</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹2,099</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>High-definition makeup that looks flawless on camera and in person, perfect for photoshoots and events.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('HD Finish Makeup', 2099, 'images/services/mat.jpg', 'Time - N/A', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/lu.jpg')); ?>" style="height:350px;" alt="Luxe Glam-up Makeup">
                                                <div class="service-header">
                                                    <h6>Luxe Glam-up Makeup</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹3,119</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹2,599</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Luxury makeup service with premium products and techniques for a glamorous, red-carpet ready look.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Luxe Glam-up Makeup', 2599, 'images/services/lu.jpg', 'Time - N/A', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/bha.jpg')); ?>" style="height:350px;" alt="Basic Hairstyling">
                                                <div class="service-header">
                                                    <h6>Basic Hairstyling</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹479</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹399</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Professional hair styling for everyday looks, including blow-dry and basic styling techniques.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Basic Hairstyling', 399, 'images/services/bha.jpg', 'Time - N/A', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/ahr.jpg')); ?>" style="height:350px;" alt="Advanced Hairstyling">
                                                <div class="service-header">
                                                    <h6>Advanced Hairstyling</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,079</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹899</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Complex hair styling techniques including updos, curls, and special occasion hairstyles.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Advanced Hairstyling', 899, 'images/services/ahr.jpg', 'Time - N/A', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/bsd.jpg')); ?>" style="height:350px;" alt="Basic Saree Draping">
                                                <div class="service-header">
                                                    <h6>Basic Saree Draping</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹359</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹299</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Traditional saree draping in classic styles, perfect for cultural events and formal occasions.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Basic Saree Draping', 299, 'images/services/bsd.jpg', 'Time - N/A', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card mini">
                                                <img src="<?php echo e(asset('images/services/dd.jpg')); ?>" style="height:350px;" alt="Advanced Saree/Dupatta Draping">
                                                <div class="service-header">
                                                    <h6>Advanced Saree/Dupatta Draping</h6>
                                                    <div class="price-info">
                                                        <span class="original-price">₹599</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹499</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Expert draping techniques for modern and traditional styles, including designer pleats and dupatta arrangements.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Advanced Saree/Dupatta Draping', 499, 'images/services/dd.jpg', 'Time - N/A', 'Makeup Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Eye Makeup -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Eye Makeup</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/be.jpg')); ?>" style="height:350px;" alt="Basic Eye Makeup">
                                                <div class="service-header">
                                                    <h5>Basic Eye Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹599</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹499</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Essential eye makeup application including eyeliner, mascara, and basic eyeshadow for a natural everyday look.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Basic Eye Makeup', 499, 'images/services/be.jpg', 'Time - N/A', 'Eye Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/se.jpg')); ?>" style="height:350px;" alt="Soft Glam Eye Makeup">
                                                <div class="service-header">
                                                    <h5>Soft Glam Eye Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹959</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹799</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Blending Eye Shadow, Liner, Mascara, Suitable Shimmer - For Birthday & Small Events</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Soft Glam Eye Makeup', 799, 'images/services/se.jpg', 'Time - N/A', 'Eye Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/sme.jpg')); ?>" style="height:350px;" alt="Smoky Eye Makeup">
                                                <div class="service-header">
                                                    <h5>Smoky Eye Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,199</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹999</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Black/Crown Smoky Finish with Blending and Highlighter - For Party Look (Most Demanded)</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Smoky Eye Makeup', 999, 'images/services/sme.jpg', 'Time - N/A', 'Eye Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/ce.jpg')); ?>" style="height:350px;" alt="Cut Crease Eye Makeup">
                                                <div class="service-header">
                                                    <h5>Cut Crease Eye Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,439</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Sharp Crease Definition + Shimmer Lead</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Cut Crease Eye Makeup', 1199, 'images/services/ce.jpg', 'Time - N/A', 'Eye Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/eg.jpg')); ?>" style="height:350px;" alt="Glitter Shimmer Eye Glam">
                                                <div class="service-header">
                                                    <h5>Glitter Shimmer Eye Glam</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,559</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹1,299</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Heavy Shimmer or Glitter Lead Finish - For Light Party & Wedding Function</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Glitter Shimmer Eye Glam', 1299, 'images/services/eg.jpg', 'Time - N/A', 'Eye Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/bey.jpg')); ?>" style="height:350px;" alt="Bridal Eye Makeup">
                                                <div class="service-header">
                                                    <h5>Bridal Eye Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹2,159</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹1,799</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Luxury Finish + Premium Lashes + Long Lasting Setting - For Bride who Already Have Base Stone</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Bridal Eye Makeup', 1799, 'images/services/bey.jpg', 'Time - N/A', 'Eye Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="eye-makeup-combo">
                                        <h5>EYE MAKEUP COMBO PACK</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="combo-item">
                                                    <h6>BASIC EYE MAKEUP</h6>
                                                    <span>₹499 TO ₹799</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="combo-item">
                                                    <h6>PARTY GLAM MAKEUP</h6>
                                                    <span>₹999 TO ₹1299</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="combo-item">
                                                    <h6>PREMIUM MAKEUP</h6>
                                                    <span>₹1799</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Bridal Makeup -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Bridal Makeup</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/pt.jpg')); ?>" style="height:350px;" alt="Party Makeup">
                                                <div class="service-header">
                                                    <h5>Party Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹2,639</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹2,199</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Perfect party makeup with flawless finish, ideal for evening events and celebrations.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Party Makeup', 2199, 'images/services/pt.jpg', 'Time - N/A', 'Bridal Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/hl.jpg')); ?>" style="height:350px;" alt="Haldi Ceremony Makeup">
                                                <div class="service-header">
                                                    <h5>Haldi Ceremony Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹6,719</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹5,599</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Traditional haldi ceremony makeup with natural, glowing look perfect for the auspicious occasion.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Haldi Ceremony Makeup', 5599, 'images/services/hl.jpg', 'Time - N/A', 'Bridal Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/rc.jpg')); ?>" style="height:350px;" alt="Reception Makeup">
                                                <div class="service-header">
                                                    <h5>Reception Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹5,999</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹4,999</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Elegant reception makeup with sophisticated finish for the grand wedding celebration.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Reception Makeup', 4999, 'images/services/rc.jpg', 'Time - N/A', 'Bridal Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/bm.jpg')); ?>" style="height:350px;" alt="HD Bridal Makeup">
                                                <div class="service-header">
                                                    <h5>HD Bridal Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹15,599</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹12,999</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>High-definition bridal makeup with flawless finish, perfect for photography and videography.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('HD Bridal Makeup', 12999, 'images/services/bm.jpg', 'Time - N/A', 'Bridal Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/el.jpg')); ?>" style="height:350px;" alt="Eyelash Extension">
                                                <div class="service-header">
                                                    <h5>Eyelash Extension</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,919</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹1,599</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Professional eyelash extensions for dramatic, beautiful eyes that last for weeks.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Eyelash Extension', 1599, 'images/services/el.jpg', 'Time - N/A', 'Bridal Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/nu.jpg')); ?>" style="height:350px;" alt="HD Nude Makeup">
                                                <div class="service-header">
                                                    <h5>HD Nude Makeup</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹9,599</span>
                                                        <span class="discount">20% OFF</span>
                                                        <span class="final-price">₹7,999</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Natural-looking HD nude makeup with subtle elegance for modern brides.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('HD Nude Makeup', 7999, 'images/services/nu.jpg', 'Time - N/A', 'Bridal Makeup')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <div class="service-cards-grid mb-60">
                                <div class="row">
                                    <!-- Service Card 1 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/basic.jpeg')); ?>">
                                            </div>
                                            <div class="service-content">
                                                <h4>Basics Makeup</h4>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹2,399/</span>
                                                    <span class="discounted-price">₹1,999</span>
                                                
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 2 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/haldi.jpeg')); ?>" alt="One-Side Open Style">
                                                
                                            </div>
                                            <div class="service-content">
                                                <h4>Haldi Ceremony Makeup</h4>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹6,719/</span>
                                                    <span class="discounted-price">₹5599</span>
                                                
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 3 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/lux.jpeg')); ?>" alt="Open Half-Tie Style">
                                                
                                            </div>
                                            <div class="service-content">
                                                <h4>Luxe Makeup</h4>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹4,319</span>
                                                    <span class="discounted-price">₹3,599</span>
                                    
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 4 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/smoky.jpeg')); ?>" alt="Hair Straightening">

                                            </div>
                                            <div class="service-content">
                                                <h4>Smoke Eye Makeup</h4>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹1,999</span>
                                                    <span class="discounted-price">₹999</span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 5 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/nude_mack.jpeg')); ?>" alt="Curls & Waves">
                                            
                                            </div>
                                            <div class="service-content">
                                                <h4>Hd Nude Makeup</h4>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹4,799</span>
                                                    <span class="discounted-price">₹3,999</span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                   
                    

                    <!-- Nail Services -->
                    <div class="glorya-service-category mb-80">
                        <div class="category-header text-center mb-40">
                            <h3><i class="fas fa-hand-sparkles"></i> Nail Services</h3>
                            <p>Professional nail art and care services with premium gel polish and stunning designs</p>
                        </div>
                        
                        <div class="row">
                            <!-- Gel Polish - Natural Nails -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">GEL POLISH - NATURAL NAILS</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/plain.jpg')); ?>" style="height:250px;" alt="Plain Gel Polish">
                                                <div class="service-header">
                                                    <h5>Plain</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹749</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹599</span>
                                                        <span class="time">Time - 60 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Achieve a flawless natural look with our plain gel polish service. Choose from 20+ stunning color options including nude shades, soft pastels, vintage tones, and vibrant hues. Our long-lasting formula provides chip-free wear for up to 3 weeks.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Plain Gel Polish', 599, 'images/services/plain.jpg', '60 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/matte.jpg')); ?>" style="height:250px;" alt="Matte Gel Polish">
                                                <div class="service-header">
                                                    <h5>Matte</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹749</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹599</span>
                                                        <span class="time">Time - 60 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Embrace the modern trend with our matte gel polish finish. This sophisticated non-shiny look creates a smooth, velvety appearance that's chic and contemporary. Perfect for those who prefer understated elegance with a fashion-forward edge.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Matte Gel Polish', 599, 'images/services/matte.jpg', '60 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/solid.jpg')); ?>" style="height:250px;" alt="Solid Multi Color">
                                                <div class="service-header">
                                                    <h5>Solid Multi Color</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹749</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹599</span>
                                                        <span class="time">Time - 60 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Express your creativity with our solid multi-color gel polish service. Mix and match different colors on each nail or choose complementary shades for a unique, personalized look. Perfect for those who love variety and want to make a colorful statement.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Solid Multi Color Gel Polish', 599, 'images/services/solid.jpg', '60 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="service-process">
                                        <h6>How it works:</h6>
                                        <ol>
                                            <li><strong>Pre-service setup</strong> - Setting up of a nail bar with a table, lamp & stool</li>
                                            <li><strong>Nail prep</strong> - Application of cuticle softener followed by cutting, filing, shaping & cleansing of nails</li>
                                            <li><strong>Acid-free primer application</strong> - Application of acid-free primer on the nails</li>
                                            <li><strong>Polish application</strong> - Base coat followed by the nail art design on all the nails</li>
                                            <li><strong>Curing</strong> - Curing of base coat and polish for 60 seconds each</li>
                                            <li><strong>Cuticle oil</strong> - No wipe top coat application, curing for 60 seconds and cuticle oil massage</li>
                                        </ol>
                                        
                                        <h6>Aftercare Guide:</h6>
                                        <div class="aftercare-tips">
                                            <div class="do-dont">
                                                <div class="do-section">
                                                    <h7>DO:</h7>
                                                    <ul>
                                                        <li>Moisturise your hands and cuticles regularly</li>
                                                        <li>Use acetone free remover for stains on gel polish</li>
                                                        <li>Always get a professional for removals</li>
                                                    </ul>
                                                </div>
                                                <div class="dont-section">
                                                    <h7>DON'T:</h7>
                                                    <ul>
                                                        <li>Use harsh cleaning products on your nails</li>
                                                        <li>Pick or peel the product off the nail bed</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- French Nails -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">FRENCH</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/frenchcl.jpg')); ?>" style="height:250px;" alt="Classic French">
                                                <div class="service-header">
                                                    <h5>Classic</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,125</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹899</span>
                                                        <span class="time">Time - 60 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Experience the timeless elegance of classic French manicure. This iconic design features natural pink base with pristine white tips, creating a sophisticated and clean look that never goes out of style and complements any outfit or occasion.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Classic French', 899, 'images/services/frenchcl.jpg', '60 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/vshape.jpg')); ?>" style="height:250px;" alt="V Shaped French">
                                                <div class="service-header">
                                                    <h5>V Shaped</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,125</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹899</span>
                                                        <span class="time">Time - 60 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Modernize your French manicure with our V-shaped design. This contemporary twist features angular white tips that create a bold, geometric look, adding edge and personality to the traditional French style for a fashion-forward appearance.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('V Shaped French', 899, 'images/services/vshape.jpg', '60 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/glitter.jpg')); ?>" style="height:250px;" alt="Glitter French">
                                                <div class="service-header">
                                                    <h5>Glitter</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,125</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹899</span>
                                                        <span class="time">Time - 60 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Add sparkle and glamour to your French manicure with glitter tips. This dazzling variation features shimmering glitter on the white tips, creating a festive and eye-catching look that's perfect for special occasions and adds a touch of celebration to your nails.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Glitter French', 899, 'images/services/glitter.jpg', '60 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="service-process">
                                        <h6>How it works:</h6>
                                        <ol>
                                            <li><strong>Pre-service setup</strong> - Setting up of a nail bar with a table, lamp & stool</li>
                                            <li><strong>Nail prep</strong> - Application of cuticle softener followed by cutting, filing, shaping & cleansing of nails</li>
                                            <li><strong>Acid-free primer application</strong> - Application of acid-free primer on the nails</li>
                                            <li><strong>Polish application</strong> - Base coat followed by the nail art design on all the nails</li>
                                            <li><strong>Curing</strong> - Curing of base coat and polish for 60 seconds each</li>
                                            <li><strong>Cuticle oil</strong> - No wipe top coat application, curing for 60 seconds and cuticle oil massage</li>
                                        </ol>
                                        
                                        <h6>Aftercare Guide:</h6>
                                        <div class="aftercare-tips">
                                            <div class="do-dont">
                                                <div class="do-section">
                                                    <h7>DO:</h7>
                                                    <ul>
                                                        <li>Moisturise your hands and cuticles regularly</li>
                                                        <li>Use acetone free remover for stains on gel polish</li>
                                                        <li>Always get a professional for removals</li>
                                                    </ul>
                                                </div>
                                                <div class="dont-section">
                                                    <h7>DON'T:</h7>
                                                    <ul>
                                                        <li>Use harsh cleaning products on your nails</li>
                                                        <li>Pick or peel the product off the nail bed</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Get Your Own Design -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">GET YOUR OWN DESIGN</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-30">
                                            <div class="service-card">
                                                <div class="service-header">
                                                    <h5>Custom Nail Art Design</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 hrs 10 min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <h6>Explore Designs:</h6>
                                                    <ul>
                                                        <li>Cat Eyes</li>
                                                        <li>Swirls</li>
                                                        <li>Tie dye</li>
                                                        <li>Chrome</li>
                                                        <li>Decal stickers</li>
                                                        <li>Embellishments</li>
                                                        <li>Floral</li>
                                                        <li>Free hand</li>
                                                        <li>Geometric art</li>
                                                        <li>Glitter</li>
                                                        <li>Holographic</li>
                                                        <li>Ombre</li>
                                                        <li>Gold/silver foil</li>
                                                    </ul>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Custom Nail Art Design', 1199, 'images/services/custom-design.jpg', '1 hrs 10 min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="service-process">
                                        <h6>How it works:</h6>
                                        <ol>
                                            <li><strong>Pre-service setup</strong> - Setting up of a nail bar with a table, lamp & stool</li>
                                            <li><strong>Nail prep</strong> - Application of cuticle softener followed by cutting, filing, shaping & cleansing of nails</li>
                                            <li><strong>Acid-free primer application</strong> - Application of acid-free primer on the nails</li>
                                            <li><strong>Polish application</strong> - Base coat followed by the nail art design on all the nails</li>
                                            <li><strong>Curing</strong> - Curing of base coat and polish for 60 seconds each</li>
                                            <li><strong>Cuticle oil</strong> - No wipe top coat application, curing for 60 seconds and cuticle oil massage</li>
                                        </ol>
                                        
                                        <h6>Aftercare Guide:</h6>
                                        <div class="aftercare-tips">
                                            <div class="do-dont">
                                                <div class="do-section">
                                                    <h7>DO:</h7>
                                                    <ul>
                                                        <li>Moisturise your hands and cuticles regularly</li>
                                                        <li>Use acetone free remover for stains on gel polish</li>
                                                        <li>Always get a professional for removals</li>
                                                    </ul>
                                                </div>
                                                <div class="dont-section">
                                                    <h7>DON'T:</h7>
                                                    <ul>
                                                        <li>Use harsh cleaning products on your nails</li>
                                                        <li>Pick or peel the product off the nail bed</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Ombre and Marble -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">OMBRE AND MARBLE</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/cla.jpeg')); ?>" style="height:250px;" alt="Classic Ombre">
                                                <div class="service-header">
                                                    <h5>Classic ombre</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Achieve a beautiful gradient effect with our classic ombre nails. This timeless technique creates a seamless color transition from light to dark, giving your nails a sophisticated and elegant look that complements any style or occasion.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Classic ombre', 1199, 'images/services/cla.jpeg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/glitter.jpg')); ?>" style="height:250px;" alt="Vertical Ombre">
                                                <div class="service-header">
                                                    <h5>Vertical ombre</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Create a striking vertical color flow with our vertical ombre design. This modern approach features color gradients running from cuticle to tip, elongating your nails and creating an eye-catching vertical statement.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Vertical ombre', 1199, 'images/services/glitter.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/FrenchGlitter.jpeg')); ?>" style="height:250px;" alt="Glitter Ombre">
                                                <div class="service-header">
                                                    <h5>Glitter ombre</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Add sparkle and dimension to your nails with glitter ombre. This dazzling combination blends gradient colors with fine glitter particles, creating a multidimensional effect that catches light from every angle.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Glitter ombre', 1199, 'images/services/FrenchGlitter.jpeg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/marble.jpeg')); ?>" style="height:250px;" alt="Classic Marble">
                                                <div class="service-header">
                                                    <h5>Classic marble</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Achieve the luxurious look of natural stone with our classic marble nails. This artistic technique creates delicate veining patterns that mimic real marble, giving your nails an elegant and sophisticated appearance.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Classic marble', 1199, 'images/services/marble.jpeg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/gal.jpg')); ?>" style="height:250px;" alt="Galaxy Marble">
                                                <div class="service-header">
                                                    <h5>Galaxy marble</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Journey through space with galaxy marble nails. This cosmic design combines swirling marble patterns with starry specks and nebula effects, creating an otherworldly look that's truly out of this universe.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Galaxy marble', 1199, 'images/services/gal.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/marn.jpg')); ?>" style="height:350px;" alt="Marbled Gold">
                                                <div class="service-header">
                                                    <h5>Marbled gold</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Indulge in luxury with marbled gold nails. This opulent design blends rich gold accents with elegant marble veining, creating a regal and sophisticated look that exudes wealth and refinement.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Marbled gold', 1199, 'images/services/marn.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="service-process">
                                        <h6>How it works:</h6>
                                        <ol>
                                            <li><strong>Pre-service setup</strong> - Setting up of a nail bar with a table, lamp & stool</li>
                                            <li><strong>Nail prep</strong> - Application of cuticle softener followed by cutting, filing, shaping & cleansing of nails</li>
                                            <li><strong>Acid-free primer application</strong> - Application of acid-free primer on the nails</li>
                                            <li><strong>Polish application</strong> - Base coat followed by the nail art design on all the nails</li>
                                            <li><strong>Curing</strong> - Curing of base coat and polish for 60 seconds each</li>
                                            <li><strong>Cuticle oil</strong> - No wipe top coat application, curing for 60 seconds and cuticle oil massage</li>
                                        </ol>
                                        
                                        <h6>Aftercare Guide:</h6>
                                        <div class="aftercare-tips">
                                            <div class="do-dont">
                                                <div class="do-section">
                                                    <h7>DO:</h7>
                                                    <ul>
                                                        <li>Moisturise your hands and cuticles regularly</li>
                                                        <li>Use acetone free remover for stains on gel polish</li>
                                                        <li>Always get a professional for removals</li>
                                                    </ul>
                                                </div>
                                                <div class="dont-section">
                                                    <h7>DON'T:</h7>
                                                    <ul>
                                                        <li>Use harsh cleaning products on your nails</li>
                                                        <li>Pick or peel the product off the nail bed</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Chrome & Holographic -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">CHROME & HOLOGRAPHIC</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/crome.jpg')); ?>" style="height:250px;" alt="Classic Chrome">
                                                <div class="service-header">
                                                    <h5>Classic</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Experience the timeless elegance of classic chrome nails with our premium mirror-finish treatment. This service creates a stunning metallic sheen that reflects light beautifully, giving your nails a sophisticated and modern look perfect for any occasion.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Classic Chrome', 1199, 'images/services/crome.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/gal.jpg')); ?>" style="height:250px;" alt="Holographic Nails">
                                                <div class="service-header">
                                                    <h5>Holographic</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Transform your nails into a rainbow prism with our holographic treatment. This mesmerizing effect creates a multidimensional sparkle that shifts colors with every movement, giving you an eye-catching and futuristic look that's perfect for parties and special events.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Holographic', 1199, 'images/services/gal.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/line.jpg')); ?>" style="height:250px;" alt="Chrome Lines">
                                                <div class="service-header">
                                                    <h5>Chrome Lines</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Elevate your nail art with precision chrome line designs. This service combines the mirror-like finish of chrome with artistic line patterns, creating geometric and abstract designs that showcase both technical skill and creative vision.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Chrome Lines', 1199, 'images/services/line.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/fr.jpg')); ?>" style="height:250px;" alt="Chrome French Tips">
                                                <div class="service-header">
                                                    <h5>Chrome French Tips</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Modernize the classic French manicure with our chrome French tips. This contemporary twist features reflective chrome tips that add a luxurious and glamorous touch to the timeless design, perfect for those who love tradition with a modern edge.</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Chrome French Tips', 1199, 'images/services/fr.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="service-process">
                                        <h6>How it works:</h6>
                                        <ol>
                                            <li><strong>Pre-service setup</strong> - Setting up of a nail bar with a table, lamp & stool</li>
                                            <li><strong>Nail prep</strong> - Application of cuticle softener followed by cutting, filing, shaping & cleansing of nails</li>
                                            <li><strong>Acid-free primer application</strong> - Application of acid-free primer on the nails</li>
                                            <li><strong>Polish application</strong> - Base coat followed by the nail art design on all the nails</li>
                                            <li><strong>Curing</strong> - Curing of base coat and polish for 60 seconds each</li>
                                            <li><strong>Cuticle oil</strong> - No wipe top coat application, curing for 60 seconds and cuticle oil massage</li>
                                        </ol>
                                        
                                        <h6>Aftercare Guide:</h6>
                                        <div class="aftercare-tips">
                                            <div class="do-dont">
                                                <div class="do-section">
                                                    <h7>DO:</h7>
                                                    <ul>
                                                        <li>Moisturise your hands and cuticles regularly</li>
                                                        <li>Use acetone free remover for stains on gel polish</li>
                                                        <li>Always get a professional for removals</li>
                                                    </ul>
                                                </div>
                                                <div class="dont-section">
                                                    <h7>DON'T:</h7>
                                                    <ul>
                                                        <li>Use harsh cleaning products on your nails</li>
                                                        <li>Pick or peel the product off the nail bed</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Cat Eye -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">CAT EYE</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                         <img src="<?php echo e(asset('images/services/cat.jpg')); ?>" style="height:250px;" alt="Curls & Waves">
                                                <div class="service-header">
                                                    <h5>Classic Cat Eye</h5>
                                                    <p>The Classic Cat Eye service is a timeless eye-enhancing treatment designed to create a sharp, lifted, and elegant look.</p>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                   
                                                    </div>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Classic Cat Eye', 1199, 'images/services/cat.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                             <img src="<?php echo e(asset('images/services/ab.jpg')); ?>" style="height:250px;" alt="Curls & Waves">    
                                            <div class="service-header">
                                                    <h5>Abstract Cat Eye</h5>
                                                    <p>The Abstract Cat Eye nail service is a modern, artistic twist on the classic cat eye effect. Using magnetic gel polish and creative techniques.</p>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Abstract Cat Eye', 1199, 'images/services/ab.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/gal.jpg')); ?>" style="height:250px;" alt="Curls & Waves">    
                                            
                                                <div class="service-header">
                                                    <h5>Galaxy Cat Eye</h5>
                                                    <p>Galaxy Cat Eye Nails are a premium nail art service that creates a mesmerizing, cosmic effect on your nails.</p>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Galaxy Cat Eye', 1199, 'images/services/gal.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                        <img src="<?php echo e(asset('images/services/line.jpg')); ?>" style="height:250px;" alt="Curls & Waves">       
                                            <div class="service-header">
                                                    <h5>Line Art Cat Eye</h5>
                                                    <p>This service features the iconic cat eye effect—created using special magnetic gel polish that produces a shimmering, light-reflective design—enhanced with delicate hand-drawn line art for a refined, high-fashion finish.</p>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Line Art Cat Eye', 1199, 'images/services/line.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <div class="service-header">
                                                    <img src="<?php echo e(asset('images/services/mul.jpg')); ?>" style="height:250px;" alt="Curls & Waves">
                                                    <h5>Multicoloured Cat Eye</h5>
                                                    <p>Multicoloured Cat Eye service, a stunning blend of magnetic effects and vibrant hues. This technique uses special cat eye gel polishes.</p>
                                                    <div class="price-info">
                                                        <span class="original-price">₹1,499</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹1,199</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Multicoloured Cat Eye', 1199, 'images/services/mul.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="service-process">
                                        <h6>How it works:</h6>
                                        <ol>
                                            <li><strong>Pre-service setup</strong> - Setting up of a nail bar with a table, lamp & stool</li>
                                            <li><strong>Nail prep</strong> - Application of cuticle softener followed by cutting, filing, shaping & cleansing of nails</li>
                                            <li><strong>Acid-free primer application</strong> - Application of acid-free primer on the nails</li>
                                            <li><strong>Polish application</strong> - Base coat followed by the nail art design on all the nails</li>
                                            <li><strong>Curing</strong> - Curing of base coat and polish for 60 seconds each</li>
                                            <li><strong>Cuticle oil</strong> - No wipe top coat application, curing for 60 seconds and cuticle oil massage</li>
                                        </ol>
                                        
                                        <h6>Aftercare Guide:</h6>
                                        <div class="aftercare-tips">
                                            <div class="do-dont">
                                                <div class="do-section">
                                                    <h7>DO:</h7>
                                                    <ul>
                                                        <li>Moisturise your hands and cuticles regularly</li>
                                                        <li>Use acetone free remover for stains on gel polish</li>
                                                        <li>Always get a professional for removals</li>
                                                    </ul>
                                                </div>
                                                <div class="dont-section">
                                                    <h7>DON'T:</h7>
                                                    <ul>
                                                        <li>Use harsh cleaning products on your nails</li>
                                                        <li>Pick or peel the product off the nail bed</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Gel Polish - Both Hands -->
                            <div class="col-lg-12">
                                <div class="service-subcategory mb-40">
                                    <h4 class="subcategory-title">Gel Polish - Both Hands</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/solid.jpg')); ?>" style="height:250px;"  alt="Curls & Waves">
                                                <div class="service-header">
                                                    <h5>Solid Colours</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹625</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹ 499</span>
                                                        <span class="time">Time - 60 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Single colour applied on a nail tip; doesn't include designs. 20+ colour options across nude, pastels, vintage & more</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Solid Colours', 499, 'images/services/solid.jpg', '60 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/fr.jpg')); ?>"  style="height:250px;"  alt="Curls & Waves">
                                                <div class="service-header">
                                                    <h5>French Nails</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹625</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹ 499</span>
                                                        <span class="time">Time - 60 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Natural looking pink base coat with gel polish on tips. Classic timeless design that goes with every look</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('French Nails', 499, 'images/services/fr.jpg', '60 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                <img src="<?php echo e(asset('images/services/nart.jpg')); ?>"  style="height:250px;"  alt="Curls & Waves">
                                                <div class="service-header">
                                                    <h5>Nail Art</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹875</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹ 899</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Flaunt your nails with Stunning Designs of your choice. Create the perfect look with GY Nail Guide</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Nail Art', 899, 'images/services/nart.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="service-card">
                                                
                                                <img src="<?php echo e(asset('images/services/crome.jpg')); ?>" style="height:250px;" alt="Curls & Waves">
                                                <div class="service-header">
                                                    <h5>Chrome Nails</h5>
                                                    <div class="price-info">
                                                        <span class="original-price">₹875</span>
                                                        <span class="discount">25% OFF</span>
                                                        <span class="final-price">₹ 899</span>
                                                        <span class="time">Time - 1 Hrs 10 Min</span>
                                                    </div>
                                                </div>
                                                <div class="service-details">
                                                    <p>Create the perfect glam, shiny & metallic look. Gold & Silver chrome powder available</p>
                                                </div>
                                                <div class="service-action mt-3">
                                                    <button class="btn btn-add-to-cart" 
                                                            onclick="addToCart('Chrome Nails', 899, 'images/services/crome.jpg', '1 Hrs 10 Min', 'Nail Services')">
                                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="service-cards-grid mb-60">
                                <div class="row">
                                    <!-- Service Card 1 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/plain.jpeg')); ?>">
                                            </div>
                                            <div class="service-content">
                                                <h4>Plain Gel Polish Nail</h4>
                                                <p>Classic single color gel polish application for clean, elegant look</p>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹749</span>
                                                    <span class="discount">25% OFF</span>
                                                    <span class="discounted-price">₹599</span>
                                                    <span class="duration">60 Min</span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 2 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/FrenchGlitter.jpeg')); ?>" alt="French Glitter Nails">
                                            </div>
                                            <div class="service-content">
                                                <h4>French Glitter Nails</h4>
                                                <p>Elegant French tips with glitter accents for glamorous look</p>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹1,125</span>
                                                    <span class="discount">25% OFF</span>
                                                    <span class="discounted-price">₹899</span>
                                                    <span class="duration">60 Min</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <!-- Service Card 3 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/cla.jpeg')); ?>" alt="Open Half-Tie Style">
                                                
                                            </div>
                                            <div class="service-content">
                                                <h4>Classic Ombre Nails</h4>
                                                <p>Beautiful gradient ombre effect with smooth color transitions</p>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹1,499</span>
                                                    <span class="discount">25% OFF</span>
                                                    <span class="discounted-price">₹1,199</span>
                                                    <span class="duration">1 Hrs 10 Min</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 4 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/french.jpeg')); ?>" alt="Hair Straightening">

                                            </div>
                                            <div class="service-content">
                                                <h4>French Classic Nails</h4>
                                                <p>Timeless French manicure with natural pink base and white tips</p>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹1,125</span>
                                                    <span class="discount">25% OFF</span>
                                                    <span class="discounted-price">₹899</span>
                                                    <span class="duration">60 Min</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 5 -->
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="service-card">
                                            <div class="service-image" style="object-fit:inherit;height:350px;">
                                                <img src="<?php echo e(asset('images/services/Solidgel.jpeg')); ?>" alt="Solid Multi Color Gel Polish">
                                            
                                            </div>
                                            <div class="service-content">
                                                <h4>Solid Multi Colour Gel Polish Nails</h4>
                                                <p>Vibrant solid colors with multi-color options for trendy look</p>
                                                <div class="pricing-info">
                                                    <span class="original-price">₹749</span>
                                                    <span class="discount">25% OFF</span>
                                                    <span class="discounted-price">₹599</span>
                                                    <span class="duration">60 Min</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- glorya-services-area-end -->
            
            
         
            
            
              <!-- contact-area -->
            <section id="contact" class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url(<?php echo e(asset('images/bg/contact-bg.png')); ?>)">
                
<?php $__env->stopSection(); ?>


<script>
// Cart functionality
window.addToCart = function(serviceName, servicePrice, serviceImage, serviceTime, serviceCategory, buttonElement) {
    console.log('Adding to cart:', serviceName, servicePrice, serviceImage, serviceTime, serviceCategory);
    
    // Temporarily removed authentication check for testing
    // <?php if(!Auth::check()): ?>
    //     alert('Please login to add services to cart');
    //     window.location.href = '<?php echo e(route("login")); ?>';
    //     return;
    // <?php endif; ?>
    
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
                
                // Show success message
                showNotification(response.message, 'success');
                
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
                // If user is not authenticated, redirect to login
                if (xhr.responseJSON.message.includes('not authenticated')) {
                    showNotification('Please login to add items to cart', 'error');
                    setTimeout(() => {
                        window.location.href = '<?php echo e(route("login")); ?>';
                    }, 2000);
                    return;
                }
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

// Load cart count on page load
<?php if(Auth::check()): ?>
    $.get('<?php echo e(route("cart.count")); ?>', function(response) {
        updateCartCount(response.count);
    });
<?php endif; ?>
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Glorya/resources/views/frontend/services.blade.php ENDPATH**/ ?>