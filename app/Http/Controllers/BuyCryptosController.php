<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
use App\Models\CoinURL;
use App\Models\CryptoCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyCryptosController extends Controller
{
    public function index(){

        $user = Auth::user();

        $usdt = CryptoCurrency::where('name', 'USDT')->first();
        $btc = CryptoCurrency::where('name', 'Bitcoin')->first();
        $etc = CryptoCurrency::where('name', 'Ethereum')->first();

        $usdtBalance = ClientBalance::join(
            'crypto_currencies',
            'crypto_currencies.id',
            '=',
            'client_balances.currency_id'
        )->where('client_balances.client_id', $user->id)
            ->where('client_balances.currency_id', $usdt->id)
            ->select(
                'client_balances.dollar_balance',
                'crypto_currencies.name',
                'crypto_currencies.symbol',
                'client_balances.wallet_address'

            )->first();


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
                'client_balances.wallet_address'

            )->first();

        $etcBalance = ClientBalance::join(
            'crypto_currencies',
            'crypto_currencies.id',
            '=',
            'client_balances.currency_id'
        )->where('client_balances.client_id', $user->id)
            ->where('client_balances.currency_id', $etc->id)
            ->select(
                'client_balances.dollar_balance',
                'crypto_currencies.name',
                'crypto_currencies.symbol',
                'client_balances.wallet_address'

            )->first();

        $coinURL = CoinURL::first();

        
        return view('buy_cryptos.buy_cryptos', compact('coinURL', 'btcBalance', 'usdtBalance', 'etcBalance'));
    }
}