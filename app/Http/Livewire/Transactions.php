<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Transactions extends Component
{

    public $transactions=[]; 
    
    public function render()
    {
        return view('livewire.transactions');
    }
}
