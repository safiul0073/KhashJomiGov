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
                     @if ($item->accept_id)
                        @if ($item->accept_id == 2 && $item->return_id == auth()->user()->role_id)
                            <a href="{{route('application.show', $item->id)}}" class="btn btn-sm btn-primary">Show</a>
                            <a href="{{route("ac-land.to.uno",$item->id)}}" class="btn btn-sm btn-info">সেন্ড UNO</a>
                        @else
                            <p>Uno কে সেন্ড করা হয়েছে</p>
                        @endif

                     @else
                     <a href="{{route('application.show', $item->id)}}" class="btn btn-sm btn-primary">Show</a>

                     @endif

                 </td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
