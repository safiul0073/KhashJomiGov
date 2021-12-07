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
            @foreach ($applications as $key => $application)
             <tr>
                 <td>{{$key+1}}</td>
                 <td>{{$application->main_name}}</td>
                 <td>{{$application->main_fathers_name}}</td>
                 <td>{{$application->main_village}}, {{$application->union->name}}, {{$application->upa_zila}}</td>
                 <td><img src="{{URL::to($application->avater)}}" style="height: 80px; width:100px;" class="card-img-top" alt="..."></td>
                 <td>
                     @if ($application->accept_id)
                        @if ($application->accept_id == 2 && $application->return_id == auth()->user()->role_id)
                            <a href="{{route('application.show', $application->id)}}" class="btn btn-sm btn-primary">Show</a>
                            <a href="{{route("ac-land.to.uno",$application->id)}}" class="btn btn-sm btn-info">সেন্ড UNO</a>
                        @else
                            <p>Uno কে সেন্ড করা হয়েছে</p>
                        @endif

                     @else
                     <a href="{{route('application.show', $application->id)}}" class="btn btn-sm btn-primary">Show</a>
                     <a href="{{route('application.edit', $application->id)}}" class="btn btn-sm btn-primary">Edit</a>i class="far fa-edit"></i></a>
                     <a href="{{route('application.delete', $application->id)}}" class="btn btn-sm btn-primary">Delete</a>i class="far fa-edit"></i></a>
                     @endif

                 </td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
