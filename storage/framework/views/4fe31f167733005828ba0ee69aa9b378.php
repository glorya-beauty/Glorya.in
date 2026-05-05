

<?php $__env->startSection('title', 'Gallery - Glorya Beauty'); ?>
<?php $__env->startSection('description', 'Browse our gallery of beautiful transformations and stunning beauty work by Glorya Beauty experts'); ?>

<?php $__env->startSection('content'); ?>
<!-- main-area -->
<!-- /search-popup -->
            <!-- breadcrumb-area -->
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
                                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
			<!-- gallery-area -->
            <section id="work" class="pt-100 pb-70">
                <div class="container">                  
					<div class="portfolio ">
                        <div class="row align-items-center mb-50 text-center">                          
                            <div class="col-lg-12">
                                 <div class="my-masonry">
                            <div class="button-group filter-button-group ">
                               <button class="active" data-filter="*">All Gallery</button>
								 <button data-filter=".seo">Makeup</button>
								<button data-filter=".marketing">Hair</button>	
								<button data-filter=".website">Nail Art</button>
								<button data-filter=".smm">Skin</button>
							</div>
                        </div>
                            </div>
                        </div>
                      

                <div class="grid col3">
				   	<div class="grid-item seo">                        	
                            <div class="case-study-box">
                              <div class="case-study-img">
                                   <img src="<?php echo e(asset('images/services/makeup.jpg')); ?>" alt="Makeup Services">
                                </div>
                               <div class="case-study-content">
                                    
                                    <h5>Professional Makeup</h5> 
                                </div>
                            </div>
                    </div>
					<div class="grid-item marketing">
                      <div class="case-study-box">
                              <div class="case-study-img">
                                   <img src="<?php echo e(asset('images/services/hair-style.jpg')); ?>" alt="Hair Styling">
                                </div>
                               <div class="case-study-content">
                                    
                                    <h5>Hair Styling</h5> 
                                </div>
                            </div>   
                    </div>
                     <div class="grid-item smm">
                       <div class="case-study-box">
                              <div class="case-study-img">
                                   <img src="<?php echo e(asset('images/services/skin.jpg')); ?>" alt="Skin Care">
                                </div>
                               <div class="case-study-content">
                                    
                                    <h5>Skin Care Treatment</h5> 
                                </div>
                            </div>  
                    </div>
                     <div class="grid-item website">
                        <div class="case-study-box">
                              <div class="case-study-img">
                                   <img src="<?php echo e(asset('images/services/nail.jpg')); ?>" alt="Nail Services">
                                </div>
                               <div class="case-study-content">
                                    
                                    <h5>Nail Art & Design</h5> 
                                </div>
                            </div>  
                    </div>
                     <div class="grid-item website">
                        <div class="case-study-box">
                              <div class="case-study-img">
                                   <img src="<?php echo e(asset('images/services/Manicure.jpeg')); ?>" alt="Manicure">
                                </div>
                               <div class="case-study-content">
                                    
                                    <h5>Manicure & Pedicure</h5> 
                                </div>
                            </div>  
                    </div>
                     <div class="grid-item website">
                        <div class="case-study-box">
                              <div class="case-study-img">
                                   <img src="<?php echo e(asset('images/services/FrenchGlitter.jpeg')); ?>" alt="French Nails">
                                </div>
                               <div class="case-study-content">
                                    
                                    <h5>French Nails</h5> 
                                </div>
                            </div>  
                    </div>
                    <div class="grid-item website">
                        <div class="case-study-box mb-30">
                              <div class="case-study-img">
                                   <img src="<?php echo e(asset('images/services/marble.jpeg')); ?>" alt="Marble Nails">
                                </div>
                               <div class="case-study-content">
                                    
                                    <h5>Marble Nail Art</h5> 
                                </div>
                            </div>  
                    </div>
                    <div class="grid-item smm">
                      <div class="case-study-box">
                              <div class="case-study-img">
                                   <img src="<?php echo e(asset('images/services/bleach.jpeg')); ?>" alt="Bleach Service">
                                </div>
                               <div class="case-study-content">
                                    
                                    <h5>Bleach Treatment</h5> 
                                </div>
                            </div>  
                    </div>
                     <div class="grid-item smm">
                        <div class="case-study-box">
                              <div class="case-study-img">
                                   <img src="<?php echo e(asset('images/services/wax.jpeg')); ?>" alt="Waxing Service">
                                </div>
                               <div class="case-study-content">
                                    
                                    <h5>Waxing Services</h5> 
                                </div>
                            </div>  
                    </div>
                                     
                    </div>

        </div>
                </div>
            </section>
             <!-- gallery-area-end -->
           
			
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/frontend/gallery.blade.php ENDPATH**/ ?>