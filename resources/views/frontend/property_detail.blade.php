@extends('layouts.master')

@section('title', 'Properties')
@section('description', 'Shina Real Estate HTML Template')

@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('assets/images/background/6.png')}})">
	<div class="auto-container">
    	<div class="clearfix">
        	<div class="pull-left">
            	<h1>Property Detail</h1>
            </div>
            <div class="pull-right">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home')}}">Home</a></li>
                    <li>Property Detail</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Sidebar Page Container-->
<div class="sidebar-page-container">
	<div class="auto-container">
    	<div class="row clearfix">
            <!--Content Side / Property Detail-->
            <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
            	<div class="property-detail">
					<div class="inner-box">
                    	<!--Upper Box-->
                        <div class="upper-box text-capitalize">
                        	<h2>{{ $data->name }}</h2>
                            <div class="location">{{ $data->locality }}</div>
                            <ul class="post-detail">
                                <li><span class="icon fa fa-calendar"></span>{{ Carbon\Carbon::parse($data->created_at)->format('M d, Y') }}</li>
                                <li><span class="icon fa fa-map-marker"></span>{{ $data->full_address}}</li>
                            </ul>
                        </div>
                        
                        <!--Carousel Box-->
                        <div class="carousel-box">
                        	<div class="property-single-carousel owl-carousel owl-theme">
                            	<div class="slide">
                                    <div class="image">
                                        <img src="{{ asset('assets/images/resource/property-19.jpg')}}" alt="" />
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="image">
                                        <img src="{{ asset('assets/images/resource/property-19.jpg')}}" alt="" />
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="image">
                                        <img src="{{ asset('assets/images/resource/property-19.jpg')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Desciption -->
                        <h3>Property Detail</h3>
                        <div class="text text-capitalize">
                            <p> {{ $data->description }}</p>

                            @if(in_array('single', $data['room_type']))
                            <div class="property-info-box property-card-detail">
                            <span style="font-size: 30px; font-weight: 700; color: #000; z-index: 99;position: relative;">Single Room Details</span>
                                <div class="inner property-card">
                                    <ul>
                                        <li><span class="icon fa fa-bed"></span><strong>{{ $data->sb_room_count}}</strong>room</li>
                                        <li><span class="icon fa flaticon-vintage-bathtub"></span><strong>{{ $data->sb_bathroom_count}}</strong>bath</li>
                                        <li><span class="icon fa fa-arrows"></span><strong>{{$data->sb_room_size}}</strong>SQ.FT</li>
                                        <li><span class="icon fa fa-money"></span><strong>{{ $data->sb_price}}</strong>deposit</li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            @if(in_array('double', $data['room_type']))
                            <div class="property-info-box property-card-detail">
                            <span style="font-size: 30px; font-weight: 700; color: #000; z-index: 99;position: relative;">Double Room Details</span>
                                <div class="inner property-card">
                                    <ul>
                                        <li><span class="icon fa fa-bed"></span><strong>{{ $data->db_room_count}}</strong>room</li>
                                        <li><span class="icon fa flaticon-vintage-bathtub"></span><strong>{{ $data->db_bathroom_count}}</strong>bath</li>
                                        <li><span class="icon fa fa-arrows"></span><strong>{{$data->db_room_size}}</strong>SQ.FT</li>
                                        <li><span class="icon fa fa-money"></span><strong>{{ $data->db_price}}</strong>deposit</li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            @if(in_array('triple', $data['room_type']))
                            
                            <div class="property-info-box property-card-detail">
                            <span style="font-size: 30px; font-weight: 700; color: #000; z-index: 99;position: relative;">Triple Room Details</span>
                                <div class="inner property-card">
                                    <ul>
                                        <li><span class="icon fa fa-bed"></span><strong>{{ $data->tb_room_count}}</strong>room</li>
                                        <li><span class="icon fa flaticon-vintage-bathtub"></span><strong>{{ $data->tb_bathroom_count}}</strong>bath</li>
                                        <li><span class="icon fa fa-arrows"></span><strong>{{$data->tb_room_size}}</strong>SQ.FT</li>
                                        <li><span class="icon fa fa-money"></span><strong>{{ $data->tb_price}}</strong>deposit</li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            @if(in_array('four', $data['room_type']))
                            <div class="property-info-box property-card-detail">
                            <span style="font-size: 30px; font-weight: 700; color: #000; z-index: 99;position: relative;">Fourbed Room Details</span>
                                <div class="inner property-card">
                                    <ul>
                                        <li><span class="icon fa fa-bed"></span><strong>{{ $data->fb_room_count}}</strong>room</li>
                                        <li><span class="icon fa flaticon-vintage-bathtub"></span><strong>{{ $data->fb_bathroom_count}}</strong>bath</li>
                                        <li><span class="icon fa fa-arrows"></span><strong>{{$data->fb_room_size}}</strong>SQ.FT</li>
                                        <li><span class="icon fa fa-money"></span><strong>{{ $data->fb_price}}</strong>deposit</li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>

                        <h4>Common Amenities</h4>
                        <!--List Columns-->
                        <div class="list-columns">
                            <div class="row clearfix">
                                @foreach($data['amenities'] as $key => $value)
                                <div class="column col-md-6 col-sm-6 col-xs-12">
                                    <ul class="list-style-three text-capitalize">
                                        <li> {{ $value }}: Available</li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Property Desciption end -->                        
                    </div>
                </div>
            </div>
            
            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
            	<aside class="sidebar margin-top-sidebar">
                    <!-- Properties Posts -->
                    <div class="sidebar-widget properties-posts">
                        <div class="sidebar-title">
                        	<h3>Similar Properties</h3>
                            <div class="separator"></div>
                        </div>

                        <article class="post">
                        	<figure class="post-thumb"><a href="#"><img src="{{ asset('assets/images/resource/post-thumb-3.jpg')}}" alt=""></a></figure>
                            <h4><a href="#">401 Biscayne Boulevard</a></h4>
                            <div class="address">Unit 4/Street 14 Indus Street </div>
                            <div class="post-info">Price: 11,412</div>
                        </article>
                        
                        <article class="post">
                        	<figure class="post-thumb"><a href="#"><img src="{{ asset('assets/images/resource/post-thumb-4.jpg')}}" alt=""></a></figure>
                            <h4><a href="#">10 Romain St, Twin Peaks</a></h4>
                            <div class="address">Unit 4/Street 14 Indus Street </div>
                            <div class="post-info">Price: 11,412</div>
                        </article>
                        
                        <article class="post">
                        	<figure class="post-thumb"><a href="#"><img src="{{ asset('assets/images/resource/post-thumb-5.jpg')}}" alt=""></a></figure>
                            <h4><a href="#">Gorgeous Farm in Myrtle</a></h4>
                            <div class="address">Unit 4/Street 14 Indus Street </div>
                            <div class="post-info">Price: 11,412</div>
                        </article>
                    </div> 
                    <div class="sidebar-widget properties-posts">
                        <!--Property Map Section-->
                        <div class="sidebar-title">
                            <h3>Map View</h3>
                            <div class="separator"></div>
                        </div>
                        <div class="property-map-section">
                            <!--Map Outer-->
                            <div class="map-outer">
                                <!--Map Canvas-->
                                <div class="map-canvas"
                                    data-zoom="12"
                                    data-lat="-37.817085"
                                    data-lng="144.955631"
                                    data-type="roadmap"
                                    data-hue="#ffc400"
                                    data-title="Envato"
                                    data-icon-path="{{ asset('assets/images/icons/map-marker.png')}}"
                                    data-content="Melbourne VIC 3000, Australia<br><a href=''>info@youremail.com</a>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Default Form-->
                    <div class="default-form style-two">
                        <form method="post" action="contact.html">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="username" value="" placeholder="Full Name" required>
                                </div>
                                
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="email" value="" placeholder="Email Address" required>
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <textarea name="message" placeholder="Massage"></textarea>
                                </div>
                                
                                <div class="form-group text-right col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="theme-btn btn-style-three">Send Now <span class="icon fa fa-edit"></span></button>
                                </div>                                        
                            </div>
                        </form>
                    </div>
                    <!--End Default Form-->
                </aside>
            </div>
            <!--End Sidebar Side-->
        </div>
    </div>
</div>
<!--End Sidebar Page Container-->

@endsection