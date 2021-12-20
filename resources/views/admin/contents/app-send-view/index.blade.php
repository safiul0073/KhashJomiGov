@extends('layouts.admin-app')
@section('title', 'Ac Land')
@section('contents')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{$app_send->user->name}} মন্তব্য</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-app_send"><a href="#">Home</a></li>
                <li class="breadcrumb-app_send active"> {{$app_send->user->name}}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <div class="container">
        <div class="card">
            <div style="background-color: #f3aeae;" class="card-header text-danger">
                <h5 class="text-center">{!!$app_send->onucched!!}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>{!!$app_send->montobbo!!}</p>
                        <br>
                        <br>
                        <p>{!! $app_send->adesh !!}</p>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center align-app_sends-center">
                        <img class="img-responsive my-1" height="60px" width="60px" src="{{$app_send->user->sign}}" alt="">
                        <div class="w-100 ">
                            {{-- <p>{{$app_send->user->name}}</p> --}}
                            <p>{{$app_send->user->role->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
