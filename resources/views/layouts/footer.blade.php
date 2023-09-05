<!--Footer Style Two-->
<footer class="footer-style-two">
	<div class="auto-container">
    	<!--Upper Box-->
        <div class="upper-box d-none">
        	<div class="row clearfix">
                <!--Logo Column-->
                <div class="logo-column col-lg-3 col-md-3 col-sm-12 col-xs-12 align-self-end">
                	<div class="logo">
                    	<a href="{{ route('index')}}"><img src="{{ asset($frontend['logo'][0]->path)}}" alt="" style="max-height:70px " /></a>
                    </div>
                </div>
                <!--form Column-->
                <div class="form-column col-lg-4 col-md-3 col-sm-4 col-xs-12">
                	<form method="post" action="{{ route('mailchimp')}}">
                        @csrf
                        <div class="form-group clearfix">
                            <input type="email" name="email" value="" placeholder="Enter Your Email" required>
                            <button type="submit" class="theme-btn"><span class="fa fa-send"></span></button>
                        </div>
                    </form>
                </div>
                <!--Social Column-->
                <div class="social-column col-lg-5 col-md-6 col-sm-8 col-xs-12">
                	<ul class="social-icon-two">
                        
                    </ul>
                </div>
            </div>
        </div>
    	<!--Widgets Section-->
        <div class="widgets-section">
        	<div class="row clearfix">
                <!--Footer Column-->
                <div class="footer-column col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <div class="logo">
                        <a href="{{ route('index')}}"><img src="{{ asset($frontend['logo'][0]->path)}}" alt="" style="max-height:100px " /></a>
                    </div>
                </div>
            	<!--Footer Column-->
                <div class="footer-column col-xl-4 col-lg-4 col-md-6 col-sm-9 col-xs-12">
                    <div class="footer-widget touch-widget">
                    	<h2>Get In Touch</h2>
                        <div class="text">{{$frontend['footer']->about}}</div>
					</div>
                </div>
                <!--Footer Column-->
                <div class="footer-column col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xs-12">
                <!-- <div class="footer-column col-xl-3 col-md-4 col-sm-12 col-xs-12 offset-md-1 offset-sm-0"> -->
                    <div class="footer-widget links-widget">
                    	<h2>links</h2>
                        <ul class="links">
                            @foreach($frontend['footerlinks'] as $menu)
                        	<li><a href="{{ route($menu->route)}}">{{ $menu->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--Footer Column-->
                <div class="footer-column col-xl-4 col-lg-4 col-md-6 col-sm-8 col-xs-12">
                    <div class="footer-widget links-widget">
                    	<h2>Contact info</h2>
                        <ul class="list-style-one style-two contact-links">
                            <!-- @if(isset($frontend['footer']->phone) && $frontend['footer']->phone != NULL)
                            <li><span class="icon fa fa-phone"></span>Call us <a href="tel:{{$frontend['footer']->phone}}">{{$frontend['footer']->phone}}</a></li>
                            @endif -->
                            @if(isset($frontend['footer']->email) && $frontend['footer']->email != NULL)
                            <li><span class="icon fa fa-envelope-o"></span><a href="mailto:{{$frontend['footer']->email}}">{{$frontend['footer']->email}}</a></li>
                            @endif
                            <!-- @if(isset($frontend['footer']->address) && $frontend['footer']->address != NULL)
                            <li><span class="icon fa fa-clock-o"></span>{{$frontend['footer']->address}}</li> -->
                            @endif
                            <li class="p-0">Newsletter</li>
                            <li class="p-0">
                                <!--form Column-->
                                <div class="form-column">
                                    <form method="post" action="{{ route('mailchimp')}}">
                                        @csrf
                                        <div class="form-group clearfix">
                                            <input type="email" name="email" value="" placeholder="Enter Your Email" required>
                                            <button type="submit" class="theme-btn"><span class="fa fa-send"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="p-0">
                                <ul class="social-icon-two">
                                @if(isset($frontend['footer']->facebook) && $frontend['footer']->facebook != NULL)
                                    <li class="p-0"><a href="{{ $frontend['footer']->facebook }}"><span class="fa fa-facebook"></span></a></li>
                                    @endif
                                    @if(isset($frontend['footer']->twitter) && $frontend['footer']->twitter != NULL)
                                    <li class="p-0"><a href="{{ $frontend['footer']->twitter }}"><span class="fa fa-twitter"></span></a></li>
                                    @endif
                                    @if(isset($frontend['footer']->linkedin) && $frontend['footer']->linkedin != NULL)
                                    <li class="p-0"><a href="{{ $frontend['footer']->linkedin }}"><span class="fa fa-linkedin"></span></a></li>
                                    @endif
                                    @if(isset($frontend['footer']->pinterest) && $frontend['footer']->pinterest != NULL)
                                    <li class="p-0"><a href="{{ $frontend['footer']->pinterest }}"><span class="fa fa-pinterest-p"></span></a></li>
                                    @endif
                                    @if(isset($frontend['footer']->dribbble) && $frontend['footer']->dribbble != NULL)
                                    <li class="p-0"><a href="{{ $frontend['footer']->dribbble }}"><span class="fa fa-dribbble"></span></a></li>
                                    @endif
                                    @if(isset($frontend['footer']->instagram) && $frontend['footer']->instagram != NULL)
                                    <li class="p-0"><a href="{{ $frontend['footer']->instagram }}"><span class="fa fa-instagram"></span></a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer Bottom-->
    <div class="footer-bottom">
    	<div class="copyright">&copy; Copyright 2023 All rights reserved – Design & Developed By Happy Agarwal with <i class="fa fa-heart text-danger"></i></div>
    </div>
</footer>
<!--End Main Footer-->