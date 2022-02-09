@extends('layouts.admin-app')
@section('title', 'Applications')
@section('css')
    <style>
              #app-input-field {
            outline: none;
            width: 200px;
            border: none;
            border-bottom: 2px dotted black;
        }
        .office_table{
            margin-left: auto;
            margin-right: auto;
        }

        .office_table{
            width:80%;
            border: 1px solid black;
        }
        .office_table th{
            text-align: center;
        }
        .office_table td{
            padding: 10px;
        }

        #rajosho_input {
            outline: none;
            width: 300px;
        }
    </style>
@endsection
@section('contents')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-">Application</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Application</li>
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
                <div class="card-header">
                    <h1>Application</h1>
                    @include('layouts.partial.flash-alert')
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('application.update', $application->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="from-group my-2">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label class="mb-3 ml-4" for=""> ১।(ক) দরখাস্তকারী কোন শ্রেণীর ভুমিহীন (প্রযোজ্য ক্ষেত্র/ক্ষেত্র সমুহে টিক চিহ্ন দিন)*:</label>

                                        <div class="ml-5">
                                            <div class="form-check mt-2">
                                                @if(find_class_app($application->explodedData('app_class'),"দুঃস্থ মুক্তিযুদ্দা পরিবার") == 1)
                                                       <input class="form-check-input" name="app_class[]"
                                                       checked
                                                       value="দুঃস্থ মুক্তিযুদ্দা পরিবার" type="checkbox">
                                                 @else
                                                 <input class="form-check-input" name="app_class[]"  value="দুঃস্থ মুক্তিযুদ্দা পরিবার" type="checkbox">
                                                 @endif
                                                <label class="form-check-label ml-4">দুঃস্থ মুক্তিযুদ্দা পরিবার।</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                @if(find_class_app($application->explodedData('app_class'),"নদী ভাঙা পরিবার") == 1)
                                                       <input class="form-check-input" name="app_class[]"
                                                       checked
                                                       value="নদী ভাঙা পরিবার" type="checkbox">
                                                 @else
                                                 <input class="form-check-input" name="app_class[]"  value="নদী ভাঙা পরিবার" type="checkbox">
                                                 @endif
                                                <label class="form-check-label ml-4">নদী ভাঙা পরিবার।</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                @if(find_class_app($application->explodedData('app_class'),"সক্ষম পুত্রসহ বিধবা/স্বামী পরিতেক্ত পরিবার") == 1)
                                                       <input class="form-check-input" name="app_class[]"
                                                       checked
                                                       value="সক্ষম পুত্রসহ বিধবা/স্বামী পরিতেক্ত পরিবার" type="checkbox">
                                                 @else
                                                 <input class="form-check-input" name="app_class[]"  value="সক্ষম পুত্রসহ বিধবা/স্বামী পরিতেক্ত পরিবার" type="checkbox">
                                                 @endif
                                                <label class="form-check-label ml-4">সক্ষম পুত্রসহ বিধবা/স্বামী পরিতেক্ত পরিবার।</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                @if(find_class_app($application->explodedData('app_class'),"কৃষি জমি নাই ও বাস্তবাটিহিন পরিবার") == 1)
                                                       <input class="form-check-input" name="app_class[]"
                                                        checked
                                                       value="কৃষি জমি নাই ও বাস্তবাটিহিন পরিবার" type="checkbox">
                                                 @else
                                                 <input class="form-check-input" name="app_class[]"  value="কৃষি জমি নাই ও বাস্তবাটিহিন পরিবার" type="checkbox">
                                                 @endif
                                                <label class="form-check-label ml-4">কৃষি জমি নাই ও বাস্তবাটিহিন পরিবার</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                @if(find_class_app($application->explodedData('app_class'),"অনধিক ০.০১ একর জমি আছে কিন্তু কৃষি জমি নাই এমন কৃষি নির্বর পরিবার") == 1)
                                                       <input class="form-check-input" name="app_class[]"
                                                        checked
                                                       value="অনধিক ০.০১ একর জমি আছে কিন্তু কৃষি জমি নাই এমন কৃষি নির্বর পরিবার" type="checkbox">
                                                 @else
                                                 <input class="form-check-input" name="app_class[]"  value="অনধিক ০.০১ একর জমি আছে কিন্তু কৃষি জমি নাই এমন কৃষি নির্বর পরিবার" type="checkbox">
                                                 @endif
                                                <label class="form-check-label ml-4">অনধিক ০.০১ একর জমি আছে কিন্তু কৃষি জমি নাই এমন কৃষি নির্বর পরিবার</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                @if(find_class_app($application->explodedData('app_class'),"অধিগ্রহনের ফলে ভূমিহীন হইয়া পরিয়াছে এমন পরিবার") == 1)
                                                       <input class="form-check-input" name="app_class[]"
                                                        checked
                                                       value="অধিগ্রহনের ফলে ভূমিহীন হইয়া পরিয়াছে এমন পরিবার" type="checkbox">
                                                 @else
                                                    <input class="form-check-input" name="app_class[]"  value="অধিগ্রহনের ফলে ভূমিহীন হইয়া পরিয়াছে এমন পরিবার" type="checkbox">
                                                 @endif
                                                <label class="form-check-label ml-4">অধিগ্রহনের ফলে ভূমিহীন হইয়া পরিয়াছে এমন পরিবার।</label>
                                            </div>
                                            @error('app_class')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div style="" class=" border-dark">
                                        <label for="">Image:</label>
                                        <img src="{{URL::to($application->avater)}}" style="height: 120px; width:100px;" class="card-img-top" alt="...">
                                        <input name="avater" value="{{old('avater')}}" class="form-control @error('avater') is-invalid @enderror" type="file">
                                        @error('avater')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                                        <div class="col-md-6">
                                            <input type="file"  name="vumihi_muktijudda_sonod" class="form-control-file @error('vumihi_muktijudda_sonod') is-invalid @enderror">
                                            @error('vumihi_muktijudda_sonod')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        @if ($application->vumihi_muktijudda_sonod)
                                        <div class="col-md-6">
                                            <a class="btn btn-sm btn-success" href="{{url('/admin/doc-show?doc='.$application->vumihi_muktijudda_sonod)}}">View File</a>
                                        </div>
                                        @endif

                                    </div>

                                </div>
                                <div class="form-check row">
                                    <div class="col-md-5">
                                        <p>ইউনিয়ন চেয়ারম্যান/পৌর চেয়ারমেন/ওয়ার্ড কমিশনের সনদ*:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="vumihi_commission_sonod"
                                                class="form-control-file @error('vumihi_muktijudda_sonod') is-invalid @enderror">
                                        @error('vumihi_commission_sonod')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-check row">
                                    <div class="col-md-5">
                                        <p for="">অন্যান্যা:</p>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="input-group" style="width: 300px">
                                                <div class="custom-file">
                                                    <input type="file" id="input_vumi_sakkhor" name="vumihi_muktijudda_sonod" class="custom-file-input @error('vumihi_muktijudda_sonod') is-invalid @enderror" id="inputGroupFile01"
                                                    aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose Only pdf (2mb)</label>
                                                </div>
                                            </div>
                                        @error('vumihin_others_sonod')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="">২।  দরখাস্তকারীর পরিবার প্রধানের নাম: </label>
                            </div>
                            <div class="col-md-7">
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('main_name') is-invalid @enderror"
                                            name="main_name" placeholder="মোঃ কামাল"
                                            value="{{ $application->main_name }}">
                                    @error('main_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4">
                                        <label for="">বয়স:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error('main_age') is-invalid @enderror"
                                                name="main_age" value="{{$application->main_age}}">
                                        @error('main_age')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label  for="">৩।  দরখাস্তকারীর পিতা/স্বামীর নাম: </label>
                            </div>
                            <div class="col-md-7">
                                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-12">
                                    <input type="text" class="form-control @error('main_fathers_name') is-invalid @enderror"
                                            name="main_fathers_name" value="{{ $application->main_fathers_name }}"
                                            placeholder="মোঃ কামাল">
                                    @error('main_fathers_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>

                                <div class="form-check col-md-3">
                                    <input class="form-check-input isMortal" value="জীবিত" @if($application->main_fathers_mortal == "জীবিত") checked @endif name="main_fathers_mortal"  type="checkbox">
                                    <label class="form-check-label ml-4">জীবিত</label>
                                </div>
                                <div class="form-check col-md-3" >
                                    <input class="form-check-input isMortal" @if($application->main_fathers_mortal == "মৃত") checked @endif value="মৃত" name="main_fathers_mortal"  type="checkbox">
                                    <label class="form-check-label ml-4">মৃত</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="" >৪।  দরখাস্তকারীর জন্মস্থান/ঠিকানা*: </label>

                                <div class="from-group row">
                                    <div class="col-md-5">
                                        <label class="ml-md-5 ml-lg-5 ml-xl-5" for="">জেলাঃ</label>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <select name="main_zila" class="form-control ml-2" placeholder=""id="">
                                            <option value="লালমনিরহাট">লালমনিরহাট</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="from-group row">
                                    <div class="col-md-5">
                                        <label class="ml-md-5 ml-lg-5 ml-xl-5" for="">উপজেলাঃ</label>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <select name="main_upzila" class="form-control ml-2" id="main_upzila">
                                            @foreach ($upa_zilas as $item)
                                                <option @if($application->main_upzila_id== $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="from-group row">
                                    <div class="col-md-5">
                                        <label class="ml-md-5 ml-lg-5 ml-xl-5" for="">ইউনিয়নঃ</label>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3 setUnion">
                                        <select name="main_union" class="form-control ml-2" id="main_union">

                                            @foreach ($unions as $item)
                                                @if ($application->main_upzila_id == $item->upa_zila_id)
                                                    <option @if($application->main_union_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                    <div class="from-group row">
                                        <div class="col-md-5">
                                            <label class="ml-md-5 ml-lg-5 ml-xl-5" for="">গ্রামঃ</label>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <input  name="main_village" value="{{$application->main_village}}" type="text" class="form-control ml-2" placeholder="">
                                        </div>

                                    </div>


                        </div>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="">৫।  পরিবার প্রধানের স্ত্রী/স্বামী নাম*: </label>
                            </div>
                            <div class="col-md-7">
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('main_f_or_m_name') is-invalid @enderror"
                                            name="main_f_or_m_name" value="{{$application->main_f_or_m_name}}"
                                            placeholder="মোঃ কামাল">
                                    @error('main_f_or_m_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4">
                                        <label for="">বয়স*:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control @error('main_f_or_m_age') is-invalid @enderror"
                                                name="main_f_or_m_age" value="{{$application->main_f_or_m_age}}">
                                        @error('main_f_or_m_age')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="">৬।  দরখাস্তকারীর পরিবারের সদস্যদের নাম*: </label>
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
                                        <th class="text-center"><a id="add" href="javascript:void(0)" class="btn btn-secondary">+</a></th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    {{-- {{dd($application->familyMembers())}} --}}
                                    @foreach ($application->familyMembers() as $key => $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            <input value="{{$item['name']}}" name="name[][name]" class="form-control" type="text">
                                        </td>
                                        <td>
                                            <input value="{{$item['age']}}" style="width:60px;" class="form-control" name="age[][age]" min=1 type="number">
                                        </td>
                                        <td>
                                            <input value="{{$item['relation']}}" style="width: 100px;" class="form-control" name="relation[][relation]" type="text">
                                        </td>
                                        <td>
                                            <input value="{{$item['whatdos']}}" name="whatdo[][whatdo]" class="form-control" type="text">
                                        </td>
                                        <td>
                                            <input value="{{$item['comment']}}" name="comment[][comment]" class="form-control" type="text">
                                        </td>
                                        <td>
                                            <a id="delete" class="btn btn-sm btn-secondary rounded" >-</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">৭।  দরখাস্ত কারীর নিজের বসত বাড়ির বিবরণ*: </label>
                            <textarea name="dorkhastokarir_barir_biboron"
                                        class="form-control @error('dorkhastokarir_barir_biboron') is-invalid @enderror">{{$application->dorkhastokarir_barir_biboron}}</textarea>
                            @error('dorkhastokarir_barir_biboron')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">৮।  নিজের বসতবাটি না থাকিলে পরিবার যেখানে বাস করে উহার বিবরণ (বর্তমান ঠিকানা)*: </label>
                            <textarea name="dorkhastokarir_present_biboron"
                            class="form-control @error('dorkhastokarir_present_biboron') is-invalid @enderror">{{$application->dorkhastokarir_present_biboron}}</textarea>
                            @error('dorkhastokarir_present_biboron')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">৯।  দরখাস্তকারী অথবা তাহার পিতা/মাতা/পর্বে কোনো খাস কৃষি জমি পাইয়া থাকিলে উহার বিবরণ: </label>
                            <textarea name="dorkhastokarir_khas_jomir_biboron" class="form-control">{{$application->dorkhastokarir_khas_jomir_biboron}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">১০।  খাস জমির জন্য কোনো জায়গা দরখাস্ত দাখিল করিলে উহার বিবরণ: </label>
                            <textarea name="dorkhastokarir_khas_dakhil_biboron" class="form-control">{{$application->dorkhastokarir_khas_dakhil_biboron}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">১১।  নদী ভাঙ্গা পরিবার হইলে কবে কোথায় নদী ভাঙিয়াছিল  এবং সেই জায়গার কোনো দলিল দস্তাবেজ থাকিলে উহার বিবরণ (প্রয়োজনে পৃথক কাগজ ব্যবহার করিতে হইবে): </label>
                            <textarea name="dorkhastokarir_nodi_vangon_biborn" id="summernote" class="form-control">{{$application->dorkhastokarir_nodi_vangon_biborn}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">১২।  পরিবারের কেহ শহীদ বা পঙ্গু মুক্তিযোদ্দা হইলে তাহার বিস্তারিত পরিচয় ও শহীদ বা পঙ্গু হইবার বিবরণ ও প্রমাণ: </label>
                            <textarea name="dorkhastokarir_shohidorpongo_person_biboron" id="summernote" class="form-control">{{$application->dorkhastokarir_shohidorpongo_person_biboron}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">১৩। দরখাস্তকারীর দখলে কোনো খাস জমি জায়গা থাকিলে ওহারর বিবরণ|কবে হইতে কিভাবে দখলে আছেন এবং জমির বর্তমান অবস্থা জানাইতে হইবে|(প্রয়াজনে পৃথক কাগজ ব্যবহার করিতে হইবে): </label>
                            <textarea name="dorkhastokarir_khash_jomir_biboron" id="summernote" class="form-control">{{ $application->dorkhastokarir_khash_jomir_biboron }}</textarea>
                        </div>
                        <div class="form-group row">
                            <label for="">১৪| দরখাস্তকারী কোনো বিশেষ খাস জমি পাইতে চাহিলে তাহার কারণ ও বিবরণ:
                            <textarea name="khashjomipower_karon" id="summernote" class="form-control">{{ $application->khashjomipower_karon }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">১৫|প্রার্থিত জায়গা বন্দোবস্ত না হইলে অন্য কোনো এলাকা হইতে জমি চাহেন|(ক্রমনসারে ২/৩ মৌজার নাম উল্লেখ করিতে হইবে):
                            <textarea name="mowjar_name_somuho" id="summernote" class="form-control">{{ $application->mowjar_name_somuho }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">16|দরখাস্তোকারির সম্পর্কে ভাল জানেন এমন দুই জন গন্যমান্য লোকের নাম ও ঠিকানা:
                            <textarea name="duijon_baktir_nam_tikana" id="summernote" class="form-control">{{ $application->duijon_baktir_nam_tikana }}</textarea>
                        </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="text-center">শপথ নামা</h1>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            <strong >আমি</strong> <input type="text" id="app-input-field" value="{{ $application->shopoth_namar_baktir_name }}" name="shopoth_namar_baktir_name"> <strong>পিতা/স্বামী</strong> <input id="app-input-field" value="{{ $application->shopoth_nama_parents_name}}" name="shopoth_nama_parents_name" type="text"> শপথ করিয়া বলিতেছি যে,আমার সম্পর্কে উপরুক্ত বিবরণ আমি পড়িয়াছি অথবা আমাকে পড়িয়া শুনানো হইয়াছে|
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
                                                <img src="{{'/'.$application->dorkhastokarir_tipshoi}}" style="width: 70px; height: 40px;" alt="tipshowi shonakto karir">
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <label for="">দরখাস্তকারীর সই/টিপসই</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{'/'.$application->shonaktokarir_tipshoi}}" style="width: 70px; height: 40px;" alt="tipshowi shonakto karir">
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
                                            <input type="text" class="form-control" name="poron_kari_name" value="{{$application->poron_kari_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="">দরখাস্ত পূরণকারীর পিতা/স্বামীর নাম <span style="margin-left: 5px">:</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="puron_karir_girdian" value="{{$application->puron_karir_girdian}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="">পদবী <span style="margin-left: 176px">:</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="puron_karir_podobi" value="{{$application->puron_karir_podobi}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="">ঠিকানা <span style="margin-left: 169px">:</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="purun_karir_address" id="" class="form-control">{{$application->purun_karir_address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <table class="form-group office_table">
                                    <tr>
                                        <th style="backgroud: white !impotent;">সংশ্লিষ্ট ভূমি রাজস্ব অফিস পুরোন করিবে</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div style="display: inline;">
                                                        <label for="">১| দরখাস্ত প্রাপ্তির তারিখ<span style="margin-left: 35px;">:</span></label>
                                                        <input  name="dorkhasto_praptir_tarik" id="rajosho_input" value="{{ old('dorkhasto_praptir_tarik') }}" type="date">
                                                    </div>
                                                    <div style="display: inline;">
                                                        <label for="">২| প্রাপ্তির ক্রমিক নং<span style="margin-left: 59px;">:</span></label>
                                                        <input  name="praptir_kromic_no" id="rajosho_input" value="{{ old('proptir_kromic_nong') }}" type="text">
                                                    </div>
                                                    <div style="display: inline;">
                                                        <label for="">৩| প্রদত্ত রশিদের ক্রমিক নম্বর<span style="margin-left: 5px;">:</span></label>
                                                        <input  name="praptir_roshid_kromik_no" id="rajosho_input" value="{{ old('praptir_roshid_kromik_no') }}" type="text">
                                                    </div>

                                                </div>
                                                <div class="col-md-4" style="display: inline;">
                                                    <label for="">সময়:</label>
                                                    <input  name="praptir_somoy" class="form-control" value="{{ old('praptir_somoy') }}" type="time">
                                                </div>
                                            </div>

                                    </td>

                                    </tr>
                                </table>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <label for="">ভূমি রাজস্ব অফিসের সহকারীর স্বাক্ষরঃ</label>
                                        <img class="ml-3" id="vumi_sakkhor" src="{{'/'.$application->vumi_rajossho_office_shakkor}}" style="width: 70px; height: 40px;">
                                    </div>
                                    <div>
                                        <div class="input-group" style="width: 300px">
                                            <div class="custom-file">
                                              <input type="file" id="input_vumi_sakkhor" name="vumi_rajossho_office_shakkor" class="custom-file-input @error('vumi_rajossho_office_shakkor') is-invalid @enderror" id="inputGroupFile01"
                                                aria-describedby="inputGroupFileAddon01">
                                              <label class="custom-file-label" for="inputGroupFile01">Choose Only PNG (200kb)</label>
                                            </div>
                                        </div>
                                          @error('vumi_rajossho_office_shakkor')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                          @enderror
                                    </div>
                                    {{-- <img src="{{$application->vumi_rajossho_office_shakkor}}" style="width: 70px; height: 40px;" alt="tipshowi shonakto karir"> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img id="rajosso_sakkhor" src="{{'/'.$application->rajossho_kormokorter_sakkhor}}" style="width: 70px; height: 40px;" alt="tipshowi shonakto karir">
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">


                                                <div class="input-group">
                                                    <div class="custom-file">
                                                      <input type="file" id="rajosso_sakkhor_input" name="rajossho_kormokorter_sakkhor" class="custom-file-input @error('rajossho_kormokorter_sakkhor') is-invalid @enderror" id="inputGroupFile01"
                                                        aria-describedby="inputGroupFileAddon01">
                                                      <label class="custom-file-label" for="inputGroupFile01">Choose Only PNG (200kb)</label>
                                                    </div>
                                                  </div>
                                                  @error('rajossho_kormokorter_sakkhor')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                  @enderror
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <label for="">রাজস্ব কর্মকর্তার স্বাক্ষরঃ</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        <div class="form-group">
                            <button id="getValue" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custome-script')
<script src="{{asset('custom/script/image-script.js')}}"></script>
@endsection

