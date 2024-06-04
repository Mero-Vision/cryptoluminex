<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineServiceController extends Controller
{
    public function index(){
        return view('online_service.online_service');
    }

    
}