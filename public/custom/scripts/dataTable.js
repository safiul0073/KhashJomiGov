$(document).ready(function() {
    $('#all_application_table').DataTable({
        'processing': true,
        'serverSide': true,
        ajax: {
            url: '/admin/applications-list',
            type: 'get',
            data: function (d) {
                d.status = $('#status').val();
            }
        },
        'columns': [
            {data: 'id', name: 'id'},
            {data: 'name', name:'name'},
            {data: 'father', father: 'name'},
            {data: 'address', name: 'address'},
            {data: 'avater', name: 'avater'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ],
        "order": [
            [0, "desc"]
        ],
        oLanguage: {sProcessing: "<div id='loader'><span>Processing...</span></div>"}

    });

    $('#status').on('change',function(e){
        // e.preventDefault();
        $('#all_application_table').DataTable().draw(true);

    });
})
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
