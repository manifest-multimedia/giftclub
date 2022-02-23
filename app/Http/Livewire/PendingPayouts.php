<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Payout;


class PendingPayouts extends Component
{
    
    public function render()
    {
        $payouts=Payout::where('status', 'pending')->get();
        return view('livewire.pending-payouts', compact('payouts'));
    }
}
