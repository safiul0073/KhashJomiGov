@extends('layouts.admin-app')

@section('contents')
<div class="content-wrapper">
    <div class="mx-3 mt-4 row">


            <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>আবেদন ডাটা ({{$totalApp}})</h6>
                    </div>
                </a>
            </div>
            <div style="height:120px" class=" mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>গৃহীত ডাটা (১)</h6>
                    </div>
                </a>
            </div>
            <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>গৃহীত ডাটা (২)</h6>
                    </div>
                </a>
            </div>
            <div style="height:120px" class="mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>প্রেরিত ডাটা (১)</h6>
                    </div>
                </a>
            </div>
            <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>প্রেরিত ডাটা (২)</h6>
                    </div>
                </a>
            </div>


    </div>
</div>
@endsection
