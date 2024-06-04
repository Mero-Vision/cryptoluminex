<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermConditionsController extends Controller
{
    public function termsandConditions(){

        return view('terms_conditions');
        
    }

    public function privacyPolicy(){
        return view('privacy_policy');
    }
}