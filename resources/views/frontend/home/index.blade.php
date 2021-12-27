@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <?php $currentDate = date("l, F j, Y");

    $engDATE = array(1,2,3,4,5,6,7,8,9,0, 'January', 'February', 'March','April', 'May', 'June', 'July', 'August','September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

    $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার',' বুধবার','বৃহস্পতিবার','শুক্রবার' );

    $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);


    ?>


    <?php
    class BanglaDate {
     private $timestamp;
     private $morning;
     private $engHour;
     private $engDate;
     private $engMonth;
     private $engYear;
     private $bangDate;
     private $bangMonth;
     private $bangYear;
     private $bn_months = array("পৌষ", "মাঘ", "ফাল্গুন", "চৈত্র", "বৈশাখ", "জ্যৈষ্ঠ", "আষাঢ়", "শ্রাবণ", "ভাদ্র", "আশ্বিন", "কার্তিক", "অগ্রহায়ণ");
     private $bn_month_dates = array(30,30,30,30,31,31,31,31,31,30,30,30);
     private $bn_month_middate = array(13,12,14,13,14,14,15,15,15,15,14,14);
     private $lipyearindex = 3;
     function __construct( $timestamp, $hour = 6 ) {
     $this->BanglaDate( $timestamp, $hour );
     }
     function BanglaDate( $timestamp, $hour = 6 ) {
     $this->engDate = date( 'd', $timestamp );
     $this->engMonth = date( 'm', $timestamp );
     $this->engYear = date( 'Y', $timestamp );
     $this->morning = $hour;
     $this->engHour = date( 'G', $timestamp );
     //calculate the bangla date
     $this->calculate_date();
     //now call calculate_year for setting the bangla year
     $this->calculate_year();
     //convert english numbers to Bangla
     $this->convert();
     }
     function set_time( $timestamp, $hour = 6 ) {
     $this->BanglaDate( $timestamp, $hour );
     }
    private function calculate_date() {
     $this->bangDate = $this->engDate - $this->bn_month_middate[$this->engMonth - 1];
     if ($this->engHour < $this->morning)
     $this->bangDate -= 1;

     if (($this->engDate <= $this->bn_month_middate[$this->engMonth - 1]) || ($this->engDate == $this->bn_month_middate[$this->engMonth - 1] + 1 && $this->engHour < $this->morning) ) {
     $this->bangDate += $this->bn_month_dates[$this->engMonth - 1];
     if ($this->is_leapyear() && $this->lipyearindex == $this->engMonth)
     $this->bangDate += 1;
     $this->bangMonth = $this->bn_months[$this->engMonth - 1];
     }
     else{
     $this->bangMonth = $this->bn_months[($this->engMonth)%12];
     }
     }
    function is_leapyear() {
     if ( $this->engYear % 400 == 0 || ($this->engYear % 100 != 0 && $this->engYear % 4 == 0) )
     return true;
     else
     return false;
     }
     function calculate_year() {
     $this->bangYear = $this->engYear - 593;
     if (($this->engMonth < 4) || (($this->engMonth == 4) && (($this->engDate < 14) || ($this->engDate == 14 && $this->engHour < $this->morning))))
     $this->bangYear -= 1;
     }
     function bangla_number( $int ) {
     $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
     $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
    $converted = str_replace( $engNumber, $bangNumber, $int );
     return $converted;
     }
     function convert() {
     $this->bangDate = $this->bangla_number( $this->bangDate );
     $this->bangYear = $this->bangla_number( $this->bangYear );
     }
     function get_date() {
     return array($this->bangDate, $this->bangMonth, $this->bangYear);
     }
    }
    function BDdate($time)
    {
    $bn = new BanglaDate($time);
     $output = $bn->get_date();
     $ReadyDate = "$output[0] $output[1] $output[2]";
     return $ReadyDate;
    }

    $time = time();
    $Bdate = BDdate($time);
    //echo $Bdate;
    ?>


        <div class="container" style="margin-top: 20px;">
            <div class="row" style="F9F9F9;">

                <div class="col-md-3">

                    <div class="card card-info">
                    <div class="card-header bg-info">
                      <h4 class="text-white">গুরুত্বপূর্ণ লিংক </h4>
                    </div>
                    <div class="card-body" style="padding: 7px 7px 7px 7px;">

                              <a href="http://www.sadarlalmonirhat.vplease-lalmonirhat.gov.bd/" target="_blank" class="lnk-3-9">লালমনিরহাট সদর</a>
                                 <a href="http://www.aditmari.vplease-lalmonirhat.gov.bd/" target="_blank" class="lnk-3-9">আদিতমারী</a>
                                          <a href="http://www.kaliganj.vplease-lalmonirhat.gov.bd/" target="_blank" class="lnk-3-9">কালীগঞ্জ</a>
                                       <a href="http://www.hati.vplease-lalmonirhat.gov.bd/" target="_blank" class="lnk-3-9">হাতীবান্ধা</a>


                                          <a href="http://www.patgram.vplease-lalmonirhat.gov.bd" target="_blank" class="lnk-3-9">পাটগ্রাম </a>

                     </div>
                  </div><!--/.card-->
                      <br/>


                    <div class="card card-info">
                    <div class="card-header bg-info">
                      <h4 class="text-white">মিডিয়া </h4>
                    </div>
                    <div class="card-body" style="padding: 13px 7px 2px 13px;">

                      <p style="font-size: 13px;line-height: 22px;text-align: justify;margin-bottom: 5px;margin-right: 7px;">

                         <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fweb.facebook.com%2Fltvnews.net%2Fvideos%2F727999901429291%2F&show_text=false&width=314" width="275" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>

                         </p>

                    </div>
                  </div><!--/.card-->  <br/>



                </div>

                <div class="col-md-6">
                      <div class="row" style="F9F9F9;">

                    <div class="card card-info">
                    <div class="card-header bg-info">
                      <h4 class="text-white"><span class="fa fa-map-marker "></span><b class="textshadoow">লালমনিরহাট জেলার</b> ইন্টারেক্টিভ মানচিত্র</h4>
                    </div>  <div class="card-body" style="padding: 13px 7px 2px 13px;">


                          <div class="col-md-6">
               <img src="{{ asset('images/lalmonirhat.png') }}" width="100%" target="_blank" usemap="#image-map">

    <map name="image-map">

      <area target="_blank" group="a" alt="Patgram" title="Patgram" href="http://patgram.vplease-lalmonirhat.gov.bd" coords="8,74,6,84,10,92,11,100,19,112,34,122,42,125,46,130,55,129,64,144,68,154,62,165,77,176,87,177,97,167,107,146,123,139,130,138,121,126,113,110,110,96,116,93,123,100,126,88,116,84,107,64,97,46,78,42,62,30,44,20,39,2,26,14,18,19,12,29,3,33,10,47,13,60,29,62,28,71,33,75,40,69,49,72,48,78,51,86,47,94,55,99,62,100,68,99,73,108,83,99,86,105,87,118,85,126,79,133,67,127,53,124,47,120,53,113,50,106,42,109,38,101,33,89,26,90,20,81" shape="poly">
     <area target="_blank" group="b" alt="Hatibandha" title="Hatibandha" href="http://hatibandha.vplease-lalmonirhat.gov.bd" coords="129,140,111,146,101,158,98,170,91,178,101,195,102,209,98,220,101,229,100,244,104,258,112,276,125,275,124,259,130,256,141,250,150,237,166,240,177,251,186,256,194,252,203,251,210,242,199,238,195,225,183,217,168,204,152,202,140,192,134,175,131,163,133,145" shape="poly">
     <area target="_blank"  group="c"  alt="Kaliganj" title="Kaliganj" href="http://kaliganj.vplease-lalmonirhat.gov.bd" coords="210,242,203,249,195,256,189,255,185,260,171,247,158,239,150,240,144,249,132,258,125,258,127,272,122,278,114,280,126,295,137,301,156,307,162,311,178,324,186,326,196,329,205,335,208,327,204,318,211,307,219,300,225,290,245,285,252,286,252,275,248,267,236,263,230,255,220,252,215,246" shape="poly">
      <area target="_blank" group="d"  alt="Aditmari" title="Aditmari" href="http://aditmari.vplease-lalmonirhat.gov.bd" coords="278,245,266,261,252,270,254,283,250,288,230,286,219,299,207,312,202,316,210,328,209,339,215,356,225,357,234,368,238,349,247,343,258,343,271,333,281,322,288,306,289,287,295,277,288,272,285,259,281,251" shape="poly">
     <area target="_blank"  group="e" alt="Lalmonirhat" title="Lalmonirhat" href="http://sadarlalmonirhat.vplease-lalmonirhat.gov.bd" coords="300,273,292,282,288,294,287,312,281,324,269,334,260,344,243,345,234,365,241,373,256,382,280,391,294,395,304,389,305,379,316,378,309,367,308,360,311,353,316,345,324,345,343,343,351,342,345,335,338,328,329,312,322,298,311,290,307,279" shape="poly">

    </map>
                         </div>

            <div class="col-md-6">
               <img src="{{ asset('images/11.jpg') }}" width="100%" target="_blank" >
                         </div>

            </div>
                </div>




                </div>


                   <br/>


                </div>




                <div class="col-md-3">
                     <div class="card card-info">
                    <div class="card-header bg-info">
                      <h4 class="text-white">তারিখ</h4>
                    </div>
                    <div class="card-body" style="padding: 13px 7px 2px 13px;">
                                          <img style="height: 60px;width: 60px;display: inline-block;float: left;margin-right: 9px;margin-bottom: 5px;" src="images/date.png">

                      <p  style="font-size: 13px;line-height: 22px;text-align: justify;margin-bottom: 5px;margin-right: 7px;"><?php echo "$convertedDATE"; ?></p>



                      <p  style="font-size: 13px;line-height: 22px;text-align: justify;margin-bottom: 5px;margin-right: 7px;"><?php echo $Bdate; ?></p>


                    </div>
                  </div><!--/.card-->
                  <br/>

                    <div class="card card-info">
                    <div class="card-header bg-info">
                      <h4 class="text-white">উপদেষ্টা ও তত্ত্বাবধানে, পরিকল্পনা ও বাস্তবায়নে</h4>
                    </div>
                    <div class="card-body" style="padding: 13px 7px 2px 13px;">
                      <p style="font-size: 13px;line-height: 22px;text-align: justify;margin-bottom: 5px;margin-right: 7px;">
                          <a href="" target="_blank"></a>
                       </p>

                    </div>
                  </div><!--/.card-->  <br/>

                  <div class="card card-info">
                    <div class="card-header bg-info">
                      <h4 class="text-white">নোটিশ</h4>
                    </div>
                    <div class="card-body" style="padding: 13px 7px 2px 13px;">
                                          <img style="height: 20px;width: 40px;display: inline-block;float: left;margin-right: 9px;margin-bottom: 5px;" src="http://sprangpur.gov.bd/images/upnews.gif">


                      <p style="font-size: 13px;line-height: 22px;text-align: justify;margin-bottom: 5px;margin-right: 7px;">
                          <a href="" target="_blank"></a>
                      </p>

                    </div>
                  </div><!--/.card-->

                </div>
            </div>
        </div>
    </div><!--/.container-fluid-->
@endsection

@push('scripts')
<script type="text/javascript">

    $(document).ready(function() {
            $('img').mapster({
                showToolTip: true,
                noHrefIsMask: false,
                fillColor: '0a7a0a',
                fillOpacity: 0.7,
                mapKey: "group",
                strokeWidth: 5,
                stroke:true,
                strokeColor: 'F88017',
                onClick: go

            });



        });
        function go(data) {
            if (this.href && this.href !== '#') {
                window.open(this.href);
            }
        }
    </script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script type="text/javascript">
        var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

        function GetClock(){
        var d=new Date();
        var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
        var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

        if(nhour==0){ap=" AM";nhour=12;}
        else if(nhour<12){ap=" AM";}
        else if(nhour==12){ap=" PM";}
        else if(nhour>12){ap=" PM";nhour-=12;}

        if(nmin<=9) nmin="0"+nmin;
        if(nsec<=9) nsec="0"+nsec;

        var clocktext=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
        document.getElementById('clockbox').innerHTML=clocktext;
        }

        GetClock();
        setInterval(GetClock,1000);
    </script>

@endpush
