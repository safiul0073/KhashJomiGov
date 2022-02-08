@extends('layouts.admin-app')
@section('title', auth()->user()->name)

@section('contents')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{auth()->user()->name}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{auth()->user()->name}}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <div class="container">
        <div class="card">
            <div class="card-header border-bottom-info d-flex">
                <a href="{{url('/admin/dc')}}" class="btn btn-sm btn-primary">পূর্বের পেজ</a>
                <h3 class="text-center h5 font-weight-bold ml-4">
                    উপজেলাঃ {{$app->upa_zila->name}}, ইউনিয়নঃ {{' '.$app->union->name .', গ্রামঃ '. $app->main_village }} এর আবেদন পত্রটি বর্তমান অবস্থা।
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover data-table" >
                                <thead style="background-color:green" class="text-white">
                                    <tr class="text-center">
                                        <th>ক্রমিক</th>
                                        <th>তারিখ/সময়</th>
                                        <th>প্রেরণ কারি</th>
                                        <th>প্রাপক</th>
                                        <th>প্রেরণ কারির নাম</th>
                                        <th>প্রাপকের নাম</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($running as $key => $run)
                                     <tr>
                                         <td>{{$key+1}}</td>
                                         <td>{{$run->created_at->format('d M,Y H:i:A')}}</td>
                                         <td>{{$run->role->name}}</td>
                                         <td>{{$run->accept->name}}</td>
                                         @php
                                             $acceptUser = $run->accept->user()->where('status', 1)->where('upa_zila_id', $app->upa_zila_id)->orwhere('union_id', $app->union_id)->first();
                                             $sendUser = $run->role->user()->where('status', 1)->where('upa_zila_id', $app->upa_zila_id)->orwhere('union_id', $app->union_id)->first();

                                         @endphp
                                         <td>{{$sendUser ? $sendUser->name : $run->role->name}}</td>
                                         <td>{{$acceptUser ? $acceptUser->name : $run->accept->name}}</td>

                                     </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
