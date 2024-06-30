<?php

namespace App\Http\Controllers;

use App\Http\Requests\Trade\TradeTransactionCreateRequest;
use App\Models\ClientBalance;
use App\Models\TradeTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class TradeTransactionController extends Controller
{
    public function store(TradeTransactionCreateRequest $request)
    {
        
        $user = Auth::user();
        // $documentVerification= User::where('id', $user->id)->first();
        // if($documentVerification->verification_status=='unverified'){
        //     sweetalert()->addWarning('Document is not verified');
        //     return back();
        // }

        
        if ($request->purchase_amount > $request->available_balance) {
            $balanceShortage = $request->purchase_amount - $request->available_balance;
            $errorMessage = 'Sorry, your available balance is insufficient. You need an additional USDT ' . number_format($balanceShortage, 2) . ' to complete this trade.';

            sweetalert()->addWarning($errorMessage);
            return back();
        }

        $existingTrade = TradeTransaction::where('client_id', auth()->user()->id)
        ->where('trade_status', null)
        ->get();
        if ($existingTrade->isNotEmpty()) {
            sweetalert()->addWarning('Please wait until the previous trade is completed.');
            return back();
        }

        if ($request->delivery_time == 60 && $request->purchase_amount < 10) {
            sweetalert()->addWarning('To trade with a 60-seconds delivery time, the purchase amount must be $10 or more.');
            return back();
        }

        if ($request->delivery_time == 120 && $request->purchase_amount < 1000) {
            sweetalert()->addWarning('To trade with a 120-seconds delivery time, the purchase amount must be $1000 or more.');
            return back();
        }

        if ($request->delivery_time == 1800 && $request->purchase_amount < 10000) {
            sweetalert()->addWarning('To trade with a 1800-seconds delivery time, the purchase amount must be $10000 or more.');
            return back();
        }

        if ($request->delivery_time == 43200 && $request->purchase_amount < 50000) {
            sweetalert()->addWarning('To trade with a 12 hours delivery time, the purchase amount must be $50000 or more.');
            return back();
        }



        // $chargeAmount = $request->purchase_amount * 0.02;
        // $purchaseAmount=$request->purchase_amount-$chargeAmount;


        try {
            $trade = DB::transaction(function () use ($request) {
                $trade = TradeTransaction::create([
                    'client_id' => auth()->user()->id,
                    'purchase_price' => $request->purchase_price,
                    'coin' => $request->coin,
                    'trade_type' => $request->trade_type,
                    'delivery_time' => $request->delivery_time,
                    'fees'=>2,
                    'purchase_amount' =>  $request->purchase_amount

                ]);
                // app(Schedule::class)->call(function () use ($trade) {
                //     $trade->update(['trade_status' => 'profit']);
                // })->when(function () use ($trade) {
                //     return Carbon::now() >= Carbon::parse($trade->created_at)->addSeconds($trade->delivery_time);
                // });
                $coinSymbol = $request->coin;
                if ($coinSymbol == "tether") {
                    $coin = 1;
                } elseif ($coinSymbol == "bitcoin") {
                    $coin = 2;
                } elseif ($coinSymbol == "ethereum") {
                    $coin = 3;
                }
                
                $clientBalance=ClientBalance::where('client_id',auth()->user()->id)
                ->where('currency_id',$coin)->first();
                if($clientBalance){
                    $newBalance = $clientBalance->dollar_balance - $request->purchase_amount;
                    $clientBalance->update([

                        'dollar_balance' => $newBalance,
                    ]);
                }

                
                return $trade;
            });
            if ($trade) {
                sweetalert()->addSuccess('Trade Successfully!');
                return back();
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function tradeHistory(){
        $finishedTrades = TradeTransaction::where('trade_status', '!=', null)
        
        ->where('client_id', auth()->user()->id)->latest()->paginate(6);
        return view('trade_history',compact('finishedTrades'));
    }
}