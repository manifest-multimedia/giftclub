<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payout;
use Auth;

class Payouts extends Component
{
    public function render()
    {
        $user_id=Auth::user()->id; 
        $payouts=Payout::where('id', $user_id)->latest()->get();
        return view('livewire.payouts', compact('payouts'));
    }
}
