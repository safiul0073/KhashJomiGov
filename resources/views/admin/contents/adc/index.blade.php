@extends('layouts.admin-app')
@section('title', 'Ac Land')
@section('contents')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">RDC</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">RDC</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    @include('layouts.partial.flash-alert')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{url('/admin/adc?tab=get1')}}" class="btn @if($tab == "get1" || $tab == null) btn-success @else btn-primary @endif">গৃহীত ডাটা ({{$grohonData}})</a>

                <a href="{{url('/admin/adc?tab=put1')}}" class="btn @if($tab == "put1" || $tab == null) btn-success @else btn-primary @endif">প্রেরিত ডাটা ({{$preronData}})</a>
                <a href="{{url('/admin/adc?tab=nothi')}}" class="btn @if($tab == "nothi" || $tab == null) btn-success @else btn-primary @endif">নথি ({{$nothiCount}})</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                         @include('admin.contents.adc.table')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
