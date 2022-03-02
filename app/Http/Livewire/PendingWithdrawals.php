<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Withdrawal;

class PendingWithdrawals extends Component
{
    public $withdrawal_id; 

    public function render()
    {
        $withdrawals=Withdrawal::where('status', 'pending')->paginate(5);
        return view('livewire.pending-withdrawals', compact('withdrawals'));
    }

    public function Save(){
        dd($this->withdrawal_id); 
    }
}
