<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
      <style type="text/css">

        @media only screen and (min-width:992px){
          .hight{
            height: 100vh;
          }
        }
        
          .bg-illustration {
            position: relative;
            height: 100vh;
            background: url({{ URL::asset('logo/pg.jpg') }}) no-repeat center center scroll;
            background-size: cover;
            float: left;
            -webkit-animation: bgslide 2.4s forwards;
                    animation: bgslide 2.4s forwards;
          }
          .bg-illustration img {
            width: 248px;
            -webkit-user-select: none;
               -moz-user-select: none;
                -ms-user-select: none;
                    user-select: none;
            height: auto;
            margin: 19px 0 0 25px;
          }

          @-webkit-keyframes bgslide {
            from {
              left: -100%;
              width: 0;
              opacity: 0;
            }
            to {
              left: 0;
              width: 55%;
              opacity: 1;
            }
          }

          @keyframes bgslide {
            from {
              left: -100%;
              width: 0;
              opacity: 0;
            }
            to {
              left: 0;
              width: 55%;
              opacity: 1;
            }
          }

          @media only screen and (max-width: 992px) {
            body {
              overflow-x: hidden;
            }

            @-webkit-keyframes slideIn {
              from {
                left: -100%;
                opacity: 0;
              }
              to {
                left: 0;
                opacity: 1;
              }
            }

            @keyframes slideIn {
              from {
                left: -100%;
                opacity: 0;
              }
              to {
                left: 0;
                opacity: 1;
              }
            }
            .bg-illustration {
              float: none;
              background: url("https://i.ibb.co/rwncw7s/bg-mobile.png") center center;
              background-size: cover;
              -webkit-animation: slideIn 0.8s ease-in-out forwards;
                      animation: slideIn 0.8s ease-in-out forwards;
              width: 100%;
              height: 190px;
              text-align: center;
            }
            .bg-illustration img {
              width: 100px;
              height: auto;
              margin: 20px auto !important;
              text-align: center;
            }
          }
      </style>
  </head>
  <body>
    <div class="parent">
      <div class="bg-illustration">
          <img src="{{ asset(''.$frontend['logo'][0]->path)}}" alt="logo">   
      </div>
      @yield('content')
    </div>
  </body>
</html>