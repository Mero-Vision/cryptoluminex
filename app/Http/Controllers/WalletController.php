<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
use App\Models\CoinURL;
use App\Models\CryptoCurrency;
use App\Models\WithdrawRecord;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class WalletController extends Controller
{
    public function index()
    {

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
       

        return view('wallet.wallet', compact('coinURL','btcBalance', 'usdtBalance', 'etcBalance'));
    }

    public function receiveUSDTWallet(){

        $coinURL = CoinURL::first();

        return view('wallet.usdt.receiveusdt',compact('coinURL'));
        
    }

    public function receiveBTC()
    {

        $coinURL = CoinURL::first();

        return view('wallet.btc.receivebtc', compact('coinURL'));
    }

    public function receiveETH()
    {

        $coinURL = CoinURL::first();

        return view('wallet.eth.receiveeth', compact('coinURL'));
    }

    public function sendUSDT()
    {

        $coinURL = CoinURL::first();
        $user = Auth::user();

        $usdt = CryptoCurrency::where('name', 'USDT')->first();

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
       

        return view('wallet.usdt.sendusdt', compact('coinURL', 'usdtBalance'));
    }

    public function sendUsdtStore(Request $request){

        $request->validate([
            'wallet_address' => ['required'],
            'withdraw_balance' => ['required','numeric','min:1'],
           
            

        ]);
      

        if ($request->withdraw_balance > $request->available_balance) {
           
            return back()->with('error', 'Your withdraw balance is exceeded!');
        }

       
        
        try{
            $clientBalance=DB::transaction(function()use($request){

                $clientBalance = ClientBalance::where('client_id', auth()->user()->id)
                    ->where('currency_id', 1)->first();
                if ($clientBalance) {
                    $newBalance = $clientBalance->dollar_balance - $request->withdraw_balance;
                    $clientBalance->update([

                        'dollar_balance' => $newBalance,
                    ]);

                    WithdrawRecord::create([
                        'client_id'=>auth()->user()->id,
                        'amount'=> $request->withdraw_balance,
                        'client_wallet_address'=>$request->wallet_address,
                        'coin_type'=>'USDT'
                        
                        
                    ]);
                    
                }
                return $clientBalance;
                
                
            });
            if($clientBalance){
                sweetalert()->addSuccess('Coin has been send Successfully!');
                return back();
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }
        
    }


    public function sendBitcoin()
    {

        $coinURL = CoinURL::first();
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
                'client_balances.wallet_address'

            )->first();


        return view('wallet.btc.sendbtc', compact('coinURL', 'btcBalance'));
    }

    public function sendBitcoinStore(Request $request)
    {
        $request->validate([
            'wallet_address'=>['required'],
            'withdraw_balance'=>['required', 'numeric', 'min:1']
            
        ]);

        if ($request->withdraw_balance > $request->available_balance) {

            return back()->with('error', 'Your withdraw balance is exceeded!');
        }



        try {
            $clientBalance = DB::transaction(function () use ($request) {

                $clientBalance = ClientBalance::where('client_id', auth()->user()->id)
                    ->where('currency_id', 2)->first();
                if ($clientBalance) {
                    
                    $newBalance = $clientBalance->dollar_balance - $request->withdraw_balance;
                    $clientBalance->update([

                        'dollar_balance' => $newBalance,
                    ]);

                    WithdrawRecord::create([
                        'client_id' => auth()->user()->id,
                        'amount' => $request->withdraw_balance,
                        'client_wallet_address' => $request->wallet_address,
                        'coin_type' => 'Bitcoin'


                    ]);
                }
                return $clientBalance;
            });
            if ($clientBalance) {
                sweetalert()->addSuccess('Coin has been send Successfully!');
                return back();
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function sendEtherium()
    {

        $coinURL = CoinURL::first();
        $user = Auth::user();

        $etc = CryptoCurrency::where('name', 'Ethereum')->first();

        $ethBalance = ClientBalance::join(
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


        return view('wallet.eth.sendeth', compact('coinURL', 'ethBalance'));
    }

    public function sendEthStore(Request $request)
    {
        $request->validate([
            'wallet_address' => ['required'],
            'withdraw_balance' => ['required', 'numeric', 'min:1']

        ]);

        if ($request->withdraw_balance > $request->available_balance) {

            return back()->with('error', 'Your withdraw balance is exceeded!');
        }



        try {
            $clientBalance = DB::transaction(function () use ($request) {

                $clientBalance = ClientBalance::where('client_id', auth()->user()->id)
                    ->where('currency_id', 3)->first();
                if ($clientBalance) {
                   
                    $newBalance = $clientBalance->dollar_balance - $request->withdraw_balance;
                    $clientBalance->update([

                        'dollar_balance' => $newBalance,
                    ]);

                    WithdrawRecord::create([
                        'client_id' => auth()->user()->id,
                        'amount' => $request->withdraw_balance,
                        'client_wallet_address' => $request->wallet_address,
                        'coin_type' => 'Ethereum'


                    ]);
                }
                return $clientBalance;
            });
            if ($clientBalance) {
                sweetalert()->addSuccess('Coin has been send Successfully!');
                return back();
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    
    public function withdrawHistory(){

        $withdrawRecords=WithdrawRecord::where('client_id',auth()->user()->id)->latest()->paginate(10);
        return view('wallet.withdraw_history',compact('withdrawRecords'));
        
    }
    
}