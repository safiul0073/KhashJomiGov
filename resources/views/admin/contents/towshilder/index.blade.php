@extends('layouts.admin-app')
@section('title', 'Ac Land')
@section('contents')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Towshilder</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Towshilder</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    @include('layouts.partial.flash-alert')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{url('/admin/towshilder?tab=get1')}}" class="btn @if($tab == "get1" || $tab == null) btn-success @else btn-primary @endif">গৃহীত ডাটা</a>
                <a href="{{url('/admin/towshilder?tab=put1')}}" class="btn @if($tab == "put1" || $tab == null) btn-success @else btn-primary @endif">প্রেরিত ডাটা</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                         @include('admin.contents.towshilder.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
