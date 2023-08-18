@extends('layouts.master')

@section('title', 'Contact Us')
@section('description', 'Shina Real Estate HTML Template')

@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('assets/images/background/6.png')}})">
	<div class="auto-container">
    	<div class="clearfix">
        	<div class="pull-left">
            	<h1>Contact us</h1>
            </div>
            <div class="pull-right">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home')}}">Home</a></li>
                    <li>Contact us</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Contact Page Section-->
<section class="contact-page-section">
	<div class="auto-container">
    	<!--Sec Title-->
        <div class="sec-title centered">
        	<div class="title">Get in Touch</div>
            <h2>Contact Form</h2>
            <div class="separator"></div>
        </div>
		
        <!--Contact Form-->
        <div class="contact-form">
            <form method="post" action="{{ route('contact-save')}}" id="contact-form">
                @csrf
                <div class="row clearfix">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="name" value="" placeholder="Name" required>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="email" name="email" value="" placeholder="Email" required>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="subject" value="" placeholder="Subject" required>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="phone_number" value="" placeholder="Phone No." required>
                    </div>
                    
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <textarea name="message" placeholder="Massage"></textarea>
                    </div>
                    
                    <div class="form-group text-center col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn-style-three">Send Now <span class="icon flaticon-send-message-button"></span></button>
                    </div>                                        
                </div>
            </form>
        </div>
        <!--End Contact Form-->
    </div>
</section>
<!--End Contact Page Section-->

<!--Clients Section-->
<section class="clients-section grey-bg">
    <div class="auto-container">
        
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                @foreach($data['sponser'] as $sponser)
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ asset($sponser->path)}}" alt="" title="{{ $sponser->name }}"></a></figure></li>
                @endforeach
            </ul>
        </div>
        
    </div>
</section>
<!--End Clients Section-->

<!--Map Section-->
<section class="map-section">
	<!--Map Outer-->
    <div class="map-outer">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d214.38687338974862!2d76.70948258665899!3d30.71305929465336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fef17f948bd0f%3A0x1af43c10783161a0!2sTheFuenix%20%7C%20Best%20Digital%20Marketing%20Company%20in%20Mohali!5e0!3m2!1sen!2sin!4v1672817689583!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<!--End Map Section-->

@endsection