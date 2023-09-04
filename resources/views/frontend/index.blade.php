@extends('layouts.master')

@section('title', 'Homepage')
@section('description', 'Shina Real Estate HTML Template')

@section('css')
<link href="{{ asset('assets/plugins/revolution/css/settings.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="{{ asset('assets/plugins/revolution/css/layers.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="{{ asset('assets/plugins/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
<style type="text/css">
    .tp-fullwidth-forcer,
    #rev_slider_one_wrapper,
    #rev_slider_one{
        max-height: 700px !important;
    }
</style>
@endsection

@section('content')

@include('frontend.slider')

<!--Property Section-->
<section class="property-section">
	<div class="auto-container">
    	<!--Sec Title-->
        <div class="sec-title centered">
        	<div class="title">Our Featured Properties For Rent</div>
            <h2>Properties For Rent</h2>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">
        @foreach($data['properties'] as $properties)
        	<!--Property Block-->
            <div class="property-block col-md-4 col-sm-6 col-xs-12">
            	<div class="inner-box">
                    <a href="{{ route('propertydetail',encrypt($properties->id))}}">
                        @if(isset($properties['propertyimg']))
                    	<div class="image" style="background-image:url({{ asset($properties['propertyimg']['0']->img_src)}});">
                        @else
                        <div class="image" style="background-image:url({{ asset('property_img/room-sketch.jpg') }})">
                        @endif
                        	<!-- <a href="{{ route('propertydetail',encrypt($properties->id))}}"><img src="{{ asset($properties['propertyimg']['0']->img_src)}}" alt="" /></a> -->
                            <div class="sale">{{ $properties->tenant }}</div>
                            <div class="price">${{ min(array_filter([$properties->sb_price, $properties->db_price, $properties->tb_price, $properties->fb_price])) }} Onwards</div>
                        </div>
                    </a>
                    <label class="wishlist @foreach($wishlist as $wishlists) @if($wishlists->property_id == $properties->id) red-heart @endif @endforeach" id="wishlist{{$properties->id}}"><span class="fa fa-heart"><input class="" type="button" onclick="wishlist({{$properties->id}})"></span></label>
                    <div class="lower-content">
                    	<div class="upper-box">
                        	<h3><a href="{{ route('propertydetail',encrypt($properties->id))}}">{{ $properties->locality }}</a></h3>
                            <div class="location flow-ellipse">{{ $properties->full_address }}</div>
                            <div class="text">Room Types - {{ $properties->room_type }}</div>
                        </div>
                        <div class="lower-box clearfix">
                        	<div class="pull-left">
                            	<ul>
                                	<li><span class="icon flaticon-bed-1"></span>{{ $properties->sb_room_count+$properties->db_room_count+$properties->tb_room_count+$properties->fb_room_count}}</li>
                                    <li><span class="icon flaticon-bathtube-with-shower"></span>{{ $properties->sb_bathroom_count+$properties->db_bathroom_count+$properties->tb_bathroom_count+$properties->fb_bathroom_count}}</li>
                                    @if($properties->parking != NULL)
                                    <li><span class="icon flaticon-garage"> {{ $properties->parking}}</span></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="pull-right">
                            	<ul>
                                	<li>Listed by - {{ $properties['propertyuser']->username }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

<!--Team Section-->
<section class="team-section style-two pt-0">
	<div class="auto-container">
    	<!--Sec Title-->
        <div class="sec-title centered">
        	<div class="title">Meet Our Vendors</div>
            <h2>Our Best Vendors</h2>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">
            @foreach($data['vendors'] as $agent)
            <!--Team Block-->
            <div class="team-block col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="{{ route('vendordetail',encrypt($agent->id))}}">
                            @if( $agent->profile_pic != NULL)
                                <img src="{{ asset($agent->profile_pic)}}" alt="">
                            @else
                            <img src="{{ asset('profilepic/default.jpg')}}" alt="" />
                            @endif
                        </a>
                        <div class="social-box">
                            <p class="agent-properties"><a href="{{ route('vendordetail',encrypt($agent->id))}}">{{ count($agent['properties']) }} Properties</a></p>
                        </div>
                    </div>
                    <div class="lower-box">
                        <h3><a href="{{ route('vendordetail',encrypt($agent->id))}}">{{ $agent->first_name }}  {{ $agent->last_name}}</a></h3>
                        <div class="designation text-capitalize">{{ $agent->type }}</div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
</section>
<!--End Team Section-->

<!--End Property Section-->

<!--Testimonial Section-->
<!-- <section class="testimonial-section"> -->
	<!-- <div class="auto-container"> -->
    	<!-- Sec Title -->
        <!-- <div class="sec-title centered"> -->
            <!-- <div class="title">Testimonial</div> -->
            <!-- <h2>What Client Says</h2> -->
            <!-- <div class="separator"></div> -->
        <!-- </div> -->
        <!-- <div class="two-item-carousel owl-carousel owl-theme"> -->
            <!-- Testimonial Block Three -->
            <!-- @foreach($data['testimonial'] as $testimonial) -->
            <!-- <div class="testimonial-block-three"> -->
            	<!-- <div class="inner-box"> -->
                	<!-- <div class="text">{{ $testimonial->description }}</div> -->
                    <!-- <div class="author-info"> -->
                    	<!-- <div class="author-inner"> -->
                        	<!-- <div class="image"> -->
                            	<!-- <img src="{{ asset(''.$testimonial->img_path)}}" alt="" /> -->
                            <!-- </div> -->
                            <!-- <h3>{{ $testimonial->name }}</h3> -->
                            <!-- <div class="author-designation">{{ $testimonial->designation }}</div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
            <!-- @endforeach -->
        <!-- </div> -->
    <!-- </div> -->
<!-- </section> -->
<!--End Testimonial Section-->

@endsection

@section('js')

<!--Revolution Slider-->
<script src="{{ asset('assets/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{ asset('assets/js/main-slider-script.js')}}"></script>
@endsection