@extends('admin.layout.layout')

@section('content')

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">List of Users</h2>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        </div>
        <div class="card-body">
            <div class="table-respnosive">
                <table class="manage-table responsive-table manage-table-all responsive nowrap" id="user-table"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><i class="fa fa-user"></i>Name</th>
                            <th><i class="fa fa-user"></i>Email</th>
                            <th><i class="fa fa-user"></i>Status</th>
                            <th><i class="fa fa-user"></i>Action</th>
                            <th><i class="fa fa-user"></i>Created At</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<form id="delete-form" action="" method="POST" style="display:none;">
    @csrf
    {{ method_field('DELETE') }}
</form>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="stepsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top:100px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="yes-btn">Yes</button>
            </div>
        </div>
    </div>
</div>


@section('page-js')
<script>
    var url = "";
        $(document).ready(function ($) {
            $.noConflict();
            $("#user-table").DataTable({
                "dom": 'Bfrtip',
                "searching": true,
                "processing": true,
                "pageLength": 10,
                "order": [[4, "desc"]],
                "columnDefs": [
                    {
                        "targets": [4],
                        "visible": false,
                    }],
                ajax: {
                    "url": "{{ url('/users') }}",
                },
                columns: [{
                        data: 'name',
                        name: 'users.name'
                    },
                    {
                        data: 'email',
                        name: 'users.email'
                    },
                    {
                        data: 'user_status',
                        name: 'user_status'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id',
                        orderable: false
                    },
                    {
                        data: 'created_at',
                        name: 'users.created_at'
                    }
                ]
            });
        });

        $(document).on('click', '.delete-user', function(e){
            jQuery('#confirmModal').modal('show');
            url = jQuery(this).attr('data-url');
        });

        $(document).on('click', '#yes-btn', function(e){
            e.preventDefault();
            jQuery('#delete-form').attr('action', url).submit();
        });

</script>

@endsection

@endsection