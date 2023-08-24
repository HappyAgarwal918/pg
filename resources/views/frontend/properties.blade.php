@extends('layouts.master')

@section('title', 'Properties')
@section('description', 'Shina Real Estate HTML Template')

@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('assets/images/background/6.png')}})">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>Properties</h1>
            </div>
            <div class="pull-right">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index')}}">Home</a></li>
                    <li>Properties</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Property Section-->
<section class="property-section">
	<div class="auto-container">
    	<!--Sec Title-->
        <div class="sec-title centered">
        	<div class="title">Our Featured Properties For Rent</div>
            <h2>Properties For Rent</h2>
            <div class="separator"></div>
            <div class="position-absolute end-0">@include('frontend.sort')</div>
        </div>
        <div class="row clearfix" id="property">
            @include('frontend.property_data')
        </div>
    </div>
</section>

@endsection