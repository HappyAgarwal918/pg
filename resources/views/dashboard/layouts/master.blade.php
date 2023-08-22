<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')" />
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" type="image/x-icon">
  <!-- Icons:css -->
  <link rel="stylesheet" href="{{ asset('assets/broker/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/broker/vendors/ti-icons/css/themify-icons.css')}}">
  <!-- End:Icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/broker/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
  <link rel="stylesheet" href="{{ asset('assets/broker/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/broker/css/multistep.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/broker/css/file_upload.css')}}">
  <style type="text/css">
  .room_type{
      padding: 10px;
      color: #fff;
      background-color: #4b49ac;
  }
  </style>
  @yield('css')
</head>
<body>
  <div class="container-scroller">

    @include('dashboard.layouts.header')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">



      @include('dashboard.layouts.settingpanel')

      @include('dashboard.layouts.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">

          @if(Session::has('successful_message'))
          <div class="alert alert-success alert-dismissible">
          {{ Session::get('successful_message') }}
          </div>
          @elseif(Session::has('error_message'))
          <div class="alert alert-danger alert-dismissible">
          {{ Session::get('error_message') }}
          </div>
          @endif

          @yield('content')

        </div>
        @include('dashboard.layouts.footer')

      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
</body>
<!-- plugins:js -->
<script src="{{ asset('assets/broker/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->

<!-- inject:js -->
<script src="{{ asset('assets/broker/js/off-canvas.js')}}"></script>
<script src="{{ asset('assets/broker/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('assets/broker/js/template.js')}}"></script>
<script src="{{ asset('assets/broker/js/settings.js')}}"></script>
<!-- <script src="{{ asset('assets/broker/js/todolist.js')}}"></script> -->
<!-- endinject -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script>

</script>
<script>
  $(function () {
  $('#example').dataTable({
    paging: false,
    fixedHeader: {
      header: true
    },
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'excel',
        text: 'Excel <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
      },
      {
        extend: 'pdf',
        text: 'PDF <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
      },
      'copy',
      'colvis'
    ],
    
  });
});
</script>

@yield('js')

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places" ></script>
<script>
    window.addEventListener('load', initialize);

    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
        });
    }
</script>
<script src="{{asset('assets/broker/js/file_upload.js')}}"></script>
</html>