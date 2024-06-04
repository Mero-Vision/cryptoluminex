<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
use App\Models\CryptoCurrency;
use App\Models\DeliveryTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home(){
        $wallet=request()->query('wallet');

        // $clientBalance=ClientBalance::where('client_id',auth()->user()->id)
        // ->when($wallet,function($query)use($wallet){
        //     if($wallet=="BTC"){
        //         $query->where('currency_id',2);
        //     }
        //     elseif ($wallet == "USDT") {
        //         $query->where('currency_id', 1);
        //     } elseif ($wallet == "ETH") {
        //         $query->where('currency_id', 3);
        //     }
        // })->latest()->first();
        $clientBalance = ClientBalance::where('client_id', auth()->user()->id)
        ->sum('dollar_balance');
        
        // $coin=CryptoCurrency::where('id',$clientBalance->currency_id)->first();
        return view('home',compact('clientBalance'));
        
    }

    public function getQuotationData()
    {
        $response = Http::get('https://www.antcontract.cc/api/currency/quotation_new');
        return $response->json();
    }

    
    public function index(){
        $user = Auth::user();
        $clientBalance = ClientBalance::where('client_id', $user->id)->first();
        $deliveryTime=DeliveryTime::latest()->get();


        // Fetch crypto data from the CoinCap API
        $response = Http::get('https://api.coincap.io/v2/assets', [
            'limit' => 10, // Adjust the number of coins you want to display
        ]);

        $cryptoData = $response->json()['data'];

        
        return view('trade',compact('clientBalance', 'deliveryTime', 'cryptoData'));
    }
}