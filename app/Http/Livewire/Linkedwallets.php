<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\User; 
use App\Models\Wallet; 

class Linkedwallets extends Component
{
    public $walletAddress;
    public $updateAddress=false; 
    public $user; 
    public $wallet; 

    public function mount(){

        $this->user=Auth::user(); 

        $this->wallet=User::find($this->user->id)->wallet; 

        if (empty($this->wallet)) {
            $this->walletAddress="There are no linked wallets for this account."; 
        } else {
            $this->walletAddress=$this->wallet->wallet_address;
        }
        
    }

    public function render()
    {
        return view('livewire.linkedwallets');
    }

    public function update(){

        $this->updateAddress=true; 

    }
    public function save(){
        
        $this->validate([
            'walletAddress' => 'required',
        ], [
            'walletAddress.required' => 'Please provide a valid wallet address',
            
        ]);

        if(!Wallet::where('user_id', $this->user->id)->exists()){
            Wallet::create([
                'user_id' => $this->user->id, 
                'wallet_address'=> $this->walletAddress,      
            ]);
        }
        else {
            
            Wallet::where('user_id', $this->user->id)
                ->update([
                    'wallet_address' => $this->walletAddress
                ]);
                session()->flash('message', "Wallet Updated Successfully");
        }
        
        $this->updateAddress=false; 
    }
    

}
