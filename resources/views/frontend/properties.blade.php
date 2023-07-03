@extends('layouts.master')

@section('title', 'Properties')
@section('description', 'Shina Real Estate HTML Template')

@section('content')

<!--Property Section-->
<section class="property-section">
	<div class="auto-container">
        @include('frontend.filter')
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