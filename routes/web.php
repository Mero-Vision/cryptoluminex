<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BitCoinController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ClientRechargeController;
use App\Http\Controllers\ETHController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradeTransactionController;
use App\Http\Controllers\USDTController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });




// Route::get('/currency/quotation', [HomeController::class, 'getQuotationData']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
// Route::get('logout', [AuthController::class, 'logout']);

Route::get('register', [UserController::class, 'index']);

// Route::get('forgot-password', [ForgotPasswordController::class, 'index']);
// Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
// Route::get('reset_password', [ForgotPasswordController::class, 'resetPasswordIndex']);
// Route::post('reset_password', [ForgotPasswordController::class, 'resetPassword']);

// Route::get('terms-conditions',[TermConditionsController::class, 'termsandConditions']);
// Route::get('privacy-policy', [TermConditionsController::class, 'privacyPolicy']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('/trade', [HomeController::class, 'index']);
    Route::get('/user-info', [UserController::class, 'userInfoIndex']);
    Route::get('user-info/deposit', [UserController::class, 'verifyDocument']);
    Route::get('user-info/profile', [ProfileController::class, 'index']);

    Route::get('/about', [AboutController::class, 'index']);

    Route::get('market', [MarketController::class, 'index']);

    //     Route::get('wallet', [ProfileController::class, 'index']);


    //     Route::get('settings', [SettingController::class, 'index']);
    Route::get('change-password', [ChangePasswordController::class, 'index']);
    Route::post('change-password', [ChangePasswordController::class, 'changepassword']);

    Route::get('/get-coin-price', [BitCoinController::class, 'getCoinPrice']);

    //     Route::get('recharge-verification',[ClientRechargeController::class,'index']);
    //     Route::get('recharge-verification/create', [ClientRechargeController::class, 'create']);
    Route::post('recharge-verification/create', [ClientRechargeController::class, 'store']);




    Route::get('wallet', [WalletController::class, 'index']);

    Route::get('wallet/usdt', [USDTController::class, 'index']);
    Route::get('wallet/receive/usdt', [WalletController::class, 'receiveUSDTWallet']);
    Route::post('wallet/send/usdt', [WalletController::class, 'sendUsdtStore']);
    Route::get('wallet/send/usdt', [WalletController::class, 'sendUSDT']);
    Route::get('wallet/convert/usdt', [USDTController::class, 'convertUSDTIndex']);
    Route::post('wallet/convert/usdt', [USDTController::class, 'convertUSDT']);

    Route::get('wallet/btc', [BitCoinController::class, 'index']);
    Route::get('wallet/receive/btc', [WalletController::class, 'receiveBTC']);
    Route::get('wallet/send/btc', [WalletController::class, 'sendBitcoin']);
    Route::post('wallet/send/btc', [WalletController::class, 'sendBitcoinStore']);
    Route::get('wallet/convert/btc', [BitCoinController::class, 'convertBTCIndex']);
    Route::post('wallet/convert/btc', [BitCoinController::class, 'convertBTC']);

    Route::get('wallet/eth', [ETHController::class, 'index']);
    Route::get('wallet/receive/eth', [WalletController::class, 'receiveETH']);
    Route::get('wallet/send/eth', [WalletController::class, 'sendEtherium']);
    Route::post('wallet/send/eth', [WalletController::class, 'sendEthStore']);
    Route::get('wallet/convert/eth', [ETHController::class, 'convertETHIndex']);
    Route::post('wallet/convert/eth', [ETHController::class, 'convertETH']);


    //     Route::get('wallet/withdraw-history',[WalletController::class, 'withdrawHistory']);


    //     Route::post('profile/verify-document', [UserController::class, 'storeVerificationImage']);


    //     Route::get('crypto', [CryptoCurrencyController::class, 'index']);

    Route::post('trade-transaction', [TradeTransactionController::class, 'store']);

    //     Route::get('delivery-report',[DeliveryReportController::class,'index']);

    //     Route::get('online-service',[OnlineServiceController::class,'index']);

        Route::get('trade-history',[TradeTransactionController::class, 'tradeHistory']);

    //     Route::get('my-verification-id',[UserController::class, 'viewVerificationImage']);

    //     Route::get('buy-cryptos/wallet',[BuyCryptosController::class,'index']);


});