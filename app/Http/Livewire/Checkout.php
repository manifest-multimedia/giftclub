<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Illuminate\Session\SessionManager;
use App\Models\Product; 

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

            $charges=0.04 * $this->selectedProduct->cost; 
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
        return view('livewire.checkout');
    }

    
    
}
