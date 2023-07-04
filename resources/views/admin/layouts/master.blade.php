<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')" />
  <link rel="shortcut icon" href="{{ asset(''.$frontend['logo'][2]->path) }}" type="image/x-icon">
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Icons -->
  <link href="{{ asset('assets/admin/css/icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/admin/css/Bootstrapv502.css')}}" rel="stylesheet" />
  <style type="text/css">
    .sub-nav-link{
      padding-top: 6px !important;
      padding-bottom: 6px !important;
      margin-left: 24% !important;
    }
    .dataTables_filter {
      float:right;
      margin-bottom: 1em;
      
      &:after {
        clear:both;
      }
    }

    .dt-buttons a .glyphicon {
      visibility: hidden;
    }
    .dt-buttons a:hover .glyphicon {
      visibility: visible;
    }

    .addnew-button{
      float:left;
      margin-right:20px;
      z-index: 99;
      position: relative;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
  @yield('css')
</head>

<body class="g-sidenav-show  bg-gray-100">

  @include('admin.layouts.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

    @include('admin.layouts.header')

    <div class="container-fluid py-4" style="min-height: calc(100vh - 130px);">
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
      @include('admin.layouts.footer')

  </main>
      <!-- ('admin.layouts.ui-configuration') -->

</body>

<!--   Core JS Files   -->
<script src="{{ asset('assets/admin/js/core/popper.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/core/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/admin/js/dashboard.min.js?v=1.0.3')}}"></script>
<!-- Chart js -->
<!-- <script src="{{ asset('assets/admin/js/chart/chartjs.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/chart/chartjs.js')}}"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script>
$(document).ready(function() {
    $("#myBtn").click(function() {
        $("#myModal").modal("show");
    });
});
</script>
@yield('js')
<script>
  $(function () {
  $('#table_id').dataTable({
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
</html>