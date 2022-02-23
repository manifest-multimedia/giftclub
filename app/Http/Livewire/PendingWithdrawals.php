<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PendingWithdrawals extends Component
{
    public function render()
    {
        $withdrawals=[];
        return view('livewire.pending-withdrawals', compact('withdrawals'));
    }
}
