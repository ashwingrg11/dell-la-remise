<?php

namespace App\Http\Controllers;

use App\Mail\ClaimApprovedUser;
use App\Mail\ClaimRejectedUser;
use App\Mail\ClaimSavedUser;
use App\Mail\OfferClaimStatusAdmin;
use App\Models\OfferClaim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class OfferClaimController extends Controller
{
    protected $offerClaim, $user;

    public function __construct(OfferClaim $offerClaim, User $user)
    {
        $this->offerClaim = $offerClaim;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $offerClaims = $this->offerClaim->listOfferClaims();
        }

        return view('offer-claim.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $offer_claim = $this->offerClaim->storeClaimOffer($request);
            if ($offer_claim) {
                $this->sendMailToUser('pending', $request->email, $request->all());
                $this->sendMailToAdmins('pending', $request->all(), null);
                DB::commit();
                $request->session()->put('submitted', true);
            }else{
                DB::rollback();
                $request->session()->put('submitted', false);
            }
            return redirect('/');    
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->put('submitted', false);
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $offerClaim = $this->offerClaim->findOrFail($id);
            $offerClaim = $offerClaim->getOfferClaim();
            $invoices = json_decode($offerClaim['invoice']);
            foreach($invoices as $key => $invoice){
                $url = url('/download/'.$invoice);
                $array[] = '<a href = "'.$url.'" target="__blank"> Download Invoice '.++$key.'</a>';
            }
            $invoices = implode(',',$array);
            $disapproved_reason = $offerClaim['disapprove_reason'];
            $reason = $this->getDisapproveReason($disapproved_reason);
            return view('offer-claim.detail', compact('offerClaim', 'invoices', 'reason'));
        }catch(\Exception $e){
            return redirect()->back()->with('error-message', 'Oops!Something went wrong. Please try again later.');
        }
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve($id)
    {
        $offerClaim = $this->offerClaim->findOrFail($id);
        DB::beginTransaction();
        try {
            $status = 'approved';
            $offerClaim->changeClaimRequestStatus($status);
            $user_name = $this->user->getUser($offerClaim->action_taken_by);

            $this->sendMailToUser($status, $offerClaim->email, $offerClaim);
            $this->sendMailToAdmins($status, $offerClaim, $user_name[0]);

            DB::commit();
            return redirect()->route('offer-claims.index')->with('message', 'Offer Claim Approved');
        } catch (\Excepton $e) {
            DB::rollback();
            return redirect()->route('offer-claims.index')->with('error-message', 'Oops!Something went wrong. Please try again later. ');
        }
    }

    public function disapprove($id, Request $request)
    {
        $offerClaim = $this->offerClaim->findOrFail($id);

        DB::beginTransaction();
        try {
            $status = 'disapproved';
            if(empty($request->disapproval_reason))
                throw(new \Exception ("Disapprove Reason Needed."));            
            $reason = $request->disapproval_reason;
            
            $offerClaim->changeClaimRequestStatus($status,$reason);
            $user_name = $this->user->getUser($offerClaim->action_taken_by);

            $this->sendMailToUser($status, $offerClaim->email, $offerClaim);
            $this->sendMailToAdmins($status, $offerClaim, $user_name[0]);
            
            DB::commit();
            return redirect()->route('offer-claims.index')->with('message', 'Offer Claim Disapproved');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('offer-claims.index')->with('error-message', 'Oops!Something went wrong. Please try again later. ');
        }
    }

    protected function sendMailToUser($status, $email, $detail)
    {

        if ($status == 'approved') {
            $offerClaimMail = new ClaimApprovedUser($detail);
        } else if ($status == 'disapproved') {
            $offerClaimMail = new ClaimRejectedUser($detail);
        } else if ($status == 'pending') {
            $offerClaimMail = new ClaimSavedUser($detail);
        }
        Mail::to($email)->send($offerClaimMail);
        return;
    }

    protected function sendMailToAdmins($status, $offerdetail, $user_name)
    {
        $list = $this->user->getAdminEmails()->toArray();
        if ($list) {
            $email = array_column($list, 'email');
            $mail = new OfferClaimStatusAdmin($status, $offerdetail, $user_name);
            Mail::bcc($email)->send($mail);
        }
        return;
    }

    /**
     * Get englich language version on disapproved reason
     *
     * @param string $disapproved_reason
     * @return string
     */
    protected function getDisapproveReason($disapproved_reason){
        $reason = '';
        switch ($disapproved_reason) {
            case "Preuve d'achat Dell non conforme":
                $reason = "Non compliant proof of purchase";
                break;

            case "Produits achetés chez un distributeur ne participant pas à l'opération":
                $reason = "Products purchased at a distributor who's not taking part in this program";
                break;

            case "Gamme de produit non éligible":
                $reason = "Product family is not eligible to this program";
                break;

            case "Produits non éligible à l'opération":
                $reason = "Product non eligible to this program";
                break;

            case "Coordonnées bancaires ne correspondent pas à la société demandant le recyclage":
                $reason = "Banking details seem not to be those of requesting company";
                break;

            case "Facture d'achat hors de la période de promotion":
                $reason = "Purchase invoice date is outside promotion period";
                break;

            case "Maximum du remboursement déjà demandé ce mois-ci":
                $reason = "Maximum cashback already claimed this month";
                break;

            default:
                $reason = $disapproved_reason;
                break;
        }
        return $reason;
    }
}
