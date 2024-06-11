<?php

namespace App\Http\Controllers;

use App\Models\TradeTransaction;
use App\Models\User;
use Illuminate\Http\Request;

class DeliveryReportController extends Controller
{
    public function index(){

        $trades = TradeTransaction::where('trade_status', null)->latest()->get();

    
        
       return view('delivery_report');
    }
}