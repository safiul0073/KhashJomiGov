@extends('layouts.admin-app')

@section('contents')
<div class="content-wrapper">
    <div class="mx-3 mt-4 row">

        @if (auth()->user()->role_id == 1)
            <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="{{ route('ac-land') }}">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>আবেদন ডাটা ({{$totalApp}})</h6>
                    </div>
                </a>
            </div>
            <div style="height:120px" class=" mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="{{url('/admin/ac-land?tab=get1')}}">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>গৃহীত ডাটা-1 ({{$applications_grohon1}})</h6>
                    </div>
                </a>
            </div>
            <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="{{url('/admin/ac-land?tab=get2')}}">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>গৃহীত ডাটা-2 ({{$applications_grohon2}})</h6>
                    </div>
                </a>
            </div>
            <div style="height:120px" class="mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="{{url('/admin/ac-land?tab=put1')}}">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>প্রেরিত ডাটা-1 ({{$applications_preron1}})</h6>
                    </div>
                </a>
            </div>
            <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                <a href="{{url('/admin/ac-land?tab=put2')}}">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <h6>প্রেরিত ডাটা-2 ({{$applications_preron2}})</h6>
                    </div>
                </a>
            </div>
            @endif
            @if (auth()->user()->role_id == 2)
                <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">
                    <a href="{{ url('/admin/towshilder?tab=get1') }}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>আবেদন ডাটা ({{$totalApp}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class=" mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/towshilder?tab=get1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>গৃহীত ডাটা ({{$grohonApps}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class="mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/towshilder?tab=put1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>প্রেরিত ডাটা-1 ({{$preronApp}})</h6>
                        </div>
                    </a>
                </div>
            @endif
            @if (auth()->user()->role_id == 3)
                <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">
                    <a href="{{ url('/admin/uno?tab=get1') }}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>আবেদন ডাটা ({{$totalApp}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class=" mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/uno?tab=get1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>গৃহীত ডাটা ({{$grohonData}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class="mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/uno?tab=put1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>প্রেরিত ডাটা ({{$preronData}})</h6>
                        </div>
                    </a>
                </div>
            @endif
            @if (auth()->user()->role_id == 4)
                <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">
                    <a href="{{ url('/admin/dc?tab=get1') }}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>আবেদন ডাটা ({{$totalApp}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class=" mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/dc?tab=get1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>গৃহীত ডাটা ({{$grohonData}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class="mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/dc?tab=put1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>প্রেরিত ডাটা ({{$preronData}})</h6>
                        </div>
                    </a>
                </div>
            @endif
            @if (auth()->user()->role_id == 5)
                <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">
                    <a href="{{ url('/admin/adc?tab=get1') }}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>আবেদন ডাটা ({{$totalApp}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class=" mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/adc?tab=get1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>গৃহীত ডাটা ({{$grohonData}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class="mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/adc?tab=put1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>প্রেরিত ডাটা ({{$preronData}})</h6>
                        </div>
                    </a>
                </div>
            @endif
            @if (auth()->user()->role_id == 6)
                <div style="height:120px" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">
                    <a href="{{ url('/admin/adc_revinew?tab=get1') }}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>আবেদন ডাটা ({{$totalApp}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class=" mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/adc_revinew?tab=get1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>গৃহীত ডাটা ({{$grohonData}})</h6>
                        </div>
                    </a>
                </div>
                <div style="height:120px" class="mx-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 bg-success shadow-lg p-2 text-center">

                    <a href="{{url('/admin/adc_revinew?tab=put1')}}">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <h6>প্রেরিত ডাটা ({{$preronData}})</h6>
                        </div>
                    </a>
                </div>
            @endif
    </div>
</div>
@endsection
