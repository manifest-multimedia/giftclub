<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User; 
use App\Models\Address; 
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class LocationInformation extends Component
{
    public $address=null;
    public $update=null; 
    public $address_line_one; 
    public $address_line_two;
    public $address_city;
    public $address_country; 
    public $address_zip; 

    public function mount(){

        $this->update=0;
       
    }

    public function render()
    {
        $user_id=Auth::user()->id; 

        $address=Address::where('user_id',$user_id)->first();
        if($address) {
            $this->address=$address;
        }
        return view('livewire.location-information');
    }

    public function update(){
        
        if(!is_null($this->address)){
            $this->address_line_one=$this->address->Address_Line_One; 
            $this->address_line_two=$this->address->Address_Line_Two; 
            $this->address_city=$this->address->city; 
            $this->address_country=$this->address->country; 
            $this->address_zip=$this->address->zip; 
        }

        $this->update=1; 

    }

    public function save(){
        
        $this->update=0; 

    //     $this->validate([
    //         'address_line_one'=>'required'
    //     ], 
    
    // [
    //     'address_line_one.required' => 'Please provide a valid address.'
    // ]);

        // Alert::success('Settings', 'Playing')->autoClose(5000)->timerProgressBar();
        
        // Alert::html('Settings', 'Manage your account settings', 'info')->toToast()->autoClose(3000)->timerProgressBar();

        // Alert::html('Your account has been inactive!', '<p> You will be automatically logged out in 10 seconds. </p> <a href="/" class="btn btn-primary"> Continue to Work </a>', 'warning')->toToast()->autoClose(10000)->timerProgressBar();

        
    }
}
