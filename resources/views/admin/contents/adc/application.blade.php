@extends('layouts.admin-app')
@section('title', 'Applications')
@section('css')
@endsection
@section('contents')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-">আবেদন পত্র</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">হোম</a></li>
                <li class="breadcrumb-item active">আবেদন পত্র</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content-header -->
        <!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom-info d-flex">
                    <a href="{{url('/admin/adc')}}" class="btn btn-sm btn-primary">পূর্বের পেজ</a>
                    <h3 class="text-center h5 font-weight-bold ml-4">
                        উপজেলাঃ {{$application->upa_zila->name}}, ইউনিয়নঃ {{' '.$application->union->name .', গ্রামঃ '. $application->main_village }} এর একটি সম্পূর্ণ আবেদন পত্র।
                    </h3>
                </div>
                @include('layouts.partial.flash-alert')
                <div class="card-body">

                        <div class="from-group my-2">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label class="" for=""> ১।(ক) দরখাস্তকারী কোন শ্রেণীর ভুমিহীন:</label>
                                        @foreach ($application->explodedData('app_class') as $key => $item)
                                         <p>{{$key+1}}: {{$item}}</p>
                                        @endforeach
                                    </div>

                                <div class="col-md-4">
                                    <div style="" class=" border-dark">

                                        <img src="{{URL::to('/'.$application->avater)}}" style="height: 110px; width:100px;" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                            </div>

                        </div>

                        <div class="form-group my-2">
                            <div class="">
                                <label class="my-3" for="">(খ) ভুমিহীন শ্রেণীর স্বপক্ষে দাখিলকৃত কাগজপত্রঃ</label>*

                                <div class="form-check row">
                                    <div class="col-md-5">
                                        <p for="">যথাযথ কর্তৃপক্ষ কর্তৃক প্রদত্ত মুক্তিযুদ্দা সনদ:</p>
                                    </div>

                                    <div class="col-md-6">
                                       <a class="btn btn-sm btn-info" href="{{url('/admin/doc-show?doc='.$application->vumihi_muktijudda_sonod)}}" >File Open</a>
                                    </div>

                                </div>
                                <div class="form-check row">
                                    <div class="col-md-5">
                                        <p>ইউনিয়ন চেয়ারম্যান/পৌর চেয়ারমেন/ওয়ার্ড কমিশনের সনদ:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-sm btn-info" href="{{url('/admin/doc-show?doc='.$application->vumihi_commission_sonod)}}" >File Open</a>
                                    </div>

                                </div>
                                <div class="form-check row">
                                    <div class="col-md-5">
                                        <p for="">অন্যান্যা:</p>
                                    </div>

                                    <div class="col-md-6">
                                        <a class="btn btn-sm btn-info" href="{{url('/admin/doc-show?doc='.$application->vumihin_others_sonod)}}" >File Open</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">২।  দরখাস্তকারীর পরিবার প্রধানের : </label>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>নাম: {{$application->main_name}}</p>
                                </div>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>বয়স: {{$application->main_age}}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label  for="">৩।  দরখাস্তকারীর পিতা/স্বামীর: </label>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>নাম: {{$application->main_fathers_name}}</p>
                                </div>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>{{$application->main_fathers_mortal}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">৪।  দরখাস্তকারীর জন্মস্থান/ঠিকানা: </label>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>গ্রামঃ {{$application->main_village}}</p>
                                </div>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>ইউনিয়নঃ {{$application->union->name}}</p>
                                </div>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>উপজিলাঃ {{$application->upa_zila->name}}</p>
                                </div>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>জিলাঃ {{$application->main_zila}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">৫।  পরিবার প্রধানের স্ত্রী/স্বামী: </label>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>নাম: {{$application->main_f_or_m_name}}</p>
                                </div>
                                <div class="ml-lg-4 ml-xl-4">
                                    <p>বয়স: {{$application->main_f_or_m_age}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">


                        </div>
                        <div class="form-group ">
                            <label for="">৬।  দরখাস্তকারীর পরিবারের সদস্যদের নাম: </label>
                            <div class="table-responsive">
                            <table class=" table table-bordered">
                                <thead >
                                    <tr >
                                        <th class="text-center">ক্রমিক নং</th>
                                        <th class="text-center">নাম</th>
                                        <th style="width: 20px;" class="text-center">বয়স</th>
                                        <th class="text-center">সম্পর্ক</th>
                                        <th class="text-center">কি করেন</th>
                                        <th class="text-center">মন্তব্য</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @foreach ($application->familyMembers() as $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item['name']}}</td>
                                            <td>{{$item['age']}}</td>
                                            <td>{{$item['relation']}}</td>
                                            <td>{{$item['whatdos']}}</td>
                                            <td>{{$item['comment']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">৭।  দরখাস্ত কারীর নিজের বসত বাড়ির বিবরণ: </label>
                            <p>{{$application->dorkhastokarir_barir_biboron}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">৮।  নিজের বসতবাটি না থাকিলে পরিবার যেখানে বাস করে উহার বিবরণ (বর্তমান ঠিকানা): </label>
                            <p>{{$application->dorkhastokarir_present_biboron}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">৯।  দরখাস্তকারী অথবা তাহার পিতা/মাতা/পর্বে কোনো খাস কৃষি জমি পাইয়া থাকিলে উহার বিবরণ: </label>
                            <p>{{$application->dorkhastokarir_khas_jomir_biboron}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">১০।  খাস জমির জন্য কোনো জায়গা দরখাস্ত দাখিল করিলে উহার বিবরণ: </label>
                            <p>{{$application->dorkhastokarir_khas_dakhil_biboron}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">১১।  নদী ভাঙ্গা পরিবার হইলে কবে কোথায় নদী ভাঙিয়াছিল  এবং সেই জায়গার কোনো দলিল দস্তাবেজ থাকিলে উহার বিবরণ (প্রয়োজনে পৃথক কাগজ ব্যবহার করিতে হইবে): </label>
                            <p>{{$application->dorkhastokarir_nodi_vangon_biborn}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">১২। মৌজার নাম: </label>
                            <p>{{$application->acland_mowja_name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">১৩। জি এল নং: </label>
                            <p>{{$application->acland_jl_no}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">১৪। খতিয়ান নং: </label>
                            <p>{{$application->acland_khotian_numbers}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">১৫। দাগ নং সমুহ: </label>
                            <p>{{$application->acland_dag_no}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">১৬। প্রতেক দাগের জায়গার পরিমান: </label>
                            <p>{{$application->acland_jomit_size}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">১৭।  পরিবারের কেহ শহীদ বা পঙ্গু মুক্তিযোদ্দা হইলে তাহার বিস্তারিত পরিচয় ও শহীদ বা পঙ্গু হইবার বিবরণ ও প্রমাণ: </label>
                            <p>{{$application->dorkhastokarir_shohidorpongo_person_biboron}}</p>
                        </div>

                        <div class="form-group">
                            <label for="">১৮। দরখাস্তকারীর দখলে কোনো খাস জমি জায়গা থাকিলে ওহারর বিবরণ|কবে হইতে কিভাবে দখলে আছেন এবং জমির বর্তমান অবস্থা জানাইতে হইবে (প্রয়াজনে পৃথক কাগজ ব্যবহার করিতে হইবে): </label>
                            <p>{{ $application->dorkhastokarir_khash_jomir_biboron }}</p>
                        </div>
                        <div class="form-group">
                                <label for="">১৯| দরখাস্তকারী কোনো বিশেষ খাস জমি পাইতে চাহিলে তাহার কারণ ও বিবরণ:
                                <p>{{$application->khashjomipower_karon}}</p>
                        </div>
                        <div class="form-group">
                                <label for="">২০|প্রার্থিত জায়গা বন্দোবস্ত না হইলে অন্য কোনো এলাকা হইতে জমি চাহেন|(ক্রমনসারে ২/৩ মৌজার নাম উল্লেখ করিতে হইবে):
                                <p>{{$application->mowjar_name_somuho}}</p>
                        </div>
                        <div class="form-group">
                                <label for="">২১|দরখাস্তোকারির সম্পর্কে ভাল জানেন এমন দুই জন গন্যমান্য লোকের নাম ও ঠিকানা:
                                <p>{{ $application->duijon_baktir_nam_tikana }}</p>
                        </div>
                            <br>
                            <div class="row text-center">
                                    <h1>শপথ নামা</h1>
                            </div>
                            <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                           আমি <strong >{{ $application->shopoth_namar_baktir_name }}</strong> পিতা/স্বামী <strong> {{ $application->shopoth_nama_parents_name }}</strong> শপথ করিয়া বলিতেছি যে,আমার সম্পর্কে উপরুক্ত বিবরণ আমি পড়িয়াছি অথবা আমাকে পড়িয়া শুনানো হইয়াছে|
                                            প্রদত্ত বিবরণ আমার জ্ঞান ও বিশ্সাস মতে সত্য|উক্ত বিবরণের কোনো অংশ,ভবিষতে যে কোনো সময় মিথ্যা প্রমাণিত হইলে
                                            আমাকে প্রদত্ত বন্দোবস্তকৃত জমি বিনা ওজরে সরকারের বরাবরে বাজেয়াপ্ত এবং আমি বা আমার ওয়ারিশান ওহার বিরুদ্দে কোনো প্রকার আইনত দাবি/দাওয়া
                                            করিতে পারিবে না,করিলেও কোনো আদালতে গ্রহণযোগ্য হইবে না|আমি শপথ পূর্বক আরো বলিতেছি যে,আমার এবং আমার স্ত্রীর নাম খাস জমি
                                            দেওয়া হইল,ওহা আমরা নিজে চাষাবাদ করিব,বর্গাদার দিয়া কোনোভাবে চাষ করিব না এবং হস্তান্তর করিব না,বর্গাদার দিয়া কোনোভাবে চাষ করিব
                                            না এবং হস্তান্তর করিব না|আমি দরখাস্তের সকল মর্ম জানিয়া শুনিয়া এবং বুজিয়া সুষ্ট জ্ঞানে সহি করিলাম/টিপসই দিলাম |
                                        </p>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-right">
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{'/'.$application->dorkhastokarir_tipshoi}}" style="width: 70px; height: 40px;" alt="">
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <label for="">দরখাস্তকারীর সই/টিপসই</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{'/'.$application->shonaktokarir_tipshoi}}" style="width: 70px; height: 40px;" alt="">
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <label for="">শনাক্তকারী সই/টিপসই</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-10 mx-auto">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="">দরখাস্ত ফরম পূরণকারীর নাম <span style="margin-left: 45px">:</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$application->poron_kari_name}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="">দরখাস্ত পূরণকারীর পিতা/স্বামীর নাম <span style="margin-left: 5px">:</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$application->puron_karir_girdian}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="">পদবী <span style="margin-left: 176px">:</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$application->puron_karir_podobi}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="">ঠিকানা <span style="margin-left: 169px">:</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$application->purun_karir_address}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="row">

                                        <table class="col-md-10 col-lg-10 col-xl-10 mx-auto office_table">
                                            <tr>
                                                <th style="backgroud: white !impotent;">সংশ্লিষ্ট ভূমি রাজস্ব অফিস পুরোন করিবে</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div style="display: inline;">
                                                                <label for="">১| দরখাস্ত প্রাপ্তির তারিখ<span style="margin-left: 35px;">:</span></label>
                                                                <p>{{$application->dorkhasto_praptir_tarik}}</p>
                                                            </div>
                                                            <div style="display: inline;">
                                                                <label for="">২| প্রাপ্তির ক্রমিক নং<span style="margin-left: 59px;">:</span></label>
                                                                <p>{{$application->proptir_kromic_nong}}</p>
                                                            </div>
                                                            <div style="display: inline;">
                                                                <label for="">৩| প্রদত্ত রশিদের ক্রমিক নম্বর<span style="margin-left: 5px;">:</span></label>
                                                                <p>{{$application->praptir_roshid_kromik_no}}</p>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4" style="display: inline;">
                                                            <label for="">সময়:</label>
                                                            <p>{{$application->praptir_somoy}}</p>
                                                        </div>
                                                    </div>
                                            </td>
                                            </tr>
                                        </table>

                                </div>
                                <div class="form-group d-flex mt-4">
                                    <label for="">ভূমি রাজস্ব অফিসের সহকারীর স্বাক্ষরঃ</label>
                                    <img class="ml-3" src="{{'/'.$application->vumi_rajossho_office_shakkor}}" style="width: 70px; height: 40px;" alt="">

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{'/'.$application->rajossho_kormokorter_sakkhor}}" style="width: 70px; height: 40px;" alt="">
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <label for="">রাজস্ব কর্মকর্তার স্বাক্ষরঃ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
            <br>
            <br>

            <h4 class="text-center">মন্তব্য সমূহ</h4>

            <br>
            <div class="row">
                @foreach ($app_sends as $item)
                    <div class="col-md-6">
                        <div class="card">
                            <div style="background-color: #f3aeae;" class="card-header text-danger">
                                {{-- <h5 class="text-center">{!!$item->onucched!!}</h5> --}}
                            </div>

                            <div class="card-body">

                                {{-- <p>{!!$item->montobbo!!}</p> --}}
                                {{-- <h4 style="style="font-size:14px;>{!! $item->adesh !!}</h4> --}}

                            <div class="row">

                                <div style="width: 170px; float: left;">
                                    <p style="margin-left: 45px;margin-top: 0px;margin-bottom: 0px;">
                                        <img src="{{$item->user->sign}}" alt="" style="width: 70px; height: 40px;"><br></p>

                                        <h4 style="text-align:center;font-size: 14px;margin-top: 0px;margin-bottom: 15px; font-weight: normal; ">
                                            {{$item->user->name}}
                                            <br>
                                            {{$item->role->name}}
                                            <br>
                                            <br>
                                            {{$item->created_at->format('d M, Y H:i:s')}}
                                        </h4>
                                </div>
                                @if (count($previous_users) > 0)
                                    @foreach ($previous_users as $user)

                                        @if ($user->id == $item->user_id)
                                        <div style="width: 150px; float: left;">
                                            <p style="margin-left: 45px;margin-top: 0px;margin-bottom: 0px;">
                                                {{-- <img src="{{$item->user->sign}}" alt="" style="width: 70px; height: 40px;"><br></p> --}}

                                                <h4 style="text-align:center;font-size: 14px;margin-top: 0px;margin-bottom: 15px; font-weight: normal; text-decoration:line-through">
                                                        {{$user->name}}
                                                        <br>
                                                        {{$user->role->name}}</h4>
                                        </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>

                            <div class="row">
                                @if ($item->file)
                                    <div class="col-md-6">
                                        <a class="btn btn-sm btn-outline-info" href="{{url('/admin/doc-show?doc='.$item->file)}}" >File View</a>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <a class="btn btn-sm btn-outline-info" href="{{ route('app.sends', $item->id) }}">Details View</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <a onclick="printMemu()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
            <div style="display:none;">
                @include('admin.contents.print_tamplate', ['app_sends' => $app_sends,'application' => $application])
            </div>
            <br>
        @if ($application->status != 1)
        <form action="{{route('dc.to.adc_revinew', $application->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    @foreach ($roles as $item)
                                        @if ($item->id == 4)
                                            <tr style="background-color: green;" class="text-white border-1">
                                                <th>
                                                    <label for="">{{$item->name}}</label>
                                                </th>
                                                <th>
                                                    <input value="{{$item->id}}" checked="checked" name="receive" type="radio">
                                                </th>
                                            </tr>
                                        @endif

                                    @endforeach
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="">অনুচ্ছেদ</label>
                                <textarea class="form-control" name="onucched" id="summernote" >{{old('content')}}</textarea>
                                @error('onucched')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">আদেশ</label>
                                <textarea class="form-control" name="adesh" id="summernote" >{{old('content')}}</textarea>
                                @error('adesh')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="file">

                                @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">মন্তব্য দাখিল করুন</button>
                                <a href="{{url('/admin')}}"  class="btn btn-info">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        </div>
    </div>
    </div>
</section>
</div>
@endsection

@push('js')
<script src="{{ asset('js/jquery-printme.js') }}"></script>
  <script>
      $(document).ready(function () {
        $('#summernote').summernote()
      })
      function printMemu() {

        var contents = $("#montobbo_print").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>প্রিন্ট</title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link rel="stylesheet" href="{{asset('')}}dist/css/adminlte.min.css">');
        //Append the DIV contents.
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    }
  </script>
@endpush
