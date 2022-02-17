<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Illuminate\Session\SessionManager;
use App\Models\Product; 
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Transaction; 
use APp\Models\PendingPayment;
use Auth; 

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

        $getid=json_decode($this->paymentResponse);


        //Store Details

        $productname=$this->selectedProduct->name;
        $paymentid=$getid->payment_id;
        $productid=$this->selectedProductID;
        $productdesc=$this->selectedProduct->description; 
        $paymentamount=$this->selectedProduct->cost;


        $payment_status=getPaymentStatus($paymentid);  
        $response=json_decode($payment_status);
        $message=$response->payment_status;

        $transaction= new Transaction; 
        $pendingpayment= new PendingPayment;

        if (!Transaction::where('payment_id', $paymentid)->exists()) {

            $transaction->user_id=Auth::user()->id; 
            $transaction->label=$productname; 
            $transaction->product_id=$productid; 
            $transaction->payment_id=$paymentid; 
            $transaction->description=$productdesc; 
            $transaction->amount=$paymentamount;
            $transaction->save(); 
            $transaction_id=$transaction->id; 

            $pendingpayment->user_id=Auth::user()->id; 
            $pendingpayment->transaction_id=$transaction_id; 
            $pendingpayment->label=$productname; 
            $pendingpayment->product_id=$productid; 
            $pendingpayment->payment_id=$paymentid; 
            $pendingpayment->description=$productdesc; 
            $pendingpayment->amount=$paymentamount;
            $pendingpayment->save(); 
            $pendingpayment_id=$pendingpayment->id;

        }

        // else{
        //     return back()->with('toast_error', 'System Error. Try again!'); 
        // }

        switch ($message) {
            case 'waiting':
                $status='toast_error'; 
                $message='Payment not received. Status: Waiting!'; 
                break;

            case 'success': 
               
                $status='toast_success'; 
                $message='Your payment was successful.'; 
                break; 

            case 'confirming': 
                $status='toast_success'; 
                $message='The payment satus is pending confirmation.'; 
                break;

            case 'confirmed':
                $status='toast_success'; 
                $message='Payment received & confirmed.'; 
                break; 

            default:
                $status='toast_error'; 
                $message='Payment not received. Status: Waiting!'; 
                break;
        }



        alert()->html('
        <span style="color:red"><strong>WARNING</strong></span>',"
        Dear Valued Member, <br />
        There is a limited time allocation of 12 hours to complete this 
        payment as the generated BTC address will expire after this 
        period. This is to protect your funds and for ease of transfer. 
        Should you be unable to complete your payment in the allotted 
        time, you would have to restart the process to prevent any loss 
        of funds. By proceeding, you agree to the <a style='color:red' href='https://giftclubglobal.com/terms-and-conditions/'>terms & conditions</a> governing our operations.<br />
        Thanks for your cooperation. <input type='hidden' name='payment_id' value=".$getid->payment_id."> ",'toast')->persistent(false,false)->showConfirmButton('I Agree, Proceed ')->footer('
        <form method="post" action="/payment-cancelled/'.$getid->payment_id.'"> 
        <input type="hidden" name="transaction_id" value="'.$transaction_id.'" >
        <input type="hidden" name="pending_payment_id" value="'.$pendingpayment_id.'" >
        <input type="hidden" name="_token" value="'.csrf_token().'"> 
        
        <button type="submit" class="swal2-confirm swal2-styled swal2-default-outline" style="display: inline-block; background-color:red">I Disagree, Cancel</button>
        </form>');

        return view('livewire.checkout');
    }

    
    
}
