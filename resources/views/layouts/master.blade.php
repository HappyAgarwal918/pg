<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <link rel="shortcut icon" href="{{ asset($frontend['logo'][0]->path)}}" type="image/x-icon">
    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css')}}" rel="stylesheet">

    <link href="{{ asset('assets/css/custom-style.css')}}" rel="stylesheet">

    <!--Color Themes-->
    <link id="theme-color-file" href="{{ asset('assets/css/color-themes/default-theme.css')}}" rel="stylesheet">

    @yield('css')
</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>

    @include('layouts.header')

    @include('sweetalert::alert')

        @yield('content')

    @include('layouts.footer')

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

<script src="{{ asset('assets/js/jquery.js')}}"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/jquery.fancybox.js')}}"></script>
<script src="{{ asset('assets/js/owl.js')}}"></script>
<script src="{{ asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{ asset('assets/js/wow.js')}}"></script>
<script src="{{ asset('assets/js/validate.js')}}"></script>
<script src="{{ asset('assets/js/appear.js')}}"></script>

<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o"></script>
<script src="{{ asset('assets/js/map-script-2.js')}}"></script>
<!--End Google Map APi-->

<script type="text/javascript">
    function wishlist(id){
        $.ajax({
            url: "{{ route('addtowishlist') }}",
            type: "POST",
            data: {id:id, _token: '{{csrf_token()}}'},

            success: function(data){
                Success = true;
                if($("#wishlist"+id).hasClass("red-heart")){
                    $("#wishlist"+id).removeClass("red-heart");

                }else{
                    $("#wishlist"+id).addClass("red-heart");
                }
            },
            error: function(err){
                Success = false;
                if (err.status == 401) {
                    window.location.href = "login";
                }
            } 
        });
    }
</script>

@yield('js')

<script src="{{ asset('assets/js/script.js')}}"></script>
</body>
</html>