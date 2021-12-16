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
        
        $this->paymentMethod='card'; 
        $this->selectedProduct=Product::find($product_id); 
        $this->fiat='usd'; 
        $this->crypto='btc';
        $this->amount=$this->selectedProduct->cost; 
        $this->product=$this->selectedProduct->name; 
        $this->description=$this->selectedProduct->description; 
        
        $response=$this->paymentResponse=payNow($this->amount, 
        $this->fiat, 
        $this->crypto, 
        $this->product, 
        $this->description); 

    }

    public function render()
    {
        // $this->paymentResponse=json_encode($this->paymentResponse);
        // $this->paymentID=$this->paymentResponse['payment_id']; 
        return view('livewire.checkout');
    }

    
    
}
