@extends('layouts.master')

@section('title', 'Saved Properties')
@section('description', 'Saved Properties')

@section('content')


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
        <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div class="property-list">
						
                        <!--Property Block Three-->
                        @foreach($data as $wishlist)
                        <div class="property-block-three">
                            <div class="inner-box">
                            	<div class="row clearfix">
                                    <!--Image Column-->
                                    <div class="image-column col-md-6 col-sm-6 col-xs-12">
                                        <div class="image">
                                            <a href=""><img src="images/resource/property-11.jpg" alt="" /></a>
                                            <div class="sale">Sale</div>
                                            <div class="price">{{ min(array_filter([$wishlist->sb_price, $wishlist->db_price, $wishlist->tb_price, $wishlist->fb_price])) }}  onwards</div>
                                        </div>
                                    </div>
                                    <!--Content Column-->
                                    <div class="content-column col-md-6 col-sm-6 col-xs-12">
                                        <div class="inner-column">
                                            <h3><a href="">{{ $wishlist->name}}</a></h3>
                                            <div class="location">{{ $wishlist->full_address}}</div>
                                            <div class="text">Room Type-  {{$wishlist->room_type}} </div>
                                            <div class="lower-box clearfix">
                                                <div class="pull-left">
                                                    <ul>
                                                        <li><span class="icon flaticon-bed-1"></span>{{ $wishlist->sb_room_count+$wishlist->db_room_count+$wishlist->tb_room_count+$wishlist->fb_room_count}}</li>
                                                        <li><span class="icon flaticon-bathtube-with-shower"></span>{{ $wishlist->sb_bathroom_count+$wishlist->db_bathroom_count+$wishlist->tb_bathroom_count+$wishlist->fb_bathroom_count}}</li>
                                                        @if($wishlist->parking != NULL)
                                                        <li><span class="icon flaticon-garage"></span>{{ $wishlist->parking}}</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="pull-right">
                                                    <ul>
                                                        <li>Listed by -</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                         
                        <!--Styled Pagination-->
                        <ul class="styled-pagination">
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">Next</a></li>
                        </ul>                
                        <!--End Styled Pagination-->
                        
                    </div>
                </div>
        </div>
</section>
@endsection