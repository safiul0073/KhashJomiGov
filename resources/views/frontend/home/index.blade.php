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
                      <h4 class="text-white"><span class="fa fa-map-marker "></span>লালমনিরহাট জেলার ইন্টারেক্টিভ মানচিত্র</h4>
                    </div>  <div class="card-body" style="padding: 13px 7px 2px 13px;">


                          <div class="col-md-6">
               <img src="{{ asset('images/lalmonirhat.png') }}" width="100%" target="_blank" usemap="#image-map">

    <map name="image-map">

      <area target="_blank" group="a" alt="Patgram" title="Patgram" href="#" coords="8,74,6,84,10,92,11,100,19,112,34,122,42,125,46,130,55,129,64,144,68,154,62,165,77,176,87,177,97,167,107,146,123,139,130,138,121,126,113,110,110,96,116,93,123,100,126,88,116,84,107,64,97,46,78,42,62,30,44,20,39,2,26,14,18,19,12,29,3,33,10,47,13,60,29,62,28,71,33,75,40,69,49,72,48,78,51,86,47,94,55,99,62,100,68,99,73,108,83,99,86,105,87,118,85,126,79,133,67,127,53,124,47,120,53,113,50,106,42,109,38,101,33,89,26,90,20,81" shape="poly">
     <area target="_blank" group="b" alt="Hatibandha" title="Hatibandha" href="#" coords="129,140,111,146,101,158,98,170,91,178,101,195,102,209,98,220,101,229,100,244,104,258,112,276,125,275,124,259,130,256,141,250,150,237,166,240,177,251,186,256,194,252,203,251,210,242,199,238,195,225,183,217,168,204,152,202,140,192,134,175,131,163,133,145" shape="poly">
     <area target="_blank"  group="c"  alt="Kaliganj" title="Kaliganj" href="#" coords="210,242,203,249,195,256,189,255,185,260,171,247,158,239,150,240,144,249,132,258,125,258,127,272,122,278,114,280,126,295,137,301,156,307,162,311,178,324,186,326,196,329,205,335,208,327,204,318,211,307,219,300,225,290,245,285,252,286,252,275,248,267,236,263,230,255,220,252,215,246" shape="poly">
      <area target="_blank" group="d"  alt="Aditmari" title="Aditmari" href="#" coords="278,245,266,261,252,270,254,283,250,288,230,286,219,299,207,312,202,316,210,328,209,339,215,356,225,357,234,368,238,349,247,343,258,343,271,333,281,322,288,306,289,287,295,277,288,272,285,259,281,251" shape="poly">
     <area target="_blank"  group="e" alt="Lalmonirhat" title="Lalmonirhat" href="#" coords="300,273,292,282,288,294,287,312,281,324,269,334,260,344,243,345,234,365,241,373,256,382,280,391,294,395,304,389,305,379,316,378,309,367,308,360,311,353,316,345,324,345,343,343,351,342,345,335,338,328,329,312,322,298,311,290,307,279" shape="poly">

    </map>
                         </div>

            <div class="col-md-6">
               <img src="{{ asset('images/11.png') }}" width="100%" target="_blank" >
                         </div>

                    </div>
                </div>
            </div>


                   <br/>


                </div>
                <div class="col-md-3">

                    <div class="card card-info">
                    <div class="card-header bg-info">
                      <h5 class="text-white">উপদেষ্টা ও তত্ত্বাবধানে, পরিকল্পনা ও বাস্তবায়নে</h5>
                    </div>
                    <div class="card-body" style="padding: 13px 7px 2px 13px;">
                      <p style="font-size: 13px;line-height: 22px;text-align: justify;margin-bottom: 5px;margin-right: 7px;">
                          <img src="{{ asset('images/dc.png') }}" height="280">
                       </p>
                       <p style="font-size: 13px;line-height: 22px;text-align: center;margin-bottom: 5px;margin-right: 7px;">

                         মোঃ আবু জাফর
<br>
জেলা প্রশাসক ও জেলা ম্যাজিস্ট্রেট

                       </p>

                    </div>
                  </div>
                  <!--/.card-->  <br/>
                </div>
            </div>
             <div class="row" style="F9F9F9;">

                <div class="col-md-12">
                    <div class="card card-info">
                    <div class="card-header bg-info">
                      <h4 class="text-white">আমাদের সম্পর্কে </h4>
                    </div>
                    <div class="card-body" style="padding: 13px 7px 2px 13px;">

                      <p style="font-size: 13px;line-height: 22px;text-align: justify;margin-bottom: 5px;margin-right: 7px;">
