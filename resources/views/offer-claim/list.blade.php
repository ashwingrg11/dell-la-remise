@extends('admin.layout.layout')

@section('content')

    {{-- @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('message') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif --}}

    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Offer Claims</h2>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Offer Claim List</h6>
            </div>
            <div class="card-body offer-body">
                <div class="table-responsive">
                    <table class="manage-table responsive-table manage-table-all responsive nowrap" id="offer-claim-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><i class="fa fa-user"></i>Name</th>
                                <th><i class="fa fa-user"></i>Email</th>
                                <th><i class="fa fa-user"></i>Address1</th>
                                <th><i class="fa fa-user"></i>Address2</th>
                                <th><i class="fa fa-user"></i>Postal Code</th>
                                <th><i class="fa fa-user"></i>City</th>
                                <th><i class="fa fa-user"></i>Vat No.</th>
                                <th><i class="fa fa-user"></i>Account Owner</th>
                                <th><i class="fa fa-user"></i>Iban</th>
                                <th><i class="fa fa-user"></i>Bank</th>
                                <th><i class="fa fa-user"></i>Status</th>
                                <th><i class="fa fa-user"></i>Action Taken By</th>
                                <th><i class="fa fa-user"></i>Claimed On</th>
                                <th><i class="fa fa-user"></i>Dell Partner?</th>
                                <th>Action</th>
                                <th>Disapproval Reason</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@include('offer-claim.modal')

@section('page-js')

    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
        var url = "";
        $(document).ready(function($){
            $.noConflict();
            $("#offer-claim-table").DataTable({
                "dom": 'Bfrtip',
                "searching": true,
                "serverSide": true,
                "processing": true,
                "pageLength" : 10,
                "order": [12, "desc"],
                "columnDefs": [
                    {
                        "targets": [2,3,4,5,6,7,15,16],
                        "visible": false,
                    },
                    {
                        "searchable": false,
                        "targets": [2,3,4,5,6,7,14,15,16]
                    },
                    {
                        "targets": [10],
                        "createdCell": function(td, cellData, rowData, row, col){
                            switch(cellData) {
                                case "pending":
                                    $(td).addClass('pending');
                                    break;
                                case "approved":
                                    $(td).addClass('approved');
                                    break;
                                case "disapproved":
                                    $(td).addClass('disapproved');
                                    break;
                            }
                        }
                    }
                ],
                buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,15,16]
                        },
                        title: 'Offer Claims'
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,15,16],
                        },
                        title: 'Offer Claims'
                    }
                ],
                ajax: {
                    "url": "{{ url('/offer-claim') }}",
                },
                columns: [
                    {data: 'full_name', name:'full_name'},
                    {data: 'email', name: 'offer_claims.email'},
                    {data: 'address1', name:'offer_claims.address1'},
                    {data: 'address2', name:'offer_claims.address2'},
                    {data: 'postal_code', name:'offer_claims.postal_code'},
                    {data: 'city', name:'offer_claims.city'},
                    {data: 'vat_no', name:'offer_claims.vat_no'},
                    {data: 'account_owner', name:'offer_claims.account_owner'},
                    {data: 'iban', name:'offer_claims.iban'},
                    {data: 'bank', name:'offer_claims.bank'},
                    {data: 'status', name: 'offer_claims.status'},
                    {data: 'name', name: 'users.name'},
                    {data: 'created_at', name:'offer_claims.created_at'},
                    {data: 'dell_partner', name: 'offer_claims.is_dell_partner'},
                    {data: 'offerclaim_id', name: 'offerclaim_id', orderable:false},
                    {data: 'disapprove_reason', name:'disapprove_reason'},
                    {data: 'files', name: 'files'},
                ]
            });
        });

        $(document).on('click', '.approveClaim', function(e){
            e.preventDefault();
            jQuery('#confirmModal').modal('show');
            url = jQuery(this).attr('data-url');
        });

        $(document).on('click', '#yes-btn', function(e){
            e.preventDefault();
            jQuery('#yes-btn').css({"visibility":"hidden"});
            jQuery('#no-btn').css({"visibility":"hidden"});
            jQuery('#loader').css({"visibility":"visible"});
            jQuery('#loader').css({"display":"block"});
            jQuery('#action-form').attr('action', url).submit();
        });

        $(document).on('click', '.disapproveClaim', function(e){
            e.preventDefault();
            jQuery('#disapproveModal').modal('show');
            url = jQuery(this).attr('data-url');
        });

        var radio = $('#disapproveModal input[type="radio"]');

        radio.on('change', function(){
            if(jQuery('#other_reason').is(':checked')) {
                jQuery('#submit-btn').prop('disabled', true);
                jQuery("#message").show();
            }
            else {
                jQuery('#submit-btn').prop('disabled', false);
                jQuery("#message").hide();
            }
        });

        $('textarea#message').on('input', function(e){
            if(e.target.value === ''){
                jQuery('#submit-btn').prop('disabled', true);
            } else {
                jQuery('#submit-btn').prop('disabled', false);
            }
        });

        $(document).on('click', '#submit-btn', function(e){
            e.preventDefault();
            if(jQuery('#other_reason').is(':checked')) {
                var textareavalue = jQuery('textarea#message').val();
                jQuery('input[name="disapproval_reason"]').val(textareavalue)
            } else {
                var radiobuttonvalue = jQuery("input[name='reason']:checked").val();
                jQuery('input[name="disapproval_reason"]').val(radiobuttonvalue);
            }
            jQuery('#submit-btn').css({"visibility":"hidden"});
            jQuery('#cancel-btn').css({"visibility":"hidden"});
            jQuery('#disapprove-loader').css({"visibility":"visible"});
            jQuery('#disapprove-loader').css({"display":"block"});
            jQuery('#action-form').attr('action', url).submit();
        });
    </script>
@endsection

@endsection
        
