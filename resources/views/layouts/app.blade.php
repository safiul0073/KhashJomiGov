<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>খাস কৃষি জমি বন্দোবস্ত, লালমনিরহাট</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="google-translate-customization" content="b6703fd8b1d84044-bd4dd2611d59f8dc-g6a8fe920a18c8f60-d">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/styles.css">
    <link rel="stylesheet" href="{{asset('')}}css/dycalendar.css">
    <link rel="stylesheet" href="{{asset('')}}css/jquery-ui.css">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    @yield('style')
    <style type="text/css">
        body {
            font-family: 'SolaimanLipi', Arial, sans-serif !important;
        }

    </style>
</head>
<body style="position: relative; min-height: 100%; top: 0px;" cz-shortcut-listen="true">

     {{-- header section here for all pages --}}
    @include('layouts.partial.frontend-header')

    <div id="app">
    <section class="section">
        @yield('content')
    </section>
  </div>

 <footer>
      <div class="footer">
    <div class="container">
       <div class="col-sm-12">
           <div class="col-sm-6">
            <div class="float-left">
                             <h5>অর্পিত সম্পত্তি লিজ নবায়ন সহজীকরণ, লালমনিরহাট -- 059161308, 059161468</h5>
    </div>
     </div>
     <div class="col-sm-6">
            <div class="float-right" style="padding-top: 8px;">
              © 2020 &nbsp;Developed By<div class="bullet textshadoow">ZS Technologies </div> <a style="color: #03A9F4;" target="_blank" href="https://zstechbd.com/"><img style="display:inline-block;height:28px;margin-left:5px;" src="http://eschooling24.com/wp-content/themes/prawncity-it/img/web2.png"></a>
            </div>
        </div>
    </div>
      </div>
         </div>
  </footer>



<script src="{{asset('')}}js/jquery-2.1.4.js"></script>
<script src="{{asset('')}}js/bootstrap.min.js"></script>
<script src="{{asset('')}}js/jquery-printme.js"></script>
<script src="{{asset('')}}js/script.js"></script>
<script type="text/javascript" src="{{asset('')}}js/jquery.imagemapster.js"></script>
@yield('scripts')
@stack('scripts')
</body>
</html>
