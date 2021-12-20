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
            <div class="card-header">
                <p class="section-lead">
                    @lang('On this page you can update your profile')
                </p>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-xl-3 col-lg-12">
                        <div class="nimmu-default-card nimmu-buttons avatar-pro">
                            <div class="nimmu-default-card-body">
                                <div class="form-group text-center">
                                    <label for="">Choose Profile Photo</label>
                                    <div>
                                        <img class="img-thumbnail" style="width: 100px;height: 120px;"
                                         src="{{$user->avater}}" id="avatar-preview">
                                        <input type="file" class="form-control mt-2 @error('avater') is-invalid @enderror"
                                            name="avater" id="avatar-input">
                                        @error('avater')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nimmu-default-card nimmu-buttons avatar-pro">
                            <div class="nimmu-default-card-body">
                                <div class="form-group text-center">
                                    <label for="">Choose Sign</label>
                                    <div>
                                        <img class="img-thumbnail" style="width: 100px;height: 120px;"
                                            src="{{$user->sign}}" id="sign-preview">
                                        <input type="file" class="form-control mt-2 @error('sign') is-invalid @enderror" name="sign" value="" id="selected-sign">
                                        @error('sign')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" placeholder="@lang('Enter Full Name')">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">@lang('Email') <span class="badge badge-info">@lang('unique')</span></label>
                                            <input id="email" type="email" value="{{$user->email}}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" placeholder="@lang('Enter Email')">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">@lang('Phone (without +)') <span class="badge badge-info">@lang('unique')</span></label>
                                            <input id="phone" type="text" value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror"
                                                    name="phone" placeholder="@lang('Enter Phone')">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">@lang('Password')</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="@lang('Enter Password')">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">@lang('Retype Password')</label>
                                            <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror"
                                                    name="password_confirmation" placeholder="@lang('Enter Password')">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-block btn-lg nimmu-btn nimmu-btn-primary" type="submit">Save</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        // image input then show in image tag using jQuery
        $(document).ready(function(){

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#avatar-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#avatar-input").on('change', function(){
                readURL(this);
            });
        });

        $(document).ready(function(){

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#sign-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#selected-sign").on('change', function(){
                readURL(this);
            });
        });
    </script>
@endpush
