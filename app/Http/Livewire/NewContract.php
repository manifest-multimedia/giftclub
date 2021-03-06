<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Hash;
use App\Models\Product; 
use Auth; 

use Livewire\Component;

class NewContract extends Component
{
    public $products=[];
    public $userPassword; 
    public $userPasswordConfirmation; 
    public $check; 
    public $product; 

    public function mount(){
        $this->userPassword=Auth::user()->password;
        $this->products=Product::all(); 
        $this->product=null;
    }

    public function render()
    {
        return view('livewire.new-contract');
    }

    public function process(){
    
        if(empty($this->userPasswordConfirmation)){
        return redirect('/wrongpass');

        } 
        
        $this->validate(['userPasswordConfirmation' => 'required']); 
    
        $product=$this->product; 
        // $check=Hash::check($this->userPasswordConfirmation, $this->userPassword); 
        
    
        // if($check===true) {
        //     return redirect("/checkout/$product"); 
        //     //Code .. 
        //     resetValues();
        // }
        // else {
            
        //     return redirect('/wrongpass');
        //     resetValues();
        // }


        $check=verfypass($this->userPasswordConfirmation, $this->userPassword); 
        switch ($check) {
            case 'success':
                return redirect("/checkout/$product"); 
                resetValues();
                
                break;
            case 'failed':
                return redirect('/wrongpass');
                resetValues();
            default:
            // return redirect('/wrongpass');
            // resetValues();
                break;
        }

    }

    public function resetValues(){
        $this->product=1; 
    }
}
