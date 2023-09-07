@extends('layouts.master')

@section('title', 'About Us | Happi To Help')
@section('description', 'About Us')

@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('assets/images/background/6.png')}})">
	<div class="auto-container">
    	<div class="clearfix">
        	<div class="pull-left">
            	<h1>About Us</h1>
            </div>
            <div class="pull-right">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index')}}">Home</a></li>
                    <li>About us</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--About Section-->
<section class="about-section" style="background-image:url({{ asset('assets/images/background/7.jpg')}})">
	<div class="auto-container">
    	<div class="row clearfix">
            <!--Content Column-->
            <div class="content-column col-md-12 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="bold-text text-center fs-3">We simplify the Rental process and make it easy to find a place you can call home.</div>
                    <div class="text text-center"><p>{{ env('APP_NAME')}} aims to connect tenants with their perfect rental property and provide brokers with a platform to showcase their services.</p></div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
            	<div class="inner-column">
                	<!--Sec Title-->
                    <div class="sec-title">
                        <div class="title">About {{ env('APP_NAME')}}</div>
                        <h2>Who We Are</h2>
                        <div class="separator"></div>
                    </div>
                    
                    <div class="text">
                    	<p>We offer a seamless and user-friendly experience to tenants looking for rental properties. We understand that finding the right property can be a daunting task, and that's why we provide all the necessary information to make informed decisions.</p>
                        <p>Additionally, for the brokers, we offer a platform to register and showcase their services. We provide brokers with targeted audience so they can connect tenants easily.</p>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-md-6 col-sm-12 col-xs-12">
            	<div class="image">
                	<img src="{{ asset('assets/images/resource/about-new.jpg')}}" alt="" />
                </div>
            </div>
            
        </div>
    </div>
</section>
<!--End About Section-->

<!--Services Section-->
<section class="services-section style-two grey-bg">
	<div class="auto-container">
    	<!--Sec Title-->
        <div class="sec-title centered">
        	<div class="title">We are Offering the Best Rental Properties</div>
            <h2>How It Works</h2>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">
            <!--Services Block-->
            <div class="services-block col-md-4 col-sm-6 col-xs-12" title="Tenants have to register on the website by creating a profile and providing their basic information and preferred location for a rental property. Tenants can then browse the available rental properties on the website using various search criteria like location, property type, price range, and other features.">
            	<div class="inner-box">
                	<div class="icon-box">
                    	<span class="icon flaticon-house-2"></span>
                    </div>
                    <h3><a href="property-detail.html">Find Properties</a></h3>
                </div>
            </div>
            <!--Services Block-->
            <div class="services-block col-md-4 col-sm-6 col-xs-12" title="The website will list rental properties with details like location, size, amenities, photos, and rent. We use an automated process to manage the listings, which will be regularly updated based on the availability of the rental properties.">
            	<div class="inner-box">
                	<div class="icon-box">
                    	<span class="icon flaticon-hand-shake"></span>
                    </div>
                    <h3><a href="property-detail.html">Property Listings</a></h3>
                </div>
            </div>            
            <!--Services Block-->
            <div class="services-block col-md-4 col-sm-6 col-xs-12" title="Brokers can also register on the website by creating a profile and providing their basic information and expertise in rental property management. Registered brokers can list their rental properties on the website with all the necessary details. This feature helps increase the number of rental properties on the website.">
            	<div class="inner-box">
                	<div class="icon-box">
                    	<span class="icon flaticon-analytics"></span>
                    </div>
                    <h3><a href="property-detail.html">Broker Listings</a></h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Services Section-->

<!--Clients Section-->
<!-- <section class="clients-section style-two">
    <div class="auto-container">
        <div class="sponsors-outer">
            <ul class="sponsors-carousel owl-carousel owl-theme">
                @foreach($data['sponser'] as $sponser)
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ asset($sponser->path)}}" alt="" title="{{ $sponser->name }}"></a></figure></li>
                @endforeach
            </ul>
        </div>
    </div>
</section> -->
<!--End Clients Section-->
@endsection