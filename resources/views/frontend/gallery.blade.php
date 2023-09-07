@extends('layouts.master')

@section('title', 'Gallery | Happi To Help')
@section('description', 'Shina Real Estate HTML Template')

@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url({{asset('assets/images/background/6.png')}})">
	<div class="auto-container">
    	<div class="clearfix">
        	<div class="pull-left">
            	<h1>gallery Grid</h1>
            </div>
            <div class="pull-right">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index')}}">Home</a></li>
                    <li>gallery</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Gallery MixitUp Section-->
<section class="gallery-mixitup-section">
	<div class="auto-container">
        <!--MixitUp Galery-->
        <div class="mixitup-gallery">
            <!--Filter-->
            <div class="filters text-center clearfix">
            	<ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter="all">All</li>
                    <li class="filter" data-role="button" data-filter=".apartment">Apartments</li>
                    <li class="filter" data-role="button" data-filter=".loft">Loft</li>
                    <li class="filter" data-role="button" data-filter=".villas">Villas</li>
                    <li class="filter" data-role="button" data-filter=".home">Single home</li>
                </ul>
            </div>
            <div class="filter-list row clearfix">	
                <!--Default Portfolio Item-->
                <div class="default-portfolio-item mix all col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('assets/images/gallery/6.jpg')}}" alt=""></figure>
                        <!--Overlay Box-->
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="content">
                                    <a href="property-detail.html" class="link"><span class="fa fa-home"></span></a>
                                    <a href="{{asset('assets/images/gallery/6.jpg')}}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search-plus"></span></a>
                                    <h3><a href="property-detail.html">Apartments</a></h3>
                                    <div class="properties">5 Property</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Default Portfolio Item-->
                <div class="default-portfolio-item mix loft villas home all col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('assets/images/gallery/7.jpg')}}" alt=""></figure>
                        <!--Overlay Box-->
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="content">
                                    <a href="property-detail.html" class="link"><span class="fa fa-home"></span></a>
                                    <a href="{{asset('assets/images/gallery/7.jpg')}}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search-plus"></span></a>
                                    <h3><a href="property-detail.html">Apartments</a></h3>
                                    <div class="properties">5 Property</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Default Portfolio Item-->
                <div class="default-portfolio-item mix apartment villas all col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('assets/images/gallery/8.jpg')}}" alt=""></figure>
                        <!--Overlay Box-->
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="content">
                                    <a href="property-detail.html" class="link"><span class="fa fa-home"></span></a>
                                    <a href="{{asset('assets/images/gallery/8.jpg')}}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search-plus"></span></a>
                                    <h3><a href="property-detail.html">Apartments</a></h3>
                                    <div class="properties">5 Property</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
           	</div>            
        </div>        
        <!--Styled Pagination-->
        <ul class="styled-pagination text-center">
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="next"><a href="#">Next</a></li>
        </ul>                
        <!--End Styled Pagination-->
    </div>
</section>
<!--End Gallery MixitUp Section-->

@endsection
@section('js')
<script src="{{asset('assets/js/mixitup.js')}}"></script>
@endsection