<!-- Main Header-->
<header class="main-header">
	<!-- Header Top One -->
	<div class="header-top-one">
    	<div class="auto-container">
        	<div class="inner-container clearfix">
                <!--Top Left-->
                <div class="top-left">
                	<ul class="links clearfix">
                    	<li><span class="icon flaticon-message"></span>Email us at : <a href="mailto:{{$frontend['footer']->email}}">{{$frontend['footer']->email}}</a></li>
                    </ul>
                </div>
                
                <!--Top Right-->
                <div class="top-right clearfix">
                	<!--social-icon-->
                    <div class="social-icon">
                    	<ul class="clearfix">
                            @if(isset($frontend['footer']->facebook) && $frontend['footer']->facebook != NULL)
                        	<li><a href="{{ $frontend['footer']->facebook }}"><span class="fa fa-facebook"></span></a></li>
                            @endif
                            @if(isset($frontend['footer']->twitter) && $frontend['footer']->twitter != NULL)
                            <li><a href="{{ $frontend['footer']->twitter }}"><span class="fa fa-twitter"></span></a></li>
                            @endif
                            @if(isset($frontend['footer']->linkedin) && $frontend['footer']->linkedin != NULL)
                            <li><a href="{{ $frontend['footer']->linkedin }}"><span class="fa fa-linkedin"></span></a></li>
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
                    <ul class="number">
                        @auth
                    	<li><a href="{{ route('dashboard') }}"> Dashboard </a> | 
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form> </li>
                        @else
                        <li><a href="{{ route('login') }}"> login </a>/<a href="{{ route('register') }}"> Register </a> </li>
                        @endauth
                    </ul>
                </div>  
            </div>
        </div>
    </div>
    <!-- Header Top One End -->
    
<!-- Main Box -->
<div class="main-box">
	<div class="auto-container">
    	<div class="outer-container clearfix">
            <!--Logo Box-->
            <div class="logo-box d-none d-md-block">
                <div class="logo">
                    <a href="{{ route('index')}}"><img src="{{ asset($frontend['logo'][0]->path)}}" alt=""></a>
                </div>
            </div>
            <!--Nav Outer-->
            <div class="nav-outer clearfix">
                <!-- Main Menu -->
                <nav class="main-menu navbar navbar-dark navbar-expand-md">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="navbar-collapse collapse clearfix"  id="navbarToggleExternalContent">
                        <ul class="navigation clearfix">
                            @foreach($frontend['menu'] as $primarymenu)
                            <li class="{{ (request()->is('/') && $primarymenu->route == 'index')  ? 'current' : '' }}{{ (request()->is($primarymenu->route.'*')) ? 'current' : '' }}"><a href="{{ route($primarymenu->route)}}">{{ $primarymenu->name }}</a></li>
                            @endforeach
                         </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->
                <a href="{{ route('index')}}" class="d-block d-md-none" style="width: 70px;position: absolute;left: 44%;right: 44%; margin-top: 6px;"><img src="{{ asset($frontend['logo'][0]->path)}}" alt=""></a>
                
                <!--Search Box-->
                <div class="search-box-outer new-wishlist">
                    <a class="search-box-btn dropdown-toggle" type="button" href="{{ route('savedproperty')}}"><span class="fa fa-heart-o text-light"></span></a>
                </div>
                <div class="search-box-outer">
                    <div class="dropdown">
                        <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"><span class="fa fa-search"></span></button>
                        <ul class="dropdown-menu search-panel dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                            <li class="panel-outer">
                                <div class="form-container">
                                    <form action="{{ route('search')}}" method="GET" role="search">
                                        <div class="form-group">
                                            <input type="search" name="search" value="" placeholder="Search Here" required>
                                            <button type="submit" class="search-btn" style="background-color: #71b100;"><span class="fa fa-search"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Nav Outer End-->  
    	</div>    
    </div>
</div>
	
    <!--Sticky Header-->
    <div class="sticky-header">
    	<div class="auto-container clearfix">
        	<!--Logo-->
        	<div class="logo pull-left">
            	<a href="{{ route('index')}}" class="img-responsive"><img src="{{ asset($frontend['logo'][1]->path)}}" alt="" title="" style="max-height: 40px;"></a>
            </div>            
            <!--Right Col-->
            <div class="right-col pull-right">
            	<!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">                    
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            @foreach($frontend['menu'] as $primarymenu)
                            <li class="{{ (request()->is('/') && $primarymenu->route == 'index')  ? 'current' : '' }}{{ (request()->is($primarymenu->route.'*')) ? 'current' : '' }}"><a href="{{ route($primarymenu->route)}}">{{ $primarymenu->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>
        </div>
    </div>
    <!--End Sticky Header-->
</header>
<!--End Main Header -->