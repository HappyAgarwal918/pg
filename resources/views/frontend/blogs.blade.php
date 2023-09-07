@extends('layouts.master')

@section('title', 'Blogs | Happi To Help')
@section('description', 'Shina Real Estate HTML Template')

@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('assets/images/background/6.png')}})">
	<div class="auto-container">
    	<div class="clearfix">
        	<div class="pull-left">
            	<h1>Blog grid</h1>
            </div>
            <div class="pull-right">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index')}}">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Blog Grid Section-->
<section class="blog-grid-section">
	<section class="auto-container">
    	<div class="row clearfix">
        	
            <!--News Block Three-->
            <div class="news-block-three col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <!--Image-->
                    <div class="image">
                        <a href="#"><img src="{{ asset('assets/images/resource/news-5.jpg')}}" alt="" /></a>
                    </div>
                    <!--Lower Column-->
                    <div class="lower-content">
                        <h3><a href="#">Resources that we thought you may find useful</a></h3>
                        <div class="text">Alternatively if you have a specific service or questio in mind please don’t ...</div>
                        <ul class="post-meta">
                            <li><span class="icon fa fa-user-md"></span>Rento Admin</li>
                            <li><span class="icon fa fa-calendar-check-o"></span>21 Feb, 2018</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!--News Block Three-->
            <div class="news-block-three col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <!--Image-->
                    <div class="image">
                        <a href="#"><img src="{{ asset('assets/images/resource/news-6.jpg')}}" alt="" /></a>
                    </div>
                    <!--Lower Column-->
                    <div class="lower-content">
                        <h3><a href="#">An old convent turned luxury turned luxury home</a></h3>
                        <div class="text">Alternatively if you have a specific service or questio in mind please don’t ...</div>
                        <ul class="post-meta">
                            <li><span class="icon fa fa-user-md"></span>Rizwan Habib</li>
                            <li><span class="icon fa fa-calendar-check-o"></span>21 Oct, 2017</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!--News Block Three-->
            <div class="news-block-three col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <!--Image-->
                    <div class="image">
                        <a href="#"><img src="{{ asset('assets/images/resource/news-7.jpg')}}" alt="" /></a>
                    </div>
                    <!--Lower Column-->
                    <div class="lower-content">
                        <h3><a href="#">Learn the truth about Real Estate industry</a></h3>
                        <div class="text">Alternatively if you have a specific service or questio in mind please don’t ...</div>
                        <ul class="post-meta">
                            <li><span class="icon fa fa-user-md"></span>Rizwan Shaa</li>
                            <li><span class="icon fa fa-calendar-check-o"></span>22 Jan, 2018</li>
                        </ul>
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
        
    </section>
</section>
<!--End Blog Grid Section-->
<!--Clients Section-->
<section class="clients-section style-two">
    <div class="auto-container">
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                @foreach($data['sponser'] as $sponser)
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ asset(''.$sponser->path)}}" alt="" title="{{ $sponser->name }}"></a></figure></li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!--End Clients Section-->
@endsection