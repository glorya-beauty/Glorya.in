@extends('layouts.app')

@section('title', 'About Us - Glorya Beauty')
@section('description', 'Learn about Glorya Beauty - our journey, mission, and commitment to excellence in beauty services')

@section('content')
<!-- main-area -->
   <section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{ asset('images/testimonial/test-bg.png') }})">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>About Us</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About</li>
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
            <!-- about-area -->
            <section id="about" class="about-area about-p pt-100 pb-100 p-relative">
                <div class="container">
                    <div class="row align-items-center">
                         <div class="col-lg-6 col-md-12 col-sm-12 pr-30">
                            <div class="s-about-img p-relative  wow fadeInLeft  animated"   data-animation="fadeInLeft" data-delay=".4s">
                                <img src="{{ asset('images/features/about_img1.jpg') }}" alt="img">    
                            </div>
                          
                        </div>
                        
					<div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="about-content s-about-content  wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                                <div class="about-title second-atitle pb-45">   
                                    <h2>The Essence Of Beauty & Wellness In One Place</h2>   
                                    <div class="line mb-40"> <img src="{{ asset('images/bg/circle_right.png') }}" alt="circle_right"></div>
                                    
                                </div>
                                
                                <p>At Glorya, we believe that beauty is not just about looking good, but feeling confident and radiant from within. Our comprehensive range of beauty services is designed to enhance your natural beauty and provide you with a rejuvenating experience that goes beyond the ordinary.</p>
                                <p>Our expert team of beauty professionals is dedicated to providing personalized treatments that cater to your unique needs. From advanced skincare treatments to stunning makeup applications, we use only the finest products and latest techniques to ensure exceptional results.</p>
                                <div class="about-content3">
                                    <div class="row">
                                    <div class="col-md-6">
                                     <ul class="green">
                                                <li>Professional Makeup Services</li>            
                                                <li>Luxury Nail Art & Care</li>
                                                <li>Expert Hair Styling</li>
                                                <li>Wedding Beauty Packages</li>
                                                <li>Relaxing Spa Treatments</li>
                                            </ul>            
                                           </ul>
                                    </div>
                                    <div class="col-md-6">
                                     <ul class="green">
                                                <li>Premium Quality Products</li>
                                              <li>Expert Beauty Consultations</li>
                                                <li>Hygienic & Safe Environment</li>
                                                <li>Affordable Luxury Services</li>
                                                <li>Customer Satisfaction Guaranteed</li>
                                           </ul>
                                    </div>
                                    </div>
                                    
                                
                                </div>
                              
                               <div class="slider-btn mt-10">                                          
                                            <a href="{{ route('services') }}" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s"> Learn More</a>					
                                        </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </section>
            <!-- about-area-end -->
            <!-- team-area -->
            <section id="team" class="team-area pt-100 pb-70" style="background: #fff5f4;">             
                <div class="container">   
                    <div class="row">   
                        <div class="col-lg-12">
                            <div class="section-title center-align mb-50 text-center">
                                <h2>
                                  Our Team Members
                                </h2>
                                <span class="line5"> <img src="{{ asset('images/bg/circle_left.png') }}" alt="circle_left"></span>
                             
                            </div>
                           
                        </div>
                         
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="single-team text-center mb-30 ">
                                <div class="team-thumb">
                                  <div class="brd">
                                        <img src="{{ asset('images/team/team_img01.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-details.html">Anjali Verma</a></h4>
                                    <span>Head Beautician</span>
                                    <div class="team-social mt-20">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-team text-center mb-30 ">
                                <div class="team-thumb">
                                    <div class="brd">
                                        <img src="{{ asset('images/team/team_img02.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-details.html">Kavita Nair</a></h4>
                                    <span>Senior Makeup Artist</span>
                                  <div class="team-social mt-20">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-team text-center mb-30 ">
                                <div class="team-thumb">
                                     <div class="brd">
                                        <img src="{{ asset('images/team/team_img03.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-details.html">Rashmi Iyer</a></h4>
                                    <span>Expert Nail Artist</span>
                                    <div class="team-social mt-20">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>						
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="single-team text-center mb-30 ">
                                <div class="team-thumb">
                                     <div class="brd">
                                        <img src="{{ asset('images/team/team_img04.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-details.html">Pooja Reddy</a></h4>
                                    <span>Hair Stylist Expert</span>
                                    <div class="team-social mt-20">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- team-area-end --> 
             <!-- client-area -->
            <section id="client" class="about-area about-p pt-100 pb-100 p-relative">
                <div class="container">
                    <div class="row align-items-center">
                                                
					<div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="about-content s-about-content  wow fadeInUp  animated">
                                <div class="about-title second-atitle pb-40">    
                                    <h2>What We Have Achive In This Passed Years</h2>
                                    <span class="line"> <img src="{{ asset('images/bg/circle_right.png') }}" alt="circle_right"></span>
                                    <p>Aliquam eleifend eros eget blandit fringilla. Aliquam mattis leo ac risus ullamcorper maximus. In quis volutpat quam.</p>
                                </div>
                                <div class="row ab-coutner text-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-counter" style="background-image: url({{ asset('images/bg/count-bx-bg.png') }}); background-repeat: no-repeat;background-position: center bottom;">	
                                            <div class="counter p-relative">
                                                <span class="count">4871</span><small>+</small>                                   
                                            </div>
                                            <p>Happy Clients</p>                                
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                    <div class="single-counter mt-30" style="background-image: url({{ asset('images/bg/count-bx-bg.png') }}); background-repeat: no-repeat;background-position: center bottom;">	
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
                                <img src="{{ asset('images/bg/client-img10.jpeg') }}" alt="img">   
                                <div class="clinet-abimg"><img src="{{ asset('images/bg/happe-client-bg.png') }}" alt="img">  </div>
                            </div>
                          
                        </div>
                     
                    </div>
                </div>
            </section>
            <!-- client-area-end -->
		
@endsection
