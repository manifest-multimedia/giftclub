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
    public $user_id; 

    public function mount(){

        $this->update=0;
       
    }

    public function render()
    {
        $user_id=Auth::user()->id; 
        $this->user_id=$user_id; 
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

       if(is_null($this->address)){

        // New Address 
        $save=new Address; 
        $save->user_id=$this->user_id; 
        $save->Address_Line_One=$this->address_line_one;
        $save->Address_Line_Two=$this->address_line_two; 
        $save->city=$this->address_city; 
        $save->country=$this->address_country; 
        $save->zip=$this->address_zip; 
        $save->save(); 
        session()->flash('message', "New Record Saved Successfully");


       }
        else {
        //Existing Address 
        $update=Address::where('user_id', $this->user_id); 
        $update->update([
            'Address_Line_One'=>$this->address_line_one, 
            'Address_Line_Two'=>$this->address_line_two, 
            'city'=>$this->address_city, 
            'country'=>$this->address_country, 
            'zip'=>$this->address_zip
        ]); 

        session()->flash('message', "Record Updated Successfully");

        
        }

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
