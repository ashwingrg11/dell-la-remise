<?php
/**
 * This file consists of custom helper functions.
 */

use Carbon\Carbon;

if (!function_exists('cloudfrontUrl')) {
    function cloudfrontUrl($path='')
    {
        if(env('APP_ENV') == 'production')
            return env('CLOUDFRONT_URL').$path;
        else
            return asset($path);
    }
}

if(!function_exists('dateFormatChange')){
    function dateFormatChange($date){
        $date = Carbon::parse($date);
        return $date->isoFormat('MMM Do YYYY'); 
    }
}

if(!function_exists('dateFormatChange')){
    function dateFormatChange($date){
        $date = Carbon::parse($date);
        return $date->isoFormat('MMM Do YYYY'); 
    }
}