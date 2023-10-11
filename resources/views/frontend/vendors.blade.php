@extends('layouts.master')

@section('title', 'Our Trusted Vendors for Top-Quality Products and Services | Happi to Help')
@section('description', 'Shina Real Estate HTML Template')

@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('assets/images/background/6.png')}})">
	<div class="auto-container">
    	<div class="clearfix">
        	<div class="pull-left">
            	<h1>Our Vendors</h1>
            </div>
            <div class="pull-right">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index')}}">Home</a></li>
                    <li>Vendors</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Team Section-->
<section class="team-section style-two">
	<div class="auto-container">
    	<!--Sec Title-->
        <div class="sec-title centered">
        	<div class="title">Meet Our Vendors</div>
            <h2>Our Best Vendors</h2>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">
            @foreach($data as $agent)
            <!--Team Block-->
            <div class="team-block col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="{{ route('vendordetail',encrypt($agent->id))}}">
                            @if( $agent->profile_pic != NULL)
                                <img src="{{ asset($agent->profile_pic)}}" alt="">
                            @elseif($agent->profile_pic == NULL && $agent->gender == "Male")
                            <img src="{{ asset('profilepic/defaultmale.jpg')}}">
                            @elseif($agent->profile_pic == NULL && $agent->gender == "Female")
                            <img src="{{ asset('profilepic/defaultfemale.jpg')}}">
                            @else($agent->profile_pic == NULL && $agent->gender == "Other")
                            <img src="{{ asset('profilepic/default.jpg')}}">
                            @endif
                        </a>
                        <div class="social-box">
                            <p class="agent-properties"><a href="{{ route('vendordetail',encrypt($agent->id))}}">{{ count($agent['properties']) }} Properties</a></p>
                        </div>
                    </div>
                    <div class="lower-box">
                        <h3><a href="{{ route('vendordetail',encrypt($agent->id))}}">{{ $agent->username }}</a></h3>
                        <div class="designation">{{ $agent->first_name }}</div>
                        
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
</section>
<!--End Team Section-->

@endsection