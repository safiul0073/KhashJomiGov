<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ক্রমিক</th>
                <th>নাম</th>
                <th>ছবি</th>
                <th>কার্যক্রম</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $key => $item)
             <tr>
                 <td>{{$key+1}}</td>
                 <td>{{$item->main_name}}</td>
                 <td><img src="{{URL::to($item->avater)}}" style="height: 80px; width:100px;" class="card-img-top" alt="..."></td>
                 <td>
                    @if ($item->return_id == 1)
                        <p>Sended to Ac Land</p>
                     @else
                     <a href="{{route('application.show', $item->id)}}" class="btn btn-sm btn-primary">Show</a>
                     @endif

                 </td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
