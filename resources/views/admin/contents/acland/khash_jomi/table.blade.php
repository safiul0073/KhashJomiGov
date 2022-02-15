<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead style="background-color:green" class="text-white">
                    <tr class="text-center">
                        <th>ক্রমিক</th>
                        <th>নাম</th>
                        <th>ইমেইল</th>
                        <th>রোল</th>
                        <th>ছবি</th>
                        <th>কার্যক্রম</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($khashJomis as $key => $user)

                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role?$user->role->name:''}}</td>
                        <td><img src="{{'/'.$user->avater}}" style="height: 80px; width:100px;" class="card-img-top" alt="..."></td>
                        <td>
                           <div class="d-flex flex-column">
                               <a href="{{route('user.show', $user->id)}}" class="btn btn-sm btn-outline-success text-black"><i class="far fa-eye"></i></a>
                               <a href="javascript:void(0)"
                                   data-toggle="modal"
                                   data-target="#modal-default{{$user->id}}"
                                   class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
                               <button type="button" class="btn btn-outline-danger waves-effect" onclick="deleteCategory({{$user->id}})"><i class="fas fa-ban"></i></button>
                                   <form id="delete-form-{{$user->id}}" action="{{route('user.destroy',$user->id)}}" method="POST" style="display: none;" >
                                       @csrf
                                       @method('DELETE')
                                   </form>
                            </div>
                        </td>

                    </tr>

                    @endforeach --}}
                </tbody>
            </table>
        </div>

    </div>
</div>
