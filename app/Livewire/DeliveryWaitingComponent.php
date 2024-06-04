<?php

namespace App\Livewire;

use App\Models\TradeTransaction;
use Livewire\Component;

class DeliveryWaitingComponent extends Component
{
    public $trades = [];
    
    public function render()
    {
        $this->trades = TradeTransaction::where('trade_status', null)
            ->where('client_id', auth()->user()->id)->latest()->get();
            
        return view('livewire.delivery-waiting-component');
    }
}