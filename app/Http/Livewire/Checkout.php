<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Illuminate\Session\SessionManager;
use App\Models\Product; 
use RealRashid\SweetAlert\Facades\Alert;

class Checkout extends Component
{
    
    public $selectedProduct; 
    public $paymentMethod; 
    public $paymentMethodUpdated; 
    public $card; 
    public $amount; 
    public $fiat; 
    public $crypto; 
    public $product; 
    public $description; 
    public $paymentResponse;
    public $paymentID; 
    public $selectedProductID;
    public $charges;
    
    public function mount($product_id) {

        /* 
        --------------------------------------------------------
        | Available Payment Methods                            |
        --------------------------------------------------------
        | 1. Card                                              |
        | 2. Crypto                                            | 
        --------------------------------------------------------
        Default Method = Card
        */
        $this->selectedProductID=$product_id;
        $this->paymentMethod='crypto'; 
        
        if($this->paymentMethod==='crypto') {

            $this->selectedProduct=Product::find($product_id); 
            $this->fiat='usd'; 
            $this->crypto='btc';

            $charges=0.004 * $this->selectedProduct->cost; 
            $this->charges=$charges; 

            $this->amount=$this->selectedProduct->cost + $charges ; 
            $this->product=$this->selectedProduct->name; 
            $this->description=$this->selectedProduct->description; 
            
            $this->paymentResponse=payNow($this->amount, 
            $this->fiat, 
            $this->crypto, 
            $this->product, 
            $this->description); 
            // dd($this->paymentResponse);
    }

    }

    public function render()
    {
        alert()->html('<i>WARNING</i>',"
        Dear Valued Member, <br />
There is a limited time allocation of 12 hours to complete this 
payment as the generated BTC address will expire after this 
period. This is to protect your funds and for ease of transfer. 
Should you be unable to complete your payment in the allotted 
time, you would have to restart the process to prevent any loss 
of funds. By proceeding, you agree to the <a style='color:red' href='https://giftclubglobal.com/terms-and-conditions/'>terms & conditions</a> governing our operations.<br />
Thanks for your cooperation.",'warning')->persistent(true)->showConfirmButton('I Agree, Proceed', '#3085d6');



// You are about to make a payment to an address which is set to expire in 12 hours, you payment must have been completed within this time for your package to be activated.
//         <b>failure</b> to complete payment within the stipulated time could lead to a loss in your funds. By Proceeding, you agree to the <a style='color:red' href='https://giftclubglobal.com/terms-and-conditions/'>terms & conditions</a> governing our operations.


        return view('livewire.checkout');
    }

    
    
}
