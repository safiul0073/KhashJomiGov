<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>জিটাল অর্পিত সম্পত্তি লিজ নবায়ন, লালমনিরহাট</title>
    {{-- @include('admin.static.css') --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://vplease-lalmonirhat.gov.bd/public/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/styles.css">
    <link rel="icon" type="image/png" href="http://vplease-lalmonirhat.gov.bd/">
    {{-- <link rel="stylesheet" href="{{asset('')}}assets/dycalendar.css">
    <link rel="stylesheet" href="{{asset('')}}assets/jquery-ui.css"> --}}
    <link href="{{asset('')}}assets/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'SolaimanLipi', Arial, sans-serif !important;
        }

</style>
</head>
<body style="position: relative; min-height: 100%; top: 0px;" cz-shortcut-listen="true">
    <header class="header">
        <nav>
          <div class="container-fluid">

            <div class="row">
              <div class="site_logo col-md-6 col-sm-12" style="text-align:left;">
                             <img src="./assets/log.png"></div>
              <div class="site_title col-md-6  col-sm-12 text" >
                <h2 class="text-center"> ডিজিটাল অর্পিত সম্পত্তি লিজ নবায়ন, লালমনিরহাট </h2>
            </div>

            </div>
          </div>
        </nav>
      </header>
      <div class="down-header">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <nav class="navbar navbar-default mynavbar" role="navigation">
                        <div class="container-fluid">

                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div  class="navbar-collapse navbar-ex1-collapse collapse" aria-expanded="false" style="height: 1px;">
                                <ul class="nav navbar-nav" style="display: inline-block;">
                                    <li><a href="/">হোম</a></li>
                                    {{-- <li><a href="http://vplease-lalmonirhat.gov.bd/abedon/form">আবেদন ফর্ম (বাসা)</a></li> --}}
                                    <li><a href="{{route('application.index')}}">আবেদন ফর্ম</a></li>
                                    <li class="dropdown">
                                        <a href="http://vplease-lalmonirhat.gov.bd/#" class="dropdown-toggle" data-toggle="dropdown">লগ ইন </b></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="/login">জেলা প্রশাসক,  লালমনিরহাট</a></li>
                                        <li><a href="/login">অতিরিক্ত জেলা প্রশাসক (রাজস্ব),লালমনিরহাট
</a></li>
                                        <li><a href="/login">উপজেলা নির্বাহী অফিসার</a></li>
                                        <li><a href="/login">সহকারী কমিশনার (ভূমি)	</a></li>
                                        <li><a href="/login">সার্ভেয়ার</a></li>
                                        <li><a href="/login">ইউনিয়ন ভূমি সহকারী কর্মকর্তা</a></li>
                                        <li><a href="/login">অফিস সহকারী কাম-কম্পিউটার মুদ্রাক্ষরিক</a>
                                        </ul>
                                    </li>

                                </ul>


                            </div><!-- /.navbar-collapse -->
                        </div>
                        </div>
                    </nav>
                </div>


            </div>
        </div>
    </div>
    <div class="app">
        <section class="section">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-10 mx-auto">
                        @yield('contents')
                    </div>

                </div>
            </div>
        </section>
    </div>

@include('admin.static.js')
<script src="{{asset('')}}assets/bootstrap.min.js.download"></script>
{{-- <script src="{{asset('')}}assets/jquery-printme.js.download"></script> --}}
{{-- <script src="{{asset('')}}assets/script.js.download"></script> --}}
<script type="text/javascript" src="{{asset('')}}assets/jquery.imagemapster.js.download"></script>

<script type="text/javascript" src="{{asset('')}}assets/element.js.download"></script>

</body>
</html>
