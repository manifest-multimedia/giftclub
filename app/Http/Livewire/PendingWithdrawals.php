<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Withdrawal;

class PendingWithdrawals extends Component
{
    public function render()
    {
        $withdrawals=Withdrawal::where('status', 'pending')->get();
        return view('livewire.pending-withdrawals', compact('withdrawals'));
    }
}
