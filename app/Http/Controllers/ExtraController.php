<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtraController extends Controller
{
    /**
     * Get the legal notice view
     *
     * @return view
     */
    public function getLegalNotice()
    {
        return view('legal-notice');
    }

    /**
     * Get the terms and conditions of la remise en plus
     *
     * @return view
     */
    public function getTermsAndConditions()
    {
        return view('terms-and-conditions');
    }

     /**
     * Download the invoice if exists
     *
     * @param string $invoice
     * @return Response
     */
    public function download($invoice)
    {
        if(Storage::disk('s3')->exists('invoice/'.$invoice)){
            return Storage::disk('s3')->download('invoice/'.$invoice);
        }else 
            throw(new HttpException(404,"File Not Found"));            
    }
}
