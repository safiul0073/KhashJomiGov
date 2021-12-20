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

                                        <img src="{{URL::to($application->avater)}}" style="height: 110px; width:100px;" class="card-img-top" alt="...">
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
                                       <a class="btn btn-sm btn-info" href="{{url('/admin/doc-show?doc='.$application->vumihi_muktijudda_sonod)}}">File Open</a>
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
                                <label for="">২।  দরখাস্তকারীর পরিবার প্রদানের : </label>
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
                                <label for="">৫।  পরিবার প্রদানের স্ত্রী/স্বামী: </label>
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
                            <label for="">১২।  পরিবারের কেহ শহীদ বা পঙ্গু মুক্তিযোদ্দা হইলে তাহার বিস্তারিত পরিচয় ও শহীদ বা পঙ্গু হইবার বিবরণ ও প্রমাণ: </label>
                            <p>{{$application->dorkhastokarir_shohidorpongo_person_biboron}}</p>
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
                        <div  style="background-color: #f3aeae;" class="card-header text-danger">
                            <h5 class="text-center">{!!$item->onucched!!}</h5>
                        </div>

                        <div class="card-body">
                            <div class="col-12">
                                {{-- <p>{!!$item->montobbo!!}</p> --}}
                                <p>{!! $item->adesh !!}</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                                    <img class="img-responsive my-1" height="60px" width="60px" src="{{$item->user->sign}}" alt="">
                                    <div class="w-100 text-center">
                                        {{-- <p>{{$item->user->name}},</p> --}}
                                        <p>{{$item->user->role->name}}</p>
                                    </div>
                                </div>
                            </div>

                            @if ($item->file)
                                <div class="">
                                    <a class="btn btn-sm btn-info" href="{{url('/admin/doc-show?doc='.$item->file)}}" >File View</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <form action="{{route('uno.to.dc', $application->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    @foreach ($roles as $item)
                                        @if ($item->id != auth()->user()->role_id || $item->id != 7)
                                            <tr style="background-color: green;" class="text-white border-1">
                                                <th>
                                                    <label for="">{{$item->name}}</label>
                                                </th>
                                                <th>
                                                    <input value="{{$item->id}}" name="receive" type="radio">
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
                                <textarea class="form-control" name="adesh" id="summernote2" >{{old('content')}}</textarea>
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
        </div>
    </div>
    </div>
</section>
</div>
@endsection

@push('js')
  <script>
      $(document).ready(function () {
        $('#summernote').summernote()
      })
      $(document).ready(function () {
        $('#summernote2').summernote()
      })

  </script>
@endpush
