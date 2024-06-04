<?php

namespace App\Console\Commands;

use App\Models\ClientBalance;
use App\Models\MarginPercent;
use App\Models\TradeTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TradeTransactionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:trade-transaction-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $trades = TradeTransaction::where('trade_status', null)->get();

        foreach ($trades as $trade) {
            if (Carbon::now() >= Carbon::parse($trade->created_at)->addSeconds($trade->delivery_time)) {
                $user = User::find($trade->client_id);
                if ($user && $user->trade_status == 'profit') {
                    $marginPercent = MarginPercent::join('delivery_times', 'delivery_times.margin_percent_id', '=', 'margin_percents.id')
                    ->select('margin_percents.margin_percent')
                    ->where('delivery_times.delivery_time', '=', $trade->delivery_time)
                        ->first();

                    if ($marginPercent) {
                        $marginAmount = $trade->purchase_amount * ($marginPercent->margin_percent / 100);
                        $profitAmount = $trade->purchase_amount + $marginAmount;

                        $trade->update([
                            'trade_status' => 'profit',
                            'profit_loss' => $marginAmount
                        ]);

                        $coinSymbol = $trade->coin;
                        if ($coinSymbol == "tether") {
                            $coin = 1;
                        } elseif ($coinSymbol == "bitcoin") {
                            $coin = 2;
                        } elseif ($coinSymbol == "ethereum") {
                            $coin = 3;
                        }

                        $clientBalance = ClientBalance::where('client_id', $trade->client_id)->where('currency_id', $coin)->first();

                        if ($clientBalance) {
                            $newBalance = $clientBalance->dollar_balance + $profitAmount;
                            $clientBalance->update(['dollar_balance' => $newBalance]);
                        }
                    }
                } else {
                    $marginPercent = MarginPercent::join('delivery_times', 'delivery_times.margin_percent_id', '=', 'margin_percents.id')
                    ->select('margin_percents.margin_percent')
                    ->where('delivery_times.delivery_time', '=', $trade->delivery_time)
                        ->first();

                    if ($marginPercent) {
                        $marginLossAmount = $trade->purchase_amount * ($marginPercent->margin_percent / 100);
                        $lossAmount = $trade->purchase_amount - $marginLossAmount;

                        $trade->update([
                            'trade_status' => 'loss',
                            'profit_loss' => $marginLossAmount
                        ]);

                        $coinSymbol = $trade->coin;
                        if ($coinSymbol == "tether") {
                            $coin = 1;
                        } elseif ($coinSymbol == "bitcoin") {
                            $coin = 2;
                        } elseif ($coinSymbol == "ethereum") {
                            $coin = 3;
                        }

                        $clientBalance = ClientBalance::where('client_id', $trade->client_id)->where('currency_id', $coin)->first();

                        if ($clientBalance) {
                            $newBalance = ($clientBalance->dollar_balance + $trade->purchase_amount) - $marginLossAmount;
                            $clientBalance->update(['dollar_balance' => $newBalance]);
                        }
                    }
                }
            }
        }
    }
}