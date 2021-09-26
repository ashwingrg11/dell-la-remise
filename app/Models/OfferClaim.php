<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class OfferClaim extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'address1',
        'address2',
        'postal_code',
        'city',
        'vat_no',
        'is_dell_partner',
        'invoice',
        'status',
        'account_owner',
        'iban',
        'bank',
        'privacy_policy',
        'terms_condition',
        'permission_to_contact',
        'action_taken_by',
        'disapprove_reason'
    ];

    /**
     * Get the data from offer claim model
     *
     * @return 
     */
    public function listOfferClaims()
    {
        $query = $this->select(
            'offer_claims.id',
            // 'offer_claims.first_name',
            // 'offer_claims.last_name',
            DB::raw("CONCAT(offer_claims.first_name,' ',offer_claims.last_name) as full_name"),
            'offer_claims.email',
            'offer_claims.address1',
            'offer_claims.address2',
            'offer_claims.postal_code',
            'offer_claims.city',
            'offer_claims.vat_no',
            'offer_claims.is_dell_partner',
            'offer_claims.invoice',
            'offer_claims.status',
            'offer_claims.account_owner',
            'offer_claims.iban',
            'offer_claims.bank',
            'offer_claims.permission_to_contact',
            'offer_claims.action_taken_by',
            'offer_claims.disapprove_reason',
            'users.name',
            'offer_claims.id as offerclaim_id',
            'offer_claims.created_at'
        )
            ->leftjoin('users', 'users.id', '=', 'offer_claims.action_taken_by');

        return DataTables::of($query)
                ->filterColumn('full_name', function ($query, $keyword) {
                    $query->whereRaw("CONCAT(offer_claims.first_name,' ',offer_claims.last_name) like ?", ["%$keyword%"]);
                })
            // ->addColumn('full_name', function ($row) {
            //     return $row->first_name . ' ' . $row->last_name;
            // })
            ->editColumn('dell_partner', function ($query) {
                if ($query->is_dell_partner == '0') {
                    return 'No';
                } else {
                    return 'Yes';
                }
            })
            ->editColumn('files', function ($query) {
                $x = '';
                if (!empty($query->invoice)) {
                    $invoices = json_decode($query->invoice);
                    foreach ($invoices as $key => $invoice) {
                        $x .=  url('/download/' . $invoice) . ' , <br>';
                    }
                }
                return $x;
            })
            ->editColumn('offerclaim_id', function ($query) {
                $x = '';
                if ($query->status == 'pending') {
                    $x .= '<a href="#" class="approveClaim" data-url="' . url('/approve-claim/' . $query->offerclaim_id) . '" > Approve </a>
                            <a href="#" class="disapproveClaim" data-id="' . $query->offerclaim_id . '" data-url = "' . url('/disapprove-claim/' . $query->offerclaim_id) . '">Disapprove</a>';
                } else if ($query->status == 'approved') {
                    $x = '';
                } else if ($query->status == 'disapproved') {
                    $x = '';
                }
                return '<a href="' . url('/offer-claim/' . $query->offerclaim_id) . '"> Details </a>' . $x;
            })
            ->editColumn('created_at',function($query){
                return '<b>'.dateFormatChange($query->created_at).'</b>'; 
            })
            ->rawColumns([
                'dell_partner', 'offerclaim_id', 'files', 'created_at'
            ])
            ->make();
    }

    /**
     * Store the offer claim form data
     *
     * @param Object $request
     * @return Object Offer-claim model object
     */
    public function storeClaimOffer($request)
    {
        $invoices = $request->invoice;
        foreach ($invoices as $key => $invoice) {
            $rand_invoice_name = Str::random(20);
            $invoice_name = $rand_invoice_name . time() . '.' . $invoice->getClientOriginalExtension();
            $address = 'invoice/' . $invoice_name;
            $savedimage = Storage::disk('s3')->put($address, file_get_contents($invoice));
            $invoice_collection[] = $invoice_name;
        }
        $invoices = json_encode($invoice_collection);
        $offer_claim = $this->create([
            'first_name' =>  $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'vat_no' => $request->vat_no,
            'invoice' => $invoices,
            'account_owner' => $request->acc_owner,
            'iban' => $request->iban,
            'bank' => $request->bank_name,
            'is_dell_partner' => $request->is_dell_partner,
            'status' => 'pending',
            'permission_to_contact' => $request->permission_to_contact ?? 0,
            'privacy_policy' => $request->privacy ?? 0,
            'terms_condition' => $request->terms ?? 0,
        ]);
        return $offer_claim;
    }

    public function getOfferClaim(){
        $offerClaim = $this->leftjoin('users', 'users.id', '=', 'offer_claims.action_taken_by')
                            ->where('offer_claims.id', $this->id)
                            ->select('offer_claims.*', 'users.name')
                            ->first()
                            ->toArray();
        return $offerClaim;
    }

    public function changeClaimRequestStatus($status,$reason = NULL){
        $this->status = $status;
        $this->action_taken_by = Auth::id();
        $this->disapprove_reason = $reason;
        $this->save();
    }
}
