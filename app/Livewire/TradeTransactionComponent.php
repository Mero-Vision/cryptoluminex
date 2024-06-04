<?php

namespace App\Livewire;

use App\Models\ClientBalance;
use App\Models\DeliveryTime;
use App\Models\TradeTransaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class TradeTransactionComponent extends Component
{
    public $deliveryTime = [];
    public $clientBalance = [];

    #[Rule('required|numeric')]
    public $purchase_price = '';

    #[Rule('required|in:bitcoin,tether,ethereum')]
    public $coin;

    #[Rule('required|numeric')]
    public $purchase_amount = '';

    public  $available_balance;





    // public function mount()
    // {
    //     $user = Auth::user();
    //     $this->clientBalance =ClientBalance::where('client_id', $user->id)->first();
    //     $this->available_balance = $this->clientBalance->balance ?? 0;
    // }

    // public function updatedPurchaseAmount()
    // {
    //     if ($this->purchase_amount >$this->available_balance) {
    //         sweetalert()->addWarning('Purchase amount cannot exceed available balance.');
    //     }
    // }


    public function save()
    {
        $this->validate();
        $trade = TradeTransaction::create([
            'purchase_price' => $this->purchase_price,
            'coin' => $this->coin

        ]);
        if ($trade) {
            sweetalert()->addSuccess('Contact has been send successfully!');
            return $this->redirect('/');
        }
    }

   
    
    public function render()
    {
        $user = Auth::user();
        $this->clientBalance = ClientBalance::where('client_id', $user->id)->first();
        $this->deliveryTime = DeliveryTime::join(
            'margin_percents',
            'margin_percents.id',
            '=',
            'delivery_times.margin_percent_id'
        )
            ->select('delivery_times.delivery_time', 'margin_percents.margin_percent')->get();
        return view('livewire.trade-transaction-component');
    }
}