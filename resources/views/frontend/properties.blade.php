@extends('layouts.master')

@section('title', 'Best PG’s  on Rent in Chandigarh | Happi To Help')
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

<!--Filter Section-->
<section class="filter-section d-none">
    <div class="auto-container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="property-form-widget mb-0">
                <div class="inner-widget">
                    <div class="property-search-form">
                        <form method="post" action="blog.html">
                            <div class="row clearfix">
                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                    <label class="field-label">Room Type</label>
                                    <select class="custom-select-box">
                                        <option>Any</option>
                                        <option value="">1 Bed</option>
                                        <option value="">2 Bed</option>
                                        <option value="">3 Bed</option>
                                        <option value="">4 Bed</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                    <label class="field-label">Food Avaibilty</label>
                                    <select class="custom-select-box">
                                        <option>Any</option>
                                        <option value="">With Food</option>
                                        <option value="">Without Food</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                    <label class="field-label">Amenities</label>
                                    <select class="custom-select-box">
                                        <option>Any</option>
                                        <option>New York</option>
                                        <option>California</option>
                                        <option>Chicago</option>
                                        <option>Melborne</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                    <label class="field-label">Tenants</label>
                                    <select class="custom-select-box">
                                        <option value="">Select any one</option>
                                        @foreach($tenants as $tenant)
                                        <option value="{{$tenant->value}}">{{$tenant->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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