<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User; 
use App\Models\UserProduct; 
use App\Models\Product;
use Auth;

class ActivePlans extends Component
{

    public $user; 
    public $activeplans=[]; 
    public function mount(){
        $this->user=Auth::user()->id; 
    }

    public function render()
    {

        $this->activeplans=UserProduct::where('user_id', $this->user)->get(); 

        return view('livewire.active-plans');

        
// end

        
    }
}
