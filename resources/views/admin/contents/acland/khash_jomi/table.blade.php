<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead style="background-color:green" class="text-white">
                    <tr class="text-center">
                        <th>ক্রমিক</th>
                        <th>মোজা নাম</th>
                        <th>জে এল নাম্বার</th>
                        <th>খতিয়ান নাম্বার</th>
                        <th>দাগ নাম্বার</th>
                        <th>জায়গার পরিমান</th>
                        <th>কার্যক্রম</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($khashJomis as $key => $khashJomi)
                    @can('view', $khashJomi)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$khashJomi->mowja}}</td>
                        <td>{{$khashJomi->j_l_no}}</td>
                        <td>{{$khashJomi->khotian_no}}</td>
                        <td>{{$khashJomi->dag_nos}}</td>
                        <td>{{$khashJomi->quantitys}}</td>
                        <td>
                           <div class="d-flex flex-column">

                               <a href="javascript:void(0)"
                                   data-toggle="modal"
                                   data-target="#modal-default{{$khashJomi->id}}"
                                   class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
                               <button type="button" class="btn btn-outline-danger waves-effect" onclick="deleteCategory({{$khashJomi->id}})"><i class="fas fa-ban"></i></button>
                                   <form id="delete-form-{{$khashJomi->id}}" action="{{route('khashJomi.destroy',$khashJomi->id)}}" method="POST" style="display: none;" >
                                       @csrf
                                       @method('DELETE')
                                   </form>
                            </div>
                        </td>

                    </tr>
                    @endcan
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
