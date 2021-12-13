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
                     @if ($item->accept_id == 4 && $item->return_id == null)
                     <p>Sended to Dc Office</p>
                     @else
                     <a href="{{route('application.show', $item->id)}}" class="btn btn-sm btn-primary">Show</a>
                     @endif

                 </td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
