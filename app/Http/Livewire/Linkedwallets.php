<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\User; 
use App\Models\Wallet; 
use Illuminate\Support\Facades\Notification;
use App\Notifications\UpdatedWalletNotification; 



class Linkedwallets extends Component
{
    public $walletAddress;
    public $updateAddress=0; 
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
        $this->dispatchBrowserEvent('swal', ['title' => 'Feedback Saved']);
        return view('livewire.linkedwallets');
        $this->dispatchBrowserEvent('swal', ['title' => 'Feedback Saved']);
    }

    public function update(){

        $this->updateAddress=1; 

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
                Notification::route('mail', $this->user->email)->notify(new UpdatedWalletNotification($this->user, $this->walletAddress));
        }
        
        $this->updateAddress=0; 
    }
    

}

//App Specific Password (johnson@cloudypeeps.com): 0tHtG7wLZ50V

