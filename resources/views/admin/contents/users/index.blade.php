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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Ac Land</li>
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
                                     <tr>
                                         <td>{{$key+1}}</td>
                                         <td>{{$user->name}}</td>
                                         <td>{{$user->email}}</td>
                                         <td>{{$user->role->title}}</td>
                                         <td><img src="{{URL::to($user->avater)}}" style="height: 80px; width:100px;" class="card-img-top" alt="..."></td>
                                         <td>
                                            <div class="d-flex flex-column">
                                                <a href="{{route('user.show', $user->id)}}" class="btn btn-sm btn-outline-success text-black"><i class="far fa-eye"></i></a>
                                                <a href="javascript:void(0)" id="updare-modal" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
                                                <a href="{{route('user.destroy', $user->id)}}" class="btn btn-sm btn-outline-danger"><i class="fas fa-ban"></i></a>
                                             </div>
                                         </td>
                                     </tr>
                                     <div class="modal fade" id="updare-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-success">
                                                <div class="modal-header ">
                                                    <h4 class="modal-title ">@lang('Create New User')</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                </div>
                                                <form method="post" action="{{route("user.store")}}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">@lang('Name')</label>
                                                            <input type="text" class="form-control" value="{{$item->name}}" id="name" name="name" placeholder="Enter Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">@lang('Email')</label>
                                                            <input type="email" class="form-control" value="{{$item->email}}" id="email" name="email" placeholder="Enter Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">@lang('Password')</label>
                                                            <input type="text" class="form-control"  value="{{$item->password}}"  id="password" name="password" placeholder="Enter Password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="role">@lang('Role')</label>
                                                            <select class="form-control text-black" id="role" name="role_id">

                                                                @foreach ($roles as $role)
                                                                    <option @if($item->role_id == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="avater">@lang('Avater')</label>
                                                            <input type="file" class="form-control" id="avater" name="avater" placeholder="Enter Avater">
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
            <form method="post" action="{{route("user.store")}}">
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
<script>

        $(document).on('click', '#showModal', function (e) {
                    e.preventDefault();
                    $('#create-modal').modal();
            })
</script>
@endpush
