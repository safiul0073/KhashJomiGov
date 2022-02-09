@extends('layouts.admin-app')
@section('contents')
<div class="content-wrapper">
    <div class="container">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-lx-8 mx-auto">
                        <embed  src="{{ '/'.$file }}" style="width:800px; height:800px;" frameborder="0">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
