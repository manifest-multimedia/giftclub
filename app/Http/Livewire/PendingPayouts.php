<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class PendingPayouts extends Component
{
    
    public function render()
    {
        $payouts=[];

       

        return view('livewire.pending-payouts', compact('payouts'));
    }
}
