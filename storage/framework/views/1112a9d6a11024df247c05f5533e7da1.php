

<?php $__env->startSection('title', 'Contact - Glorya Beauty'); ?>
<?php $__env->startSection('description', 'Get in touch with Glorya Beauty - book appointments, ask questions, or visit our salon'); ?>

<?php $__env->startSection('content'); ?>
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
                                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
            
             <!-- services-area -->          
            <section id="services" class="services-area pt-100 pb-70 fix">
                <div class="container">
                    <div class="row">   
                        <div class="col-lg-12">
                            <div class="section-title center-align mb-50 text-center">
                                <h2>
                                  Get In Touch With Us
                                </h2>
                                <p>We're here to help you look and feel your best. Reach out to us for appointments, inquiries, or any beauty-related questions you may have.</p>
                                <span class="line5"> <img src="<?php echo e(asset('images/bg/circle_left.png')); ?>" alt="circle_left"></span>
                            </div>
                           
                        </div>
                         
                    </div>
                    <div class="row">
                         <div class="col-lg-4 col-md-12">
                             
                          <div class="services-box text-center">
                              <div class="services-icon">
                                   <img src="<?php echo e(asset('images/icon/cn-icon1.png')); ?>" alt="icon01">
                                </div>
                               <div class="services-content2">
                                    <h5>Email Address</h5>   
                                    <p>glorya.beauty.service@gmail.com</p>
                                    <p>Send us an email for appointments, inquiries, or feedback. We'll respond within 24 hours.</p>
                                     
                                </div>
                            </div>   
                             
                         
                        </div>
                        <div class="col-lg-4 col-md-12">
                             
                          <div class="services-box text-center">
                              <div class="services-icon">
                                   <img src="<?php echo e(asset('images/icon/cn-icon2.png')); ?>" alt="icon01">
                                </div>
                               <div class="services-content2">
                                    <h5>Phone Number</h5>   
                                     <p>01141767035</p>
                                     <p>Call us for immediate assistance, appointment booking, or urgent beauty service needs. Available during business hours.</p>
                                     
                                </div>
                            </div>   
                             
                         
                        </div>
                        <div class="col-lg-4 col-md-12">
                             
                          <div class="services-box text-center">
                              <div class="services-icon">
                                   <img src="<?php echo e(asset('images/icon/cn-icon3.png')); ?>" alt="icon01">
                                </div>
                               <div class="services-content2">
                                    <h5>Office Address</h5>   
                                    <p>B-3/410, First Floor, Tara Nagar,<br>Old Palam Road, Kakrola, Dwarka - 110078</p>
                                    <p>Visit our beauty studio for personalized consultations and treatments. We're conveniently located in Dwarka with easy accessibility.</p>
                                    
                                </div>
                            </div>   
                             
                         
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- services-area-end -->
			 <!-- contact-area -->
            <section id="contact" class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url(<?php echo e(asset('images/bg/contact-bg.png')); ?>)">
             <div style="width: 100%"><iframe  frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  style="height:500px;width:100%;" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=B-3/410,%20First%20Floor,%20Tara%20Nagar,%20Old%20Palam%20Road,%20Kakrola,%20Dwarka%20-%20110078+(Glorya)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.mapsdirections.info/pl/mapa-populacji/"></a></iframe></div>  
            </section>
            <!-- contact-area-end -->
       
           
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.ajax-response {
    padding: 15px;
    border-radius: 8px;
    margin-top: 20px;
    font-weight: 500;
    text-align: center;
    transition: all 0.3s ease;
}

.ajax-response.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    box-shadow: 0 2px 10px rgba(40, 167, 69, 0.2);
}

.ajax-response.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    box-shadow: 0 2px 10px rgba(220, 53, 69, 0.2);
}

.ajax-response.success:hover {
    background-color: #c3e6cb;
    transform: translateY(-2px);
}

.ajax-response.error:hover {
    background-color: #f5c6cb;
    transform: translateY(-2px);
}
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/frontend/contact.blade.php ENDPATH**/ ?>