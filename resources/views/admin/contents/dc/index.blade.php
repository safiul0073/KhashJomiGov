@extends('layouts.admin-app')
@section('title', auth()->user()->name)

@section('css')
<link rel="stylesheet"href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet"href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet"href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet"href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection

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
                <li class="breadcrumb-item active">DC</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    @include('layouts.partial.flash-alert')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{url('/admin/dc?tab=get1')}}" class="btn @if($tab == "get1" || $tab == null) btn-success @else btn-primary @endif">গৃহীত ডাটা ১ ({{$grohonData1}})</a>
                <a href="{{url('/admin/dc?tab=get2')}}" class="btn @if($tab == "get2" || $tab == null) btn-success @else btn-primary @endif">গৃহীত ডাটা ২ ({{$grohonData2}})</a>
                <a href="{{url('/admin/dc?tab=put1')}}" class="btn @if($tab == "put1" || $tab == null) btn-success @else btn-primary @endif">প্রেরিত ডাটা ১ ({{$preronData1}})</a>
                <a href="{{url('/admin/dc?tab=put2')}}" class="btn @if($tab == "put2" || $tab == null) btn-success @else btn-primary @endif">প্রেরিত ডাটা ২ ({{$preronData2}})</a>
                <a href="{{url('/admin/dc?tab=nothi')}}" class="btn @if($tab == "nothi" || $tab == null) btn-success @else btn-primary @endif">নথি ({{$nothiCount}})</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                         @include('admin.contents.dc.table')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_lib')

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>

<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
@endsection
