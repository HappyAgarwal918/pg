@extends('layouts.master')

@section('title', 'Saved Properties')
@section('description', 'Saved Properties')

@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('assets/images/background/6.png')}})">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>Wishlist</h1>
            </div>
            <div class="pull-right">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index')}}">Home</a></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

@if(!sizeof($wishlist))
<!--Property Section-->
<section class="property-section">
	<div class="auto-container">
    	<!--Sec Title-->
        <div class="sec-title centered">
            <h2>No Property saved yet</h2>
            <div class="separator"></div>
        </div>
</section>
@else
<!--Property Section-->
<section class="property-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="title">Our Featured Properties For Rent</div>
            <h2>Saved Properties</h2>
            <div class="separator"></div>
        </div>

        <div class="row clearfix">
            @include('frontend.property_data')
        </div>
</section>
@endif
@endsection