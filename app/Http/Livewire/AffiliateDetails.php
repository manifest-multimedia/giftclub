<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth; 

class AffiliateDetails extends Component
{

    public $user; 
    public $copied;
    public function mount(){
        $this->user=Auth::user(); 
    }

    public function render()
    {
        return view('livewire.affiliate-details');
    }

    public function copy(){
      
        $this->emit('copied');
      
    }
}
