<?php

namespace App\Livewire;

use App\Models\TradeTransaction;
use Carbon\Carbon;
use Livewire\Component;

class DeliveryFinishedComponent extends Component
{
    public $finishedTrades = [];
    
    public function render()
    {
        $this->finishedTrades = TradeTransaction::where('trade_status', '!=', null)
            ->where('client_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->latest()->get();
            
        return view('livewire.delivery-finished-component');
    }
}