@extends('layouts.admin-app')
@section('title', 'Ac Land')
@section('contents')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Ac Land</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-user"><a href="#">Home</a></li>
                <li class="breadcrumb-user active">Ac Land</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    @include('layouts.partial.flash-alert')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="javascript:void(0)" id="showModal" class="btn btn-success">Create a new User</a>
            </div>
            <div class="card-body">
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
                                    @foreach ($users as $key => $user)
                                    @can('view', $user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role?$user->role->name:''}}</td>
                                        <td><img src="{{$user->avater}}" style="height: 80px; width:100px;" class="card-img-top" alt="..."></td>
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
                                        <div class="modal fade" id="modal-default{{$user->id}}">
                                           <div class="modal-dialog">
                                               <div class="modal-content bg-success">
                                                   <div class="modal-header ">
                                                       <h4 class="modal-title ">@lang('Create New User')</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">×</span></button>
                                                   </div>
                                                   <form method="post" enctype="multipart/form-data" action="{{route("user.update", $user->id)}}">
                                                       @csrf
                                                       @method('PUT')
                                                       <div class="modal-body">
                                                           <div class="form-group">
                                                               <label for="name">@lang('Name')</label>
                                                               <input type="text" class="form-control" value="{{$user->name}}" id="name" name="name" placeholder="Enter Name">
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="email">@lang('Email')</label>
                                                               <input type="email" class="form-control" value="{{$user->email}}" id="email" name="email" placeholder="Enter Email">
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="phone">Phone Number</label>
                                                               <input type="text" class="form-control" value="{{$user->phone}}" id="phone" name="phone" placeholder="Enter Phone Number">
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="password">@lang('Password')</label>
                                                               <input type="text" class="form-control"  id="password" name="password" placeholder="Enter Password">
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="role">@lang('Role')</label>
                                                               <select class="form-control text-black" id="role" name="role_id">
                                                                   @foreach ($roles as $role)
                                                                       @if ($role->id == $user->role_id)
                                                                           <option value="{{$role->id}}" selected="selected" >{{$role->name}}</option>
                                                                       @else
                                                                       <option value="{{$role->id}}">{{$role->name}}</option>
                                                                       @endif

                                                                   @endforeach
                                                               </select>
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="avater">@lang('Image')</label>
                                                               <input type="file" class="form-control" id="avater" name="avater" placeholder="Enter Avater">
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="sign">@lang('Sign')</label>
                                                               <input type="file" class="form-control" id="sign" name="sign" placeholder="Enter Sign">
                                                           </div>
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('Close')
                                                           </button>
                                                           <button type="submit" class="btn btn-success">@lang('Update')</button>
                                                       </div>
                                                   </form>
                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                       </div>
                                    </tr>
                                    @endcan
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="create-modal">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header ">
                <h4 class="modal-title ">@lang('Create New User')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
            </div>
            <form method="post" action="{{route("user.store")}}" enctype="multipart/form-data" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">@lang('Name')</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('Email')</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="password">@lang('Password')</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="role">@lang('Role')</label>
                        <select class="form-control text-black" id="role" name="role_id">

                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="avater">@lang('Avater')</label>
                        <input type="file" class="form-control" id="avater" name="avater" placeholder="Enter Avater">
                    </div>
                    <div class="form-group">
                        <label for="sign">@lang('Sign')</label>
                        <input type="file" class="form-control" id="sign" name="sign" placeholder="Enter Sign">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('Close')
                    </button>
                    <button type="submit" class="btn btn-success">@lang('Save')</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@push('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

function deleteCategory(id){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    }
</script>
<script>

    $(document).on('click', '#showModal', function (e) {
                e.preventDefault();
                $('#create-modal').modal();
        })

</script>

@endpush
