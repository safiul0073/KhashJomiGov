@extends('layouts.admin-app')
@section('title', 'প্রোফাইল')
@section('contents')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">প্রোফাইল</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">প্রোফাইল</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    @include('layouts.partial.flash-alert')
    <div class="container">
        <div class="card">
           
            <div class="card-body">

                <div class="row">
                    <div class="col-xl-3 col-lg-12">
                        <div class="nimmu-default-card nimmu-buttons avatar-pro">
                            <div class="nimmu-default-card-body">
                                <div class="form-group text-center">
                                    <label for="">Profile Photo</label>
                                    <div>
                                        <img class="img-thumbnail" style="width: 100px;height: 120px;"
                                         src="{{$user->avater? $user->avater : public_path('default.png')}}" id="avatar-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nimmu-default-card nimmu-buttons avatar-pro">
                            <div class="nimmu-default-card-body">
                                <div class="form-group text-center">
                                    <label for="">Sign</label>
                                    <div>
                                        <img class="img-thumbnail" style="width: 100px;height: 120px;"
                                            src="{{$user->sign? $user->sign : ''}}" id="sign-preview">
                                
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-9 col-lg-12">
                        <div class="nimmu-default-card nimmu-buttons">
                            <div
                                class="nimmu-default-card-header nimmu-mb-30 d-flex justify-content-between align-content-center">
                                <div class="nimmu-header-left">
                                    <h3>@lang('Details')</h3>
                                </div>
                            </div>
                            <div class="nimmu-default-card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">@lang('Full Name')</label>
                                            <input id="name" value="{{$user->name}}" type="text"
                                                    class="form-control"
                                                    name="name" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">@lang('Email')</label>
                                            <input id="email" type="email" value="{{$user->email}}"
                                                    class="form-control"
                                                    name="email" disabled >

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">@lang('Phone')</label>
                                            <input id="phone"  type="text" value="{{$user->phone}}" class="form-control"
                                                    name="phone" disabled >

                                        
                                        </div>
                                    </div>
                                </div>

                            
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>
        </div>
    </div>
</div>
@endsection

