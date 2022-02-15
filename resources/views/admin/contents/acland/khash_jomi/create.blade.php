<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{route('khashjomi.index',['tab'=> $tab, 'page'=> 'table'])}}" class="btn btn-sm btn-info">পূর্বের পাতা</a>
                <h5 class="text-center">খতিয়ান এবং দাগ ও জায়গার পরিমাণ দিয়ে খাস জমি তৈরী করুন</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('khashjomi.create')}}">
                    @csrf
                    <input type="hidden" name="union_id" value="{{$tab}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for="">খাস জমির নাম</label>
                                <input type="text" class="form-control @error('') is-invalied @enderror" autofocus name="" value="{{old('')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for="">খাস জমির মোজা</label>
                                <input type="text" class="form-control @error('') is-invalied @enderror" autofocus name="" value="{{old('')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for="">জে এল নাম্বার</label>
                                <input type="text" class="form-control @error('') is-invalied @enderror" autofocus name="" value="{{old('')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for="">খতিয়ান নাম্বার</label>
                                <input type="text" class="form-control @error('') is-invalied @enderror" autofocus name="" value="{{old('')}}">
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
                                            <th class="text-center">জায়গা</th>
                                            <th class="text-center"><a id="add" href="javascript:void(0)" class="btn btn-success">+</a></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <tr>
                                            <td class="text-center">
                                                1
                                            </td>
                                            <td>
                                                <input name="dag_nos[][dag_nos]" class="form-control" type="number">
                                            </td>
                                            <td>
                                                <input class="form-control" name="quantitys[][quantitys]" type="text">
                                            </td>

                                            <td>
                                                <a id="delete" class="btn btn-sm btn-danger rounded" >-</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