বাংলাদেশ কৃষি প্রধান দেশ। কৃষি হচ্ছে এ দেশের জাতীয় আয়ের অন্যতম উৎস এবং প্রায় দুই-তৃতীয়াংশ মানুষের জীবিকার অবলম্বন। তাই এ দেশে ভূমি সম্পদের গুরুত্ব অপরিসীম। মৌলিক প্রাকৃতিক সম্পদ সমূহের মধ্যে ভূমি হচ্ছে অন্যতম প্রাকৃতিক সম্পদ যা মানুষের আবাসন, নিত্য প্রয়োজনীয় খাদ্যদ্রব্য, শিল্পে কাচাঁমাল ইত্যাদি সরবরাহের মূল উৎস, কিন্তু জনসংখ্যা বৃদ্ধি এবং ভূমির অপরিকল্পিত ব্যবহারের কারণে আমাদের এ গুরুত্বপূর্ণ প্রাকৃতিক সম্পদ দিন দিন হ্রাস পাচ্ছে। অর্থনৈতিক অগ্রগতির সাথে সাথে নগরায়নের প্রবণতা, শিল্পায়নের পরিধি, রাস্তাঘাট, হাসপাতাল, শিক্ষা প্রতিষ্ঠানের ক্রমাগত সম্প্রসারণের ফলে মাথাপিছু জমির পরিমাণ ক্রমেই সংকুচিত হচ্ছে। গুরুত্বপূর্ণ এ সম্পদের ব্যবহার সঠিক পরিকল্পনার উপর অনেকাংশে নির্ভরশীল। তাই একটি যুগোপযোগী পরিকল্পনা ও নীতির মাধ্যমে এ সীমিত প্রাকৃতিক সম্পদের সুষ্ঠু সর্বোত্তম ব্যবহার সুনিশ্চিত করা প্রয়োজনে হয়ে পড়েছে। এ লক্ষ্যে ভূমি মন্ত্রণালয় কর্তৃক ইতোমধ্যে ভূমি ব্যবহার নীতিমালা প্রনয়ণ করা হয়েছে।
                        <br>
                        জাতির জনক বঙ্গবন্ধু শেখ মুজিবুর রহমানের নেতৃত্বে মহান মুক্তিযুদ্ধের মাধ্যমে ১৯৭১ সালে বাংলাদেশ স্বাধীন হবার পর ভূমি সংক্রান্ত সকল কার্যাদি সম্পাদনের জন্য একটি পূর্ণাঙ্গ মন্ত্রণালয় গঠন করা হয়। ভূমি সংক্রান্ত যাবতীয় সেবা জনগণের দোর গোড়ায় পৌঁছে দেয়ার লক্ষ্যে বর্তমানে ভূমি রেকর্ড ও জরিপ অধিদপ্তর, ভূমি সংস্কার বোর্ড, ভূমি আপীল বোর্ড, ভূমি প্রশাসন প্রশিক্ষণ কেন্দ্র এবং হিসাব নিয়ন্ত্রক (রাজস্ব) দপ্তর ভূমি মন্ত্রণালয় এর অধীনে কাজ করছে। এছাড়া বিভাগীয় পর্যায়ে কমিশনার, জেলা পর্যায়ে কালেক্টর (জেলা প্রশাসক), উপজেলা পর্যায়ে সহকারী কমিশনার (ভূমি), ইউনিয়ন পর্যায়ে ইউনিয়ন ভূমি সহকারী কর্মকর্তা (তহশীলদারগণ) ভূমি সংক্রান্ত সেবা প্রদানে নিয়োজিত রয়েছেন। ভূমি উন্নয়ন কর ও রাজস্ব আদায়, খাস জমি ব্যবস্থাপনা ও বন্দোবস্ত, জলমহাল ব্যবস্থাপনা, ভূমি অধিগ্রহণ ও হুকুম দখল, ভূমি রেকর্ড প্রস্তুতকরণ ও জরিপকরণ এবং ভূমি সংশ্লিষ্ট কর্মকর্তা/কর্মচারীদের প্রশিক্ষণ প্রদান ইত্যাদি বিষয়ে ভূমি মন্ত্রণালয় কাজ করে যাচ্ছে। এ ছাড়া ব্যাংকের মাধ্যমে ভূমি উন্নয়ন কর আদায়, জনস্বার্থে ভূমি আইন ও বিধি প্রণয়ন ইত্যাদি সংস্কারমূলক কার্যক্রম এবং ভূমিহীন ছিন্নমূল জনগোষ্ঠীর পুনর্বাসন, ভূমি জোনিং কার্যক্রম, চর ডেভেলপমেন্ট এন্ড সেটেলমেন্ট প্রকল্পের আওতায় ভূমিহীনদের মধ্যে খাসজমি বন্দোবস্ত প্রদান, উপজেলা ও ইউনিয়ন ভূমি অফিস নির্মাণ ও মেরামত, ভূমি রেকর্ড আধুনিকীকরণ তথা জনসাধারণকে স্বল্পতম সময়ে ভূমি সংক্রান্ত সেবা প্রদান ইত্যাদি উন্নয়নমূলক কার্যাদি ভূমি মন্ত্রণালয় কর্তৃক সম্পাদিত হয়ে থাকে।
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
