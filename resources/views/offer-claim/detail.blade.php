@extends('admin.layout.layout')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Offer Claim Detail</h2>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Offer Claim User Detail</h6>
        </div>
        <div class="card-body claim-detail">
            <div class="label">
                <span>Full Name: </span>  {{ ucwords($offerClaim['first_name']).' '.ucwords($offerClaim['last_name']) }}
            </div>

            <div class="label">
                <span>Email: </span> {{ $offerClaim['email'] }}
            </div> 

            <div class="label">
                <span>Address 1: </span> {{ ucwords($offerClaim['address1']) }}
            </div> 

            @if($offerClaim['address2'])
                <div class="label">
                    <span>Address 2:</span> {{ ucwords($offerClaim['address2']) }}
                </div> 
            @endif

            <div class="label">
                <span>Postal Code:</span> {{ $offerClaim['postal_code'] }}
            </div> 

            <div class="label">
                <span>City: </span> {{ ucwords($offerClaim['city']) }}
            </div>

            <div class="label">
                <span>Vat No.: </span> {{ $offerClaim['vat_no'] }}
            </div> 

            <div class="label">
                <span>Dell Partner: </span> {{ ($offerClaim['is_dell_partner'] == '1') ? 'Yes' : 'No' }}
            </div>
            
            <div class="label">
                <span>Invoices: </span>{!!$invoices!!}
            </div>
            
            <div class="label">
                <span>Account Owner: </span> {{ ucwords($offerClaim['account_owner']) }}
            </div>

            <div class="label">
                <span>Iban: </span> {{ $offerClaim['iban'] }}
            </div>

            <div class="label">
                <span>Bank: </span> {{ ucwords($offerClaim['bank']) }}
            </div>

            <div class="label">
                <span>Terms and Conditions: </span> {{ $offerClaim['terms_condition']  == 1 ? 'Yes' : 'No' }}
            </div>

            <div class="label">
                <span>Privacy Policy: </span> {{ $offerClaim['privacy_policy'] == 1 ? 'Yes' : 'No' }}
            </div>

            <div class="label">
                <span>Premission to contact: </span> {{ $offerClaim['permission_to_contact']  == 1 ? 'Yes' : 'No' }}
            </div>

            @if($offerClaim['created_at'] != null)
                <div class="label" >
                    <span>Claimed On: </span> <b>{{ dateFormatChange($offerClaim['created_at']) }}</b>
                </div> 
            @endif

            <div class="label">
                <span>Status: </span> 
                <span class="{{$offerClaim['status']}}">
                    {{ucfirst($offerClaim['status'])}}
                </span>
            </div>

            @if($offerClaim['status'] == 'disapproved')
                <div class="label">
                    <span>Disapprove Reason: </span> {{ $reason }}
                </div>
            @endif

            @if($offerClaim['action_taken_by'] != null)
                <div class="label action-taken">
                    <span>Action Taken By: </span> {{ ucwords($offerClaim['name']) }}
                </div> 
            @endif

            <div class="buttons">
                @if($offerClaim['status'] == 'pending')
                    <button class="btn btn-primary" type="button" id="approve-btn" data-url="{{ url('/approve-claim/'. $offerClaim['id']) }}">Approve</button>
                    <button class="btn btn-secondary" type="button" id="disapprove-btn" data-url="{{ url('/disapprove-claim/'. $offerClaim['id']) }}">Disapprove</button>
                @endif
                <a  href="{{route('offer-claims.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back to offer claims</a>
            </div>
        </div>
    </div>
</div>

@include('offer-claim.modal')

@section('page-js')
    <script>
        var url = "";

        $(document).on('click', '#approve-btn', function(e){
            e.preventDefault();
            jQuery('#confirmModal').modal('show');
            url = $(this).attr('data-url');
            // $('#action-form').attr('action', url).submit();
        });

        $(document).on('click', '#yes-btn', function(e){
            e.preventDefault();
            jQuery('#yes-btn').css({"visibility":"hidden"});
            jQuery('#no-btn').css({"visibility":"hidden"});
            jQuery('#loader').css({"visibility":"visible"});
            jQuery('#loader').css({"display":"block"});
            jQuery('#action-form').attr('action', url).submit();
        });

        $(document).on('click', '#disapprove-btn', function(e){
            e.preventDefault();
            jQuery('#disapproveModal').modal('show');
            url = $(this).attr('data-url');
            // $('#action-form').attr('action', url).submit();
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