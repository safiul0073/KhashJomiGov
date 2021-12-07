<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>জিটাল অর্পিত সম্পত্তি লিজ নবায়ন, লালমনিরহাট</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    @include('admin.static.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
  <!-- Navbar -->
        @include('admin.header.index')
       <!-- Main Sidebar Container -->
        @include('admin.sidebar.index')
        <!-- Content Wrapper. Contains page content -->

        <!-- /.content-wrapper -->
        @yield('contents')
        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside> --}}
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->

      @include('admin.static.js')
</body>
</html>
