<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{route('khashJomi.index',['tab'=> $tab, 'page'=> 'table'])}}" class="btn btn-sm btn-info">পূর্বের পাতা</a>
                <h5 class="text-center">খতিয়ান এবং দাগ ও জায়গার পরিমাণ দিয়ে খাস জমি তৈরী করুন</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('khashJomi.store')}}">
                    @csrf
                    <input type="hidden" name="union_id" value="{{$tab}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="from-group">
                                <label for="">খাস জমির মৌজা নাম</label>
                                <input type="text" name="mowja" placeholder="মৌজা নাম"
                                       class="form-control @error('mowja') is-invalid @enderror"
                                       autofocus value="{{old('mowja')}}">
                                       @error('mowja')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for="">জে এল নাম্বার</label>
                                <input type="text" placeholder="জে এল নাম্বার"
                                       class="form-control @error('j_l_no') is-invalid @enderror"
                                       autofocus name="j_l_no" value="{{old('j_l_no')}}">
                                @error('j_l_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for="">খতিয়ান নাম্বার</label>
                                <input type="text" placeholder="খতিয়ান নাম্বার"
                                       class="form-control @error('khotian_no') is-invalid @enderror"
                                       autofocus name="khotian_no" value="{{old('khotian_no')}}">
                                @error('khotian_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead >
                                        <tr >
                                            <th class="text-center">ক্রমিক নং</th>
                                            <th class="text-center">দাগ নাম্বার</th>
                                            <th class="text-center">জায়গার পরিমান</th>
                                            <th class="text-center"><a id="add" href="javascript:void(0)" class="btn btn-success">+</a></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <tr>
                                            <td class="text-center d-flex justify-content-center align-items-center">
                                                <span style="height: 40px;">1</span>
                                            </td>
                                            <td>
                                                <input placeholder="দাগ নাম্বার" name="dag_nos[]" class="form-control" type="number">
                                            </td>
                                            <td>
                                                <input placeholder="জায়গার পরিমান" class="form-control" name="quantitys[]" type="text">
                                            </td>

                                            <td class="text-center">
                                                <a id="delete" class="btn btn-danger rounded" >-</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                </div>
                        </div>

                    </div>

                    <div class="form group">
                        <button class="btn btn-block btn-success">সেব করুণ</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
