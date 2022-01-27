<div class="table-responsive">
    <table class="table table-bordered table-hover data-table">
        <thead style="background-color:green" class="text-white">
            <tr class="text-center">
                <th>ক্রমিক</th>
                <th>আবেদন কারি</th>
                <th>আবেদন কারির পিতা/স্বামী</th>
                <th>ঠিকানা</th>
                <th>ছবি</th>
                <th>অবস্থা</th>
                <th>কার্যক্রম</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $key => $application)
             <tr>
                 <td>{{$key+1}}</td>
                 <td>{{$application->main_name}}</td>
                 <td>{{$application->main_fathers_name}}</td>
                 <td>{{$application->main_village}}, {{$application->union->name}}, {{$application->upa_zila->name}}</td>
                 <td><img src="{{URL::to($application->avater)}}" style="height: 80px; width:100px;" class="card-img-top" alt="..."></td>
                 <td>
                    @if ($application->status == 0)
                        <span class="badge badge-pill badge-warning">শুরু করেনি</span>
                    @elseif ($application->status == 2)
                        <span class="badge badge-pill badge-primary">চলমান</span>
                    @elseif ($application->status==1 )
                        <span class="badge badge-pill badge-success">সম্পূর্ণ</span>
                    @endif
                 </td>
                 <td>
                    <div class="d-flex flex-column">
                        <a href="{{route('show.app', $application->id)}}" class="btn btn-sm btn-outline-success text-black"><i class="far fa-eye"></i></a>
                        <a href="{{route('edit.app', $application->id)}}" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteApplication({{ $application->id}})"><i class="fas fa-ban"></i></button>
                        <form id="delete-form-{{$application->id}}" action="{{route('application.destroy',$application->id)}}" method="POST" style="display: none;" >
                            @csrf
                            @method('DELETE')
                        </form>
                     </div>

                 </td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('js')

<script type="text/javascript">

    // deleting application method by ajax request
    function deleteApplication(id){
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
@endpush
