<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
use App\Models\CryptoCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BitCoinController extends Controller
{
    public function index(){
        $user = Auth::user();
        $btc = CryptoCurrency::where('name', 'Bitcoin')->first();

        $btcBalance = ClientBalance::join(
            'crypto_currencies',
            'crypto_currencies.id',
            '=',
            'client_balances.currency_id'
        )->where('client_balances.client_id', $user->id)
            ->where('client_balances.currency_id', $btc->id)
            ->select(
                'client_balances.dollar_balance',
                'crypto_currencies.name',
                'crypto_currencies.symbol',
                'client_balances.wallet_address',
            'client_balances.frozen_amount'

            )->first();

        return view('wallet.btc.btc',compact('btcBalance'));
    }
    public function getCoinPrice(Request $request)
    {
        $coinSymbol = $request->input('coin');
        // dd($coinSymbol);

        $response = Http::get("https://api.coincap.io/v2/assets/{$coinSymbol}");


        $currentCoinValue = $response->json('data.priceUsd');




        $clientBalance = ClientBalance::join('crypto_currencies', 'crypto_currencies.id', '=', 'client_balances.currency_id')
            ->select('client_balances.dollar_balance')
            ->whereRaw('LOWER(crypto_currencies.symbol) = LOWER(?)', [$coinSymbol])
            ->where('client_balances.client_id', auth()->user()->id)
            ->first();


        if ($clientBalance) {
            $balance = $clientBalance->dollar_balance;
        } else {
            // Set a default balance or handle the null case
            $balance = '0.00000';
        }

        return response()->json(['currentCoinValue' => $currentCoinValue, 'clientBalance' => $balance]);
    }



    public function convertBTCIndex()
    {

        $user = Auth::user();

        $btc = CryptoCurrency::where('name', 'Bitcoin')->first();

        $btcBalance = ClientBalance::join(
            'crypto_currencies',
            'crypto_currencies.id',
            '=',
            'client_balances.currency_id'
        )->where('client_balances.client_id', $user->id)
            ->where('client_balances.currency_id', $btc->id)
            ->select(
                'client_balances.id',
                'client_balances.dollar_balance',
                'crypto_currencies.name',
                'crypto_currencies.symbol',
                'client_balances.wallet_address',
                'client_balances.frozen_amount'

            )->first();

        $currencies = CryptoCurrency::join(
            'client_balances',
            'client_balances.currency_id',
            '=',
            'crypto_currencies.id'
        )
        ->select('crypto_currencies.name', 'client_balances.id')
        ->where('name', '!=', 'Bitcoin')
        ->where('client_id', auth()->user()->id)->get();


        return view('wallet.btc.convert_btc', compact('btcBalance', 'currencies'));
    }

    public function convertBTC(Request $request)
    {

        $request->validate([
            'convert_balance' => ['required', 'min:1']

        ]);

        if ($request->convert_balance > $request->available_balance) {
            sweetalert()->addWarning('Your convert balance is exceeded!');
            return back();
        }

        if ($request->convert_balance==0) {
            sweetalert()->addWarning('Your convert balance is zero!');
            return back();
        }
        try {

            $clientBalance = DB::transaction(function () use ($request) {

                $clientBalance = ClientBalance::where('id', $request->balance_id)->first();
                $newBalance = $clientBalance->dollar_balance - $request->convert_balance;
                $clientBalance->update([
                    'dollar_balance' => $newBalance,
                ]);

                $transferBalance = ClientBalance::where('id', $request->convert_currency_id)->first();
                $transferNewBalance = $transferBalance->dollar_balance + $request->convert_balance;
                $transferBalance->update([
                    'dollar_balance' => $transferNewBalance,
                ]);

                return $clientBalance;
            });
            if ($clientBalance) {
                sweetalert()->addSuccess('Coin Converted Successfully!');
                return back();
            }
        } catch (\Exception $e) {
            return back()->with($e->getMessage(), 500);
        }
    }
}