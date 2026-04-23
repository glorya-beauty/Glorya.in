<?php $__env->startSection('title', 'Glorya Beauty'); ?>
<?php $__env->startSection('description', 'Luxury salon care at home, empowering service professionals'); ?>

<?php $__env->startSection('content'); ?>
<!-- Success Message -->
<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show text-center" style="margin-top: 20px; position: fixed; top: 20px; right: 20px; left: 20px; z-index: 9999;">
        <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
                 
<!-- main-area -->
<main>
    <!-- search-popup -->
    <div class="modal fade bs-example-modal-lg search-bg popup1" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content search-popup">
                <div class="text-center">
                    <a href="#" class="close2" data-dismiss="modal" aria-label="Close">× close</a>
                </div>
                <div class="row search-outer">
                    <div class="col-md-11"><input type="text" placeholder="Search for products..." /></div>
                    <div class="col-md-1 text-right"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /search-popup -->

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
                    <button type="submit" class="btn  ss-btn active btn-block">Login</button>
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
                    <button type="submit" class="btn btn ss-btn active btn-block">Register</button>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="#" onclick="showLoginModal();">Login here</a></p>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
    
    <!-- slider-area -->
    <section id="home" class="slider-area slider-four fix p-relative">
        <div class="slider-active">
            <div class="single-slider slider-bg d-flex align-items-center" style="background: url(<?php echo e(asset('images/slider/slider_img_bg.png')); ?>) no-repeat;">
                <div class="container">
                    <div class="row justify-content-center pt-50">
                        <div class="col-lg-6">
                            <div class="slider-content s-slider-content text2 mt-200">
                                <h5 data-animation="fadeInDown" data-delay=".4s">Beauty & Skin Care</h5>
                                <h2 data-animation="fadeInUp" data-delay=".4s">Luxury Salon Care At Home, Empowering Service Professionals</h2>
                                <p data-animation="fadeInUp" data-delay=".6s">premium salon experiences, delivered to your home</p>
                                
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="slider-img" data-animation="fadeInUp" data-delay=".4s">
                                <img src="<?php echo e(asset('images/slider/slider_img05.png')); ?>" alt="slider_img05">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider-area-end -->
    
    <!-- about-area -->
    <section id="about" class="about-area about-p pt-100 pb-100 p-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 pr-30">
                    <div class="s-about-img p-relative  wow fadeInLeft  animated" data-animation="fadeInLeft" data-delay=".4s">
                        <img src="<?php echo e(asset('images/features/about_img.png')); ?>" alt="img">    
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-content s-about-content  wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                        <div class="about-title second-atitle pb-45">   
                            <h2>The Essence Of Health & Vitality In One Place</h2>   
                            <div class="line mb-40"> <img src="<?php echo e(asset('images/bg/circle_right.png')); ?>" alt="circle_right"></div>
                            <div class="title-strong">We Have <span>1 Years</span> Of Experience</div>
                        </div>
                        
                        <p>At Glorya, we bring you the complete essence of health and vitality through our premium beauty and wellness services. Our expert team is dedicated to enhancing your natural beauty and helping you achieve the radiant glow you deserve.</p>
                        <p>Experience the perfect blend of luxury and care with our comprehensive range of services designed to pamper you from head to toe, using only the finest products and latest techniques in the beauty industry.</p>
                        <div class="about-content3">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="green">
                                        <li><i class="fas fa-spa" style="margin-right: 10px;"></i>Facial Skin Care</li>            
                                        <li><i class="fas fa-cut" style="margin-right: 10px;"></i>Advanced Hair Styling</li>
                                        <li><i class="fas fa-palette" style="margin-right: 10px;"></i>Professional Makeup Services</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="green">
                                        <li><i class="fas fa-hand-sparkles" style="margin-right: 10px;"></i>Luxury Nail Art & Manicure</li>
                                        <li><i class="fas fa-shoe-prints" style="margin-right: 10px;"></i>Pedicure & Foot Care</li>
                                        <li><i class="fas fa-tint" style="margin-right: 10px;"></i>Hair Coloring</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="slider-btn mt-10">                                          
                            <a href="<?php echo e(route('services')); ?>" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">
                                <i class="fas fa-eye"></i> View Services
                            </a>
                         				
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->
    
    <!-- services-area -->          
    <section id="services" class="services-area pt-100 pb-70 fix" style=" background-image: url(<?php echo e(asset('images/bg/proved-bg.png')); ?>); background-size: cover; background-repeat: no-repeat; background-color: #fff5f4;" >
        <div class="container">
            <div class="row">   
                <div class="col-lg-12">
                    <div class="section-title center-align mb-50 text-center">
                        <h2>What We Provide</h2>
                        <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_left.png')); ?>" alt="circle_left"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="services-box text-center wow fadeInUp  animated" data-delay=".4s">
                        <div class="services-icon">
                            <img src="<?php echo e(asset('images/icon/pv-icon1.png')); ?>" alt="icon01">
                        </div>
                        <div class="services-content2">
                            <h5><a href="<?php echo e(url('/services')); ?>">Expert Beauty Artists</a> <span class="line5"> <img src="<?php echo e(asset('images/bg/bx-line.png')); ?>" alt="circle_left"></span></h5>   
                            <p>Our certified beauty professionals bring years of experience in makeup artistry, hair styling, and nail care. Each artist is trained in the latest techniques and trends to ensure you receive premium beauty services that enhance your natural beauty.</p>
                        </div>
                    </div>   
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="services-box text-center wow fadeInDown  animated" data-delay=".5s">
                        <div class="services-icon">
                            <img src="<?php echo e(asset('images/icon/pv-icon2.png')); ?>" alt="icon01">
                        </div>
                        <div class="services-content2">
                            <h5><a href="<?php echo e(url('/services')); ?>">Happy Clients Served</a> <span class="line5"> <img src="<?php echo e(asset('images/bg/bx-line.png')); ?>" alt="circle_left"></span></h5>   
                            <p>Thousands of satisfied clients have experienced our exceptional beauty services. From bridal makeup to everyday beauty treatments, we've helped countless individuals look and feel their best for special occasions and daily confidence.</p>
                        </div>
                    </div>   
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="services-box text-center wow fadeInUp  animated" data-delay=".4s">
                        <div class="services-icon">
                            <img src="<?php echo e(asset('images/icon/pv-icon3.png')); ?>" alt="icon01">
                        </div>
                        <div class="services-content2">
                            <h5><a href="<?php echo e(url('/services')); ?>">Premium Beauty Products</a> <span class="line5"> <img src="<?php echo e(asset('images/bg/bx-line.png')); ?>" alt="circle_left"></span></h5>   
                            <p>We use only high-quality, professional-grade beauty products from trusted brands. Our carefully curated selection includes skincare essentials, makeup products, and nail care items that ensure long-lasting results and maintain your skin's health and beauty.</p>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->
    
    <!-- glorya-services-area -->
    <section id="glorya-services" class="services-area pt-100 pb-100 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-align mb-80 text-center">
                        <h2>Our Beauty Services</h2>
                        <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_left.png')); ?>" alt="circle_left"></span>
                        <p class="mt-20">Discover our complete range of beauty and wellness treatments designed to enhance your natural beauty</p>
                    </div>
                </div>
            </div>
            
            <!-- Service Image Cards -->
            <div class="service-cards-grid mb-60">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="service-image-card">
                            <div class="card-img">
                                <img src="<?php echo e(asset('images/services/skin.jpg')); ?>" alt="Skin Care" class="img-fluid">
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h4>Skin Care</h4>
                                        <p>Advanced facial treatments</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <h5>Advanced Skin Care</h5>
                                <p>Rejuvenating facial therapies and treatments for radiant, youthful skin</p>
                                <ul class="card-features">
                                    <li><i class="fas fa-check"></i> Anti-aging treatments</li>
                                    <li><i class="fas fa-check"></i> Deep hydration therapy</li>
                                    <li><i class="fas fa-check"></i> Skin brightening</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3 col-md-6 mb-30">
                        <div class="service-image-card">
                            <div class="card-img">
                                <img src="<?php echo e(asset('images/services/hair-style.jpg')); ?>" alt="Hair Styling" class="img-fluid">
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h4>Hair Styling</h4>
                                        <p>Professional hair services</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <h5>Hair Styling & Care</h5>
                                <p>Complete hair treatments, styling, and coloring services</p>
                                <ul class="card-features">
                                    <li><i class="fas fa-check"></i> Professional cutting</li>
                                    <li><i class="fas fa-check"></i> Hair coloring</li>
                                    <li><i class="fas fa-check"></i> Deep conditioning</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="service-image-card">
                            <div class="card-img">
                                <img src="<?php echo e(asset('images/services/makeup.jpg')); ?>" alt="Makeup Services" class="img-fluid">
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h4>Makeup</h4>
                                        <p>Professional makeup artistry</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <h5>Professional Makeup</h5>
                                <p>Expert makeup application for all occasions and events</p>
                                <ul class="card-features">
                                    <li><i class="fas fa-check"></i> Bridal makeup</li>
                                    <li><i class="fas fa-check"></i> Party makeup</li>
                                    <li><i class="fas fa-check"></i> Everyday looks</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="service-image-card">
                            <div class="card-img">
                                <img src="<?php echo e(asset('images/services/nail.jpg')); ?>" alt="Nail Art" class="img-fluid">
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h4>Nail Art</h4>
                                        <p>Professional nail services</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <h5>Nail Art & Care</h5>
                                <p>Creative nail designs and professional manicure/pedicure services</p>
                                <ul class="card-features">
                                    <li><i class="fas fa-check"></i> Spa manicure</li>
                                    <li><i class="fas fa-check"></i> Creative nail art</li>
                                    <li><i class="fas fa-check"></i> Luxury pedicure</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="text-center mt-60">
                <a href="<?php echo e(url('/services')); ?>" class="btn ss-btn">View All Services</a>
            </div>
        </div>
    </section>
    <!-- glorya-services-end -->
      <!-- pricing-area -->
            <!-- <section id="pricing" class="pricing-area pt-120 pb-70">
                <div class="container"> 
                     <div class="row">   
                        <div class="col-lg-12">
                            <div class="section-title center-align mb-100 text-center">
                                <h2>
                                Our Pricing
                                </h2>
                                <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_left.png')); ?>" alt="circle_left"></span>
                            </div>
                           
                        </div>
                         
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                           <div class="pricing-box pricing-box2 text-center mb-60  wow fadeInLeft  animated">
                                <div class="pricing-head">       
                                    <div class="icon mb-30">
                                        <img src="<?php echo e(asset('images/icon/pr-icon1.png')); ?>" alt="circle_right">
                                    </div>
                                    <h2>Regular Member</h2>   
                                    <hr>
                                </div>
                                
                                <div class="pricing-body mt-30 text-center">
                                   <ul>
                                       <li>Face masks</li>
                                       <li>Geothermal Spa</li>
                                        <li>Aroma therapy</li>
                                         <li>Sauna relax</li>
                                         <li>Aroma therapy</li>
                                    </ul>
                                </div>             
                               <div class="price-count mb-30">
                                        <h2><sub>$</sub>49 <strong>/ Monthly</strong></h2>
                                    </div> 
                                                           
                                <div class="pricing-btn">
                                   <a href="#" class="btn ss-btn"><i class="fas fa-angle-right btn-icon mr-1"></i> Purchase Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                           <div class="pricing-box pricing-box2 text-center mb-60  wow fadeInDown  animated">
                                <div class="pricing-head">       
                                    <div class="icon mb-30">
                                        <img src="<?php echo e(asset('images/icon/pr-icon2.png')); ?>" alt="circle_right">
                                    </div>
                                    <h2>VIP Member</h2>   
                                    <hr>
                                </div>
                                
                                <div class="pricing-body mt-30 text-center">
                                   <ul>
                                        <li>Aroma therapy</li>
                                         <li>Face masks</li>
                                         <li>Geothermal Spa</li>
                                         <li>Sauna relax</li>
                                         <li>Aroma therapy</li>
                                    </ul>
                                </div>             
                               <div class="price-count mb-30">
                                        <h2><sub>$</sub>79 <strong>/ Monthly</strong></h2>
                                    </div> 
                                                           
                                <div class="pricing-btn">
                                   <a href="#" class="btn ss-btn"><i class="fas fa-angle-right btn-icon mr-1"></i> Purchase Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                           <div class="pricing-box pricing-box2 text-center mb-60  wow fadeInRight  animated">
                                <div class="pricing-head">       
                                    <div class="icon mb-30">
                                        <img src="<?php echo e(asset('images/icon/pr-icon3.png')); ?>" alt="circle_right">
                                    </div>
                                    <h2>Premium Member</h2>   
                                    <hr>
                                </div>
                                
                                <div class="pricing-body mt-30 text-center">
                                   <ul>
                                       <li>Geothermal Spa</li>
                                        <li>Aroma therapy</li>
                                         <li>Face masks</li>
                                         <li>Sauna relax</li>
                                         <li>Aroma therapy</li>
                                    </ul>
                                </div>             
                               <div class="price-count mb-30">
                                        <h2><sub>$</sub>99 <strong>/ Monthly</strong></h2>
                                    </div> 
                                                           
                                <div class="pricing-btn">
                                   <a href="#" class="btn ss-btn"><i class="fas fa-angle-right btn-icon mr-1"></i> Purchase Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- pricing-area-end -->
           
    <!-- price-packages-section -->
    <section id="price" class="price-packages-section" style="background-color: #F0D196; background-size: cover; background-repeat: no-repeat; background-position: center center; background-attachment: fixed;">
        <div class="container-lg padding-medium">
            <div class="section-title text-center mb-5">
                <h2 class="display-4 fw-normal text-white">Price Packages</h2>
            </div>

            <div class="row g-md-5 my-0">
                <div class="col-md-6 my-4">
                    <div class="bg-white p-2 p-lg-5 rounded-3 shadow-lg">
                        <div class="list-group rounded-0">
                            <a href="<?php echo e(url('/services')); ?>" class="border-0 list-group-item list-group-item-action d-lg-flex align-items-center gap-4 py-3" aria-current="true">
                                <img src="<?php echo e(asset('images/services/marble.jpeg')); ?>" alt="Custom Nail Art Design" width="100" height="100" class="rounded-circle flex-shrink-0 mb-4">
                                <div style="padding:15px;">
                                    <div class="d-flex gap-4 w-100 justify-content-between">
                                        <h5 class="fw-semibold mb-0 service-title">Custom Nail Art Design</h5>
                                        <h5 class="fw-semibold text-primary mb-0 service-price">Rs. 1199/-</h5>
                                    </div>
                                    <p class="mb-0 opacity-75 service-desc small">Premium custom nail art designs with creative patterns and long-lasting results</p>
                                </div>
                            </a>
                            <a href="<?php echo e(url('/services')); ?>" class="border-0 list-group-item list-group-item-action d-lg-flex align-items-center gap-4 py-3" aria-current="true">
                                <img src="<?php echo e(asset('images/services/Manicure.jpeg')); ?>" alt="Manicure + Pedicure" width="100" height="100" class="rounded-circle flex-shrink-0 mb-4">
                                <div style="padding:15px;">
                                    <div class="d-flex gap-4 w-100 justify-content-between">
                                        <h5 class="fw-semibold mb-0 service-title">Manicure + Pedicure</h5>
                                        <h5 class="fw-semibold text-primary mb-0 service-price">Rs. 1299/-</h5>
                                    </div>
                                    <p class="mb-0 opacity-75 service-desc small">Luxurious spa manicure and pedicure with massage, cuticle care, and premium polish</p>
                                </div>
                            </a>
                            <a href="<?php echo e(url('/services')); ?>" class="border-0 list-group-item list-group-item-action d-lg-flex align-items-center gap-4 py-3" aria-current="true">
                                <img src="<?php echo e(asset('images/services/makeup.jpg')); ?>" alt="Bridal Eye Makeup" width="100" height="100" class="rounded-circle flex-shrink-0 mb-4">
                                <div style="padding:15px;">
                                    <div class="d-flex gap-4 w-100 justify-content-between">
                                        <h5 class="fw-semibold mb-0 service-title">Bridal Eye Makeup</h5>
                                        <h5 class="fw-semibold text-primary mb-0 service-price">Rs. 1999/-</h5>
                                    </div>
                                    <p class="mb-0 opacity-75 service-desc small">Professional bridal eye makeup for stunning, long-lasting wedding look</p>
                                </div>
                            </a>
                            <a href="<?php echo e(url('/services')); ?>" class="border-0 list-group-item list-group-item-action d-lg-flex align-items-center gap-4 py-3" aria-current="true">
                                <img src="<?php echo e(asset('images/services/party.jpeg')); ?>" alt="Party Makeup + Hair Styling" width="100" height="100" class="rounded-circle flex-shrink-0 mb-4">
                                <div style="padding:15px;">
                                    <div class="d-flex gap-4 w-100 justify-content-between">
                                        <h5 class="fw-semibold mb-0 service-title">Party Makeup + Hair Styling</h5>
                                        <h5 class="fw-semibold text-primary mb-0 service-price">Rs. 4999/-</h5>
                                    </div>
                                    <p class="mb-0 opacity-75 service-desc small">Complete party package with professional makeup and hair styling</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-4">
                    <div class="bg-white p-2 p-md-5 rounded-3 shadow-lg">
                        <div class="list-group rounded-0">
                            <a href="<?php echo e(url('/services')); ?>" class="border-0 list-group-item list-group-item-action d-lg-flex align-items-center gap-4 py-3" aria-current="true">
                                <img src="<?php echo e(asset('images/services/skin.jpg')); ?>" alt="Korean Glass Skin Facial" width="100" height="100" class="rounded-circle flex-shrink-0 mb-4">
                                <div style="padding:15px;">
                                    <div class="d-flex gap-4 w-100 justify-content-between">
                                        <h5 class="fw-semibold mb-0 service-title">Korean Glass Skin Facial</h5>
                                        <h5 class="fw-semibold text-primary mb-0 service-price">Rs. 1999/-</h5>
                                    </div>
                                    <p class="mb-0 opacity-75 service-desc small">Premium Korean facial treatment for glowing, glass-like skin texture</p>
                                </div>
                            </a>
                            <a href="<?php echo e(url('/services')); ?>" class="border-0 list-group-item list-group-item-action d-lg-flex align-items-center gap-4 py-3" aria-current="true">
                                <img src="<?php echo e(asset('images/services/wax.jpeg')); ?>" alt="Full Body Waxing + Facial" width="100" height="100" class="rounded-circle flex-shrink-0 mb-4">
                                <div style="padding:15px;">
                                    <div class="d-flex gap-4 w-100 justify-content-between">
                                        <h5 class="fw-semibold mb-0 service-title">Full Body Waxing + Facial</h5>
                                        <h5 class="fw-semibold text-primary mb-0 service-price">Rs. 1999/-</h5>
                                    </div>
                                    <p class="mb-0 opacity-75 service-desc small">Complete body waxing combined with rejuvenating facial treatment</p>
                                </div>
                            </a>
                            <a href="<?php echo e(url('/services')); ?>" class="border-0 list-group-item list-group-item-action d-lg-flex align-items-center gap-4 py-3" aria-current="true">
                                <img src="<?php echo e(asset('images/services/Solidgel.jpeg')); ?>" alt="Gel Manicure + Pedicure" width="100" height="100" class="rounded-circle flex-shrink-0 mb-4">
                                <div style="padding:15px;">
                                    <div class="d-flex gap-4 w-100 justify-content-between">
                                        <h5 class="fw-semibold mb-0 service-title">Gel Manicure + Pedicure</h5>
                                        <h5 class="fw-semibold text-primary mb-0 service-price">Rs. 1999/-</h5>
                                    </div>
                                    <p class="mb-0 opacity-75 service-desc small">Premium gel manicure and pedicure with long-lasting polish finish</p>
                                </div>
                            </a>
                            <a href="<?php echo e(url('/services')); ?>" class="border-0 list-group-item list-group-item-action d-lg-flex align-items-center gap-4 py-3" aria-current="true">
                                <img src="<?php echo e(asset('images/services/haldi.jpeg')); ?>" alt="Bridal Makeup + Hair Styling + Saree Draping" width="100" height="100" class="rounded-circle flex-shrink-0 mb-4">
                                <div style="padding:15px;">
                                    <div class="d-flex gap-4 w-100 justify-content-between">
                                        <h5 class="fw-semibold mb-0 service-title">Bridal Complete Package</h5>
                                        <h5 class="fw-semibold text-primary mb-0 service-price">Rs. 10999/-</h5>
                                    </div>
                                    <p class="mb-0 opacity-75 service-desc small">Complete bridal package: makeup, hair styling, and saree draping</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
       <!-- contact-area -->
            <section id="contact" class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url(<?php echo e(asset('images/bg/contact-bg.png')); ?>)">
                <div class="contact-bg-an-01"><img src="<?php echo e(asset('images/bg/contact-bg-an-01.png')); ?>" alt="contact-bg-an-01"></div>
                <div class="contact-bg-an-02"><img src="<?php echo e(asset('images/bg/contact-bg-an-02.png')); ?>" alt="contact-bg-an-01"></div>
                <div class="container">
             
					<div class="row align-items-center">
						<div class="col-lg-6">
                            <div class="contact-bg02 wow fadeInLeft  animated">
                            <div class="section-title mb-30">   
                                <h2>Contact With Us</h2>
                                <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_right.png')); ?>" alt="circle_left"></span>
                            </div>
						<form id="contactForm" action="<?php echo e(route('contact.submit')); ?>" method="post" class="contact-form ">
							<?php echo csrf_field(); ?>
							<div id="contactAlert"></div>
							<div class="row">
                            <div class="col-lg-6">
                                <div class="contact-field p-relative c-name mb-20">                                    
                                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                                </div>                               
                            </div>
							<div class="col-lg-6">                               
                                <div class="contact-field p-relative c-email mb-20">                                    
                                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                                </div>                                
                            </div>
							<div class="col-lg-6">                               
                                <div class="contact-field p-relative c-subject mb-20">                                   
                                    <input type="email" id="email" name="email" placeholder="Email" required>
                                </div>
                            </div>		
                            <div class="col-lg-6">                               
                                <div class="contact-field p-relative c-subject mb-20">                                   
                                    <input type="tel" id="phone" name="phone" placeholder="Phone No." required>
                                </div>
                            </div>	
                            
                            <div class="col-lg-12">
                                <div class="contact-field p-relative c-message mb-45">                                  
                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments" required></textarea>
                                </div>
                                <div class="slider-btn">                                          
                                            <button type="submit" class="btn ss-btn active" data-animation="fadeInRight" data-delay=".8s"> Submit Now</button>				
                                        </div>                             
                            </div>
                            </div>
                        
                    </form>
                            
                            </div>
                        
						</div>
                         <div class="col-lg-6">
                           <div class="about-content s-about-content wow fadeInRight  animated">
                                <div class="about-title second-atitle pb-20">            
                                                         
                                    <h2>
                                        Book Your Appointment For Relaxation
                                    </h2>   
                                    <span class="line"> <img src="<?php echo e(asset('images/bg/circle_right.png')); ?>" alt="circle_right"></span>
                                </div>
                                <p>Transform your beauty routine into a luxurious escape at Glorya. Our expert professionals are ready to provide you with personalized treatments that will leave you feeling refreshed, rejuvenated, and radiantly beautiful.</p>
                                <p>Book your appointment today and experience our signature services including advanced skincare treatments, professional nail art, flawless makeup applications, and revitalizing hair therapies. Let us pamper you in our serene environment where beauty meets tranquility.</p>
                              
                                
                            </div>
                        </div>
                        
					</div>
                    
                </div>
               
            </section>
            <!-- contact-area-end -->
            
            <!-- client-area -->
            <section id="client" class="about-area about-p pt-100 pb-100 p-relative">
                <div class="container">
                    <div class="row align-items-center">
                                                
					<div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="about-content s-about-content  wow fadeInUp  animated">
                                <div class="about-title second-atitle pb-40">    
                                    <h2>What We Have Achieved In This Passed Years</h2>
                                    <span class="line"> <img src="<?php echo e(asset('images/bg/circle_right.png')); ?>" alt="circle_right"></span>
                                    <p>At Glorya, we're proud of our journey in the beauty and wellness industry. Over the past year, we've established ourselves as a trusted destination for premium beauty services, building a reputation for excellence and customer satisfaction.</p>  
                                    <p>We've successfully served hundreds of satisfied clients, expanded our service offerings to include the latest beauty treatments, and created a welcoming environment where beauty meets relaxation. Our commitment to using only the finest products and maintaining the highest standards has made us the go-to salon for discerning clients.</p>
                                </div>
                                <div class="row ab-coutner text-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-counter" style="background-image: url(<?php echo e(asset('images/bg/count-bx-bg.png')); ?>); background-repeat: no-repeat;background-position: center bottom;">	
                                            <div class="counter p-relative">
                                                <span class="count">4871</span><small>+</small>                                   
                                            </div>
                                            <p>Happy Clients</p>                                
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                    <div class="single-counter mt-30" style="background-image: url(<?php echo e(asset('images/bg/count-bx-bg.png')); ?>); background-repeat: no-repeat;background-position: center bottom;">	
                                            <div class="counter p-relative">
                                                <span class="count">8795</span><small>+</small>                                   
                                            </div>
                                            <p>Clients Relaxed</p>
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-12 col-sm-12 pr-30">
                            <div class="s-about-img p-relative wow fadeInDown  animated">
                                <img src="<?php echo e(asset('images/bg/client-img01.png')); ?>" alt="img">   
                                <div class="clinet-abimg"><img src="<?php echo e(asset('images/bg/happe-client-bg.png')); ?>" alt="img">  </div>
                            </div>
                          
                        </div>
                     
                    </div>
                </div>
            </section>
            <!-- client-area-end -->
           
              <!-- testimonial-area -->
            <section class="testimonial-area pt-100 pb-100 p-relative fix" style="background-color: #fff5f4;">
                 <div class="test-an-01"><img src="<?php echo e(asset('images/bg/test-an-01.png')); ?>" alt="test-an-01"></div>
                <div class="test-an-02"><img src="<?php echo e(asset('images/bg/test-an-02.png')); ?>" alt="test-an-02"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title center-align mb-50 text-center">
                               
                                <h2>
                                 What Our Clients Says
                                </h2>
                                <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_left.png')); ?>" alt="circle_left"></span>
                             
                            </div>
                           
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="testimonial-active2">
                                <div class="single-testimonial text-center">
                                    <div class="qt-img wow fadeInDown  animated" data-delay=".4s">
                                    <img src="<?php echo e(asset('images/testimonial/qt-icon.png')); ?>" alt="img">
                                    </div>
                                    <p class=" wow fadeInUp  animated">Glorya has transformed my beauty routine completely! Their skin care treatments are absolutely amazing, and the nail art services are always on point. The staff is incredibly professional and makes you feel pampered from the moment you walk in. I've been a loyal client for months and couldn't be happier with the results!</p>
                                     <div class="test-line">
                                          <img src="<?php echo e(asset('images/bg/test-line.png')); ?>" alt="test-line"> 
                                    </div>
                                    <div class="testi-author">
                                        <img src="<?php echo e(asset('images/testimonial/testi_avatar.png')); ?>" alt="img">
                                        <div class="ta-info">
                                            <h6>Priya Sharma</h6>
                                            <span>Regular Client</span>
                                        </div>
                                    </div>
                                   
                                </div>
                                 <div class="single-testimonial text-center">
                                    <div class="qt-img wow fadeInDown  animated" data-delay=".4s">
                                    <img src="<?php echo e(asset('images/testimonial/qt-icon.png')); ?>" alt="img">
                                    </div>
                                    <p class=" wow fadeInUp  animated">I discovered Glorya through a friend's recommendation and I'm so glad I did! Their makeup services are exceptional - I went for my wedding makeup and received so many compliments. The attention to detail and the quality of products they use is outstanding. The atmosphere is so relaxing and the staff truly cares about making you look and feel your best.</p>
                                      <div class="test-line">
                                          <img src="<?php echo e(asset('images/bg/test-line.png')); ?>" alt="test-line"> 
                                    </div>
                                    <div class="testi-author">
                                        <img src="<?php echo e(asset('images/testimonial/testi_avatar.png')); ?>" alt="img">
                                        <div class="ta-info">
                                            <h6>Anjali Verma</h6>
                                            <span>Bride Client</span>
                                        </div>
                                    </div>
                                   
                                </div>
                                  <div class="single-testimonial text-center">
                                     <div class="qt-img wow fadeInDown  animated" data-delay=".4s">
                                    <img src="<?php echo e(asset('images/testimonial/qt-icon.png')); ?>" alt="img">
                                    </div>
                                    <p class=" wow fadeInUp  animated">As someone who struggles with finding the right hair salon, Glorya has been a game-changer! Their hair styling and coloring services are top-notch. The stylists really listen to what you want and deliver amazing results every time. I also love their nail services - the pedicures are so relaxing and the nail art designs are always creative and long-lasting. Highly recommend!</p>
                                       <div class="test-line">
                                          <img src="<?php echo e(asset('images/bg/test-line.png')); ?>" alt="test-line"> 
                                    </div>
                                    <div class="testi-author">
                                        <img src="<?php echo e(asset('images/testimonial/testi_avatar.png')); ?>" alt="img">
                                        <div class="ta-info">
                                            <h6>Neha Patel</h6>
                                            <span>Happy Customer</span>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->
            
              <!-- blog-area -->
            <section id="blog" class="blog-area  p-relative pt-100 pb-70 fix">
                <div class="container">
                    <div class="row align-items-center"> 
                        <div class="col-lg-12">
                            <div class="section-title center-align mb-50 text-center">
                                <h2>
                               Latest Blog & News
                                </h2>
                                <span class="line3"> <img src="<?php echo e(asset('images/bg/circle_left.png')); ?>" alt="circle_left"></span>
                            </div>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="single-post2 mb-30  wow fadeInDown  animated">
                                <div class="blog-thumb2">
                                    <a href="<?php echo e(url('/blog-details')); ?>"><img src="<?php echo e(asset('images/blog/blog_img01.png')); ?>" alt="img"></a>
                                    
                                </div>
                                <div class="blog-content2">     
                                    <div class="b-meta">
                                       <div class="row">
                                             <div class="col-lg-6 col-md-6">
                                              15 April, 2026
                                             </div>
                                            <div class="col-lg-6 col-md-6">
                                               
                                             </div>
                                         </div>
                                    </div>
                                    
                                     <div class="row">
                                        <div class="col-lg-12">
                                         <h4><a href="<?php echo e(url('/blog-details')); ?>">Top 5 Skincare Trends for Spring 2026</a></h4>    
                                        </div>
                                    </div>
                                      <div class="b-meta">
                                       <div class="row align-items-center">
                                             <div class="col-lg-8 col-md-8">
                                             <div class="adim-box">
                                            <div class="c-icon"><img src="<?php echo e(asset('images/blog/ad.png')); ?>" alt="c-Icon.png" style="height:40px;"></div>
                                        <div class="text">  
                                           Glorya Team
                                        </div>
                                        </div>
                                             </div>
                                            <div class="col-lg-4 col-md-4">
                                               <div class="blog-btn"><a href="<?php echo e(url('/blog')); ?>">Read More</a></div>
                                             </div>
                                         </div>
                                    </div>
                                     
                                     
                                </div>
                                
                                
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-12">
                            <div class="single-post2 mb-30  wow fadeInUp  animated">
                                <div class="blog-thumb2">
                                    <a href="<?php echo e(url('/blog-details')); ?>"><img src="<?php echo e(asset('images/blog/blog_img02.jpg')); ?>" alt="img"></a>
                                    
                                </div>
                                <div class="blog-content2">     
                                    <div class="b-meta">
                                       <div class="row">
                                             <div class="col-lg-6 col-md-6">
                                              10 April, 2026
                                             </div>
                                            <div class="col-lg-6 col-md-6">
                                               
                                             </div>
                                         </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                         <h4><a href="<?php echo e(url('/blog-details')); ?>">Wedding Makeup Tips for the Modern Bride</a></h4>    
                                        </div>
                                    </div>
                                   
                                      <div class="b-meta">
                                       <div class="row align-items-center">
                                             <div class="col-lg-8 col-md-8">
                                             <div class="adim-box">
                            <div class="c-icon"><img src="<?php echo e(asset('images/blog/ad.png')); ?>" alt="c-Icon.png"  style="height:40px;" ></div>

                                             <div class="text">  
                                           Beauty Experts
                                        </div>
                                        </div>
                                             </div>
                                            <div class="col-lg-4 col-md-4">
                                               <div class="blog-btn"><a href="<?php echo e(url('/blog')); ?>">Read More</a></div>
                                             </div>
                                         </div>
                                    </div>
                                     
                                     
                                </div>
                                
                                
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-12">
                            <div class="single-post2 mb-30 wow fadeInDown  animated">
                                <div class="blog-thumb2">
                                    <a href="<?php echo e(url('/blog-details')); ?>"><img src="<?php echo e(asset('images/blog/blog_img03.jpeg')); ?>" alt="img"></a>
                                    
                                </div>
                                <div class="blog-content2">     
                                    <div class="b-meta">
                                       <div class="row">
                                             <div class="col-lg-6 col-md-6">
                                              5 April, 2026
                                             </div>
                                            <div class="col-lg-6 col-md-6">
                                               
                                             </div>
                                         </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                         <h4><a href="<?php echo e(url('/blog-details')); ?>">Hair style Designs That Are Trending Now</a></h4>    
                                        </div>
                                    </div>
                                      <div class="b-meta">
                                       <div class="row align-items-center">
                                             <div class="col-lg-8 col-md-8">
                                             <div class="adim-box">
                                    <div class="c-icon" ><img src="<?php echo e(asset('images/blog/ad.png')); ?>" alt="c-Icon.png"style="height:40px;"></div>

                                        <div class="text">  
                                           Nail Artists
                                        </div>
                                        </div>
                                             </div>
                                            <div class="col-lg-4 col-md-4">
                                               <div class="blog-btn"><a href="#">Read More</a></div>
                                             </div>
                                         </div>
                                    </div>
                                     
                                     
                                </div>
                                
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- blog-area-end -->
		</main>
		
		
		<?php $__env->startPush('styles'); ?>
		<style>
		.slider-buttons {
			display: flex;
			gap: 10px;
			align-items: center;
		}
		
		.slider-buttons .btn {
			padding: 12px 25px;
			font-size: 16px;
			font-weight: 600;
			border-radius: 50px;
			text-decoration: none;
			display: inline-flex;
		}
		
		/* Service Cards Responsive Styling */
		.service-title {
			font-size: 1.1rem;
			line-height: 1.3;
		}
		
		.service-price {
			font-size: 1rem;
			font-weight: 600;
		}
		
		.service-desc {
			font-size: 0.85rem;
			line-height: 1.4;
		}
		
		@media (max-width: 768px) {
			.service-title {
				font-size: 0.95rem;
			}
			
			.service-price {
				font-size: 0.9rem;
			}
			
			.service-desc {
				font-size: 0.8rem;
			}
			
			.list-group-item {
				padding: 15px !important;
			}
			
			.list-group-item img {
				width: 80px !important;
				height: 80px !important;
			}
		}
		
		@media (max-width: 576px) {
			.service-title {
				font-size: 0.9rem;
			}
			
			.service-price {
				font-size: 0.85rem;
			}
			
			.service-desc {
				font-size: 0.75rem;
			}
			
			.list-group-item {
				flex-direction: column !important;
				text-align: center;
				padding: 20px 10px !important;
			}
			
			.list-group-item img {
				width: 70px !important;
				height: 70px !important;
				margin-bottom: 10px;
			}
		}
		
		/* Footer Responsive Improvements */
		.footer-desc {
			font-size: 0.9rem;
			line-height: 1.5;
		}
		
		.f-widget-title h3 {
			font-size: 1rem;
			font-weight: 600;
			margin-bottom: 15px;
		}
		
		.footer-link ul li a {
			font-size: 0.85rem;
			padding: 3px 0;
		}
		
		.f-contact ul li {
			margin-bottom: 12px;
		}
		
		.f-contact ul li i {
			font-size: 0.9rem;
			width: 40px;
		}
		
		.f-contact ul li span {
			font-size: 0.85rem;
		}
		
		@media (max-width: 768px) {
			.footer-desc {
				font-size: 0.85rem;
			}
			
			.f-widget-title h3 {
				font-size: 0.9rem;
			}
			
			.footer-link ul li a {
				font-size: 0.8rem;
			}
			
			.f-contact ul li i {
				font-size: 0.85rem;
			}
			
			.f-contact ul li span {
				font-size: 0.8rem;
			}
		}
			align-items: center;
			gap: 8px;
			transition: all 0.3s ease;
		}
		
		.slider-buttons .btn:hover {
			transform: translateY(-2px);
			box-shadow: 0 10px 20px rgba(0,0,0,0.1);
			text-decoration: none;
			color: white;
		}
		
		.mr-10 {
			margin-right: 10px;
		}
		
		.subricbe {
			margin-top: 20px;
		}
		</style>
		<?php $__env->stopPush(); ?>
		
		<script>
		function showRegisterModal() {
			$('#loginModal').modal('hide');
			$('#registerModal').modal('show');
		}
		
		function showLoginModal() {
			$('#registerModal').modal('hide');
			$('#loginModal').modal('show');
		}
		
		// Handle form submission with AJAX
		$(document).ready(function() {
			$('#loginForm').on('submit', function(e) {
				e.preventDefault();
				var formData = $(this).serialize();
				
				$.ajax({
					url: $(this).attr('action'),
					method: 'POST',
					data: formData,
					success: function(response) {
						// Reload page to show logged in state
						window.location.reload();
					},
					error: function(xhr) {
						// Display errors in modal
						var errors = xhr.responseJSON.errors;
						var errorHtml = '<div class="alert alert-danger"><ul class="mb-0">';
						$.each(errors, function(key, value) {
							errorHtml += '<li>' + value + '</li>';
						});
						errorHtml += '</ul></div>';
						$('#loginModal .modal-body').prepend(errorHtml);
					}
				});
			});
			
			$('#registerForm').on('submit', function(e) {
				e.preventDefault();
				var formData = $(this).serialize();
				
				$.ajax({
					url: $(this).attr('action'),
					method: 'POST',
					data: formData,
					success: function(response) {
						// Reload page to show logged in state
						window.location.reload();
					},
					error: function(xhr) {
						// Display errors in modal
						var errors = xhr.responseJSON.errors;
						var errorHtml = '<div class="alert alert-danger"><ul class="mb-0">';
						$.each(errors, function(key, value) {
							errorHtml += '<li>' + value + '</li>';
						});
						errorHtml += '</ul></div>';
						$('#registerModal .modal-body').prepend(errorHtml);
					}
				});
			});
		});
		
		// Contact Form AJAX Submission
		$('#contactForm').on('submit', function(e) {
			e.preventDefault();
			
			var formData = $(this).serialize();
			var submitBtn = $(this).find('button[type="submit"]');
			var originalText = submitBtn.text();
			
			// Show loading state
			submitBtn.prop('disabled', true).text('Sending...');
			
			$.ajax({
				url: $(this).attr('action'),
				method: 'POST',
				data: formData,
				success: function(response) {
					// Show success message
					$('#contactAlert').html(
						'<div class="alert alert-success alert-dismissible fade show" role="alert">' +
						'<i class="fas fa-check-circle"></i> ' + response.message +
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
						'<span aria-hidden="true">&times;</span>' +
						'</button>' +
						'</div>'
					);
					
					// Reset form
					$('#contactForm')[0].reset();
					
					// Reset button
					submitBtn.prop('disabled', false).text(originalText);
					
					// Auto-hide success message after 5 seconds
					setTimeout(function() {
						$('#contactAlert .alert').fadeOut('slow', function() {
							$(this).remove();
						});
					}, 5000);
				},
				error: function(xhr) {
					// Show error message
					var errorMessage = 'Sorry, there was an error submitting your message. Please try again.';
					
					if (xhr.responseJSON && xhr.responseJSON.message) {
						errorMessage = xhr.responseJSON.message;
					} else if (xhr.responseJSON && xhr.responseJSON.errors) {
						var errors = xhr.responseJSON.errors;
						var errorList = [];
						$.each(errors, function(key, value) {
							errorList.push(value[0]);
						});
						errorMessage = errorList.join('<br>');
					}
					
					$('#contactAlert').html(
						'<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
						'<i class="fas fa-exclamation-triangle"></i> ' + errorMessage +
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
						'<span aria-hidden="true">&times;</span>' +
						'</button>' +
						'</div>'
					);
					
					// Reset button
					submitBtn.prop('disabled', false).text(originalText);
					
					// Auto-hide error message after 8 seconds
					setTimeout(function() {
						$('#contactAlert .alert').fadeOut('slow', function() {
							$(this).remove();
						});
					}, 8000);
				}
			});
		});
		</script>
		
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/frontend/home.blade.php ENDPATH**/ ?>