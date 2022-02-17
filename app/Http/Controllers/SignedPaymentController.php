<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; 
use APp\Models\PendingPayment;
use Auth; 

class SignedPaymentController extends Controller
{
    public function index(){
        // return 'index'; 
    }
    public function cancelled(request $request){
        // $user_id=Auth::user()->id; 
        // delete payment information from transactions
        $pending_payment_id=$request->pending_payment_id; 
        $delete_pending_payment=PendingPayment::find($pending_payment_id)->delete(); 
        
        // delete payment information from pendingpayments
        $transaction_id=$request->transaction_id; 
        $delete=Transaction::find($transaction_id)->delete(); 

        return redirect('dashboard')->with('toast_error', 'Transaction Cancelled'); 
    }
}