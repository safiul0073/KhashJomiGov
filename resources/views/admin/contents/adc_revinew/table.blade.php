<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead style="background-color:green" class="text-white">
            <tr class="text-center">
                <th>ক্রমিক</th>
                <th>আবেদন কারি</th>
                <th>আবেদন কারির পিতা/স্বামী</th>
                <th>ঠিকানা</th>
                <th>ছবি</th>
                <th>কার্যক্রম</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $key => $item)
             <tr>
                 <td>{{$key+1}}</td>
                 <td>{{$item->main_name}}</td>
                 <td>{{$item->main_fathers_name}}</td>
                 <td>{{$item->main_village}}, {{$item->union->name}}, {{$item->upa_zila->name}}</td>
                 <td><img src="{{URL::to($item->avater)}}" style="height: 80px; width:100px;" class="card-img-top" alt="..."></td>
                 <td>

                    <div class="d-flex flex-column">
                        <a href="{{route('show.app', $item->id)}}" class="btn btn-sm btn-outline-success text-black"><i class="far fa-eye"></i></a>
                        <a href="{{route('application.edit', $item->id)}}" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
                        <a href="{{route('application.destroy', $item->id)}}" class="btn btn-sm btn-outline-danger"><i class="fas fa-ban"></i></a>
                    </div>
                     {{-- <a href="{{route("ac-land.to",$item->id)}}" class="btn btn-sm btn-info">সেন্ড তৌশিলদার</a> --}}
                 </td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
