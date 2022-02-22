<header class="header">
    <nav>
        <div class="container-fluid">

            <div class="row">
                    <div class="site_logo col-md-6 col-sm-12" style="text-align:left;">
                        <img src="./assets/log.png">
                    </div>
                    <div class="site_title col-md-6  col-sm-12 text" style="text-align:center;">
                        <h2 class="text-center"> খাস কৃষি জমি বন্দোবস্ত, লালমনিরহাট </h2>
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
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav navbar-nav">
                                <li class="{{Request::is('/')?'active':''}}"><a href="{{ URL::to('/') }}">হোম</a></li>
                                <li class="{{ Request::is('bondobosto') || Request::is('application?*')? 'active' : '' }}"><a href="{{URL::to('bondobosto')}}">আবেদন ফর্ম</a></li>
                                <li class="dropdown">
                                    <a href="/login" class="dropdown-toggle" data-toggle="dropdown">লগ ইন </b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/login">জেলা প্রশাসক, লালমনিরহাট</a></li>
                                        <li><a href="/login">অতিরিক্ত জেলা প্রশাসক (রাজস্ব),লালমনিরহাট</a></li>
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
                </nav>
            </div>

    <div class="col-md-3">

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav" style="background-color:green;">

                    <li class="{{Request::is('/')?'active':''}}"><a id="google_translate_element">
                    </a></li>



                    </ul>


                    </div>
        </div>
        </div>
    </div>
</div>
