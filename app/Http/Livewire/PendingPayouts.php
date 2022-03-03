<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\PayoutSchedule;


class PendingPayouts extends Component
{
    
    public function render()
    {
        $payouts=PayoutSchedule::where('payout_status', 'due')->paginate(5);
        return view('livewire.pending-payouts', compact('payouts'));
    }
}
