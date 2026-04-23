@extends('layouts.app')

@section('title', 'Contact - Glorya Beauty')
@section('description', 'Get in touch with Glorya Beauty - book appointments, ask questions, or visit our salon')

@section('content')
 <!-- breadcrumb-area -->
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{ asset('images/testimonial/test-bg.png') }})">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>Contact Us</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
                                <span class="line5"> <img src="{{ asset('images/bg/circle_left.png') }}" alt="circle_left"></span>
                            </div>
                           
                        </div>
                         
                    </div>
                    <div class="row">
                         <div class="col-lg-4 col-md-12">
                             
                          <div class="services-box text-center">
                              <div class="services-icon">
                                   <img src="{{ asset('images/icon/cn-icon1.png') }}" alt="icon01">
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
                                   <img src="{{ asset('images/icon/cn-icon2.png') }}" alt="icon01">
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
                                   <img src="{{ asset('images/icon/cn-icon3.png') }}" alt="icon01">
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
            <section id="contact" class="contact-area contact-bg pt-100 pb-100 p-relative fix" style="background-image:url({{ asset('images/bg/contact-bg.png') }})">
                <div class="contact-bg-an-01"><img src="{{ asset('images/bg/contact-bg-an-01.png') }}" alt="contact-bg-an-01"></div>
                <div class="contact-bg-an-02"><img src="{{ asset('images/bg/contact-bg-an-02.png') }}" alt="contact-bg-an-01"></div>
                <div class="container">
             
					<div class="row align-items-center">
						<div class="col-lg-6">
                            <div class="contact-bg02 wow fadeInLeft  animated">
                            
							<form action="{{ route('contact.submit') }}" method="post" class="contact-form" id="contact-form">
							@csrf
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
                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
                                </div>
                                
                                <div class="slider-btn">                                          
    <button class="btn ss-btn active" data-animation="fadeInRight" data-delay=".8s"> Submit Now</button>				
</div>                             
                            </div>
                            </div>
                        
                    </form>
                            
							<!-- Ajax Response Message -->
							<div class="ajax-response mt-3"></div>
							
                            </div>
                        
						</div>
                         <div class="col-lg-6">
                           <div class="about-content s-about-content wow fadeInRight  animated">
                                <div class="about-title second-atitle pb-20">            
                                                         
                                    <h2>
                                        Contact Form 
                                    </h2>   
                                 </div>
                                <p>Get in touch with us and let’s bring effortless beauty and wellness closer to you. Our contact form is designed to make connecting with us simple, quick, and convenient. Whether you’re looking to book a luxury salon service at home, have questions about our offerings, or want to partner with us as a service professional, we’re just a message away.</p>
<p>Fill out the form with your basic details and share your requirements or queries, and our team will respond promptly. We value your time and ensure that every message is handled with care and attention. From service-related inquiries and appointment support to feedback and collaboration opportunities, we’re here to listen and assist.</p>
                                
                                
                            </div>
                        </div>
                        
					</div>
                    
                </div>
               
            </section>
            <!-- contact-area-end -->
       
           
@endsection

@push('styles')
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
@endpush
