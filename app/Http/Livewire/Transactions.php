<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction; 
use Auth;

class Transactions extends Component
{
    
    public function render()
    {
        $user_id=Auth::user()->id; 
        $transactions=Transaction::where('user_id', $user_id)->latest()->get(); 
        return view('livewire.transactions', compact('transactions'));
    }
}
