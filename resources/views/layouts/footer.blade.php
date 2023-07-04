<!--Footer Style Two-->
<footer class="footer-style-two">
	<div class="auto-container">
    	<!--Upper Box-->
        <div class="upper-box">
        	<div class="row clearfix">
                <!--Logo Column-->
                <div class="logo-column col-lg-3 col-md-3 col-sm-12 col-xs-12 align-self-end">
                	<div class="logo">
                    	<a href="{{ route('index')}}"><img src="{{ asset($frontend['logo'][0]->path)}}" alt="" /></a>
                    </div>
                </div>
                <!--form Column-->
                <div class="form-column col-lg-4 col-md-3 col-sm-4 col-xs-12">
                	<form method="post" action="contact.html">
                        <div class="form-group clearfix">
                            <input type="email" name="email" value="" placeholder="Enter Your Email" required>
                            <button type="submit" class="theme-btn"><span class="fa fa-send"></span></button>
                        </div>
                    </form>
                </div>
                <!--Social Column-->
                <div class="social-column col-lg-5 col-md-6 col-sm-8 col-xs-12">
                	<ul class="social-icon-two">
                        @if(isset($frontend['footer']->facebook) && $frontend['footer']->facebook != NULL)
                            <li><a href="{{ $frontend['footer']->facebook }}"><span class="fa fa-facebook"></span></a></li>
                            @endif
                            @if(isset($frontend['footer']->twitter) && $frontend['footer']->twitter != NULL)
                            <li><a href="{{ $frontend['footer']->twitter }}"><span class="fa fa-twitter"></span></a></li>
                            @endif
                            @if(isset($frontend['footer']->googleplus) && $frontend['footer']->googleplus != NULL)
                            <li><a href="{{ $frontend['footer']->googleplus }}"><span class="fa fa-google-plus"></span></a></li>
                            @endif
                            @if(isset($frontend['footer']->pinterest) && $frontend['footer']->pinterest != NULL)
                            <li><a href="{{ $frontend['footer']->pinterest }}"><span class="fa fa-pinterest-p"></span></a></li>
                            @endif
                            @if(isset($frontend['footer']->dribbble) && $frontend['footer']->dribbble != NULL)
                            <li><a href="{{ $frontend['footer']->dribbble }}"><span class="fa fa-dribbble"></span></a></li>
                            @endif
                            @if(isset($frontend['footer']->instagram) && $frontend['footer']->instagram != NULL)
                            <li><a href="{{ $frontend['footer']->instagram }}"><span class="fa fa-instagram"></span></a></li>
                            @endif
                    </ul>
                </div>
            </div>
        </div>
    	<!--Widgets Section-->
        <div class="widgets-section">
        	<div class="row clearfix">
            	<!--Footer Column-->
                <div class="footer-column col-xl-4 col-xs-12">
                    <div class="footer-widget touch-widget">
                    	<h2>Get In Touch</h2>
                        <div class="text">{{$frontend['footer']->about}}</div>
					</div>
                </div>
                <!--Footer Column-->
                <div class="footer-column col-xl-2 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget links-widget">
                    	<h2>Properties</h2>
                        <ul class="links">
                        	<li><a href="#">Garage Inclusive</a></li>
                            <li><a href="#">Free Wifi</a></li>
                            <li><a href="#">All inclusive</a></li>
                            <li><a href="#">Hotel Room Service</a></li>
                            <li><a href="#">Laxury Bedroom</a></li>
                        </ul>
                    </div>
                </div>
                <!--Footer Column-->
                <div class="footer-column col-xl-2 col-md-3 col-sm-6 col-xs-12">
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
                <div class="footer-column col-xl-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="footer-widget links-widget">
                    	<h2>Contact info</h2>
                        <ul class="list-style-one style-two contact-links">
                            @if(isset($frontend['footer']->phone) && $frontend['footer']->phone != NULL)
                            <li><span class="icon fa fa-phone"></span>Call us <a href="tel:{{$frontend['footer']->phone}}">{{$frontend['footer']->phone}}</a></li>
                            @endif
                            @if(isset($frontend['footer']->email) && $frontend['footer']->email != NULL)
                            <li><span class="icon fa fa-envelope-o"></span><a href="mailto:{{$frontend['footer']->email}}">{{$frontend['footer']->email}}</a></li>
                            @endif
                            @if(isset($frontend['footer']->address) && $frontend['footer']->address != NULL)
                            <li><span class="icon fa fa-clock-o"></span>{{$frontend['footer']->address}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer Bottom-->
    <div class="footer-bottom">
    	<div class="copyright">&copy; Copyright 2022 All rights reserved – Design & Developed By Happy Agarwal with <i class="fa fa-heart text-danger"></i></div>
    </div>
</footer>
<!--End Main Footer-->