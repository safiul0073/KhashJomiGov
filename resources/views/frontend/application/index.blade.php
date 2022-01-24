@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">উপজেলা এবং ইউনিয়ন নির্বাচন করুন</h3>
                </div>
                <div class="card-body">
                    <form method="get" action="{{ route('bondobosto-app.show') }}">
                        @csrf
                        <div class="form-group">
                            <label for="upozila">উপজেলা</label>
                            <select class="form-control" id="main_upzila" name="upozila">
                                <option selected disabled >উপজেলা নির্বাচন</option>
                                @foreach($upozilas as $upozila)
                                    <option value="{{$upozila->id}}">{{$upozila->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group setUnion">

                        </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary right">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">

    </div>
@endsection

@push('scripts')
    <script>
         // every upazila wise showing all unions
         $('#main_upzila').on('click', function() {
                 var upazila_id = $(this).val();
                 $.ajax({
                     type: "get",
                     url: `get-unions/${upazila_id}`,
                     success: function(res) {
                         $('.setUnion').html(res)
                     }
                 })
             })

    </script>
@endpush
