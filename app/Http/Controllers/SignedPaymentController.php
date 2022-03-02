<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; 
use App\Models\PendingPayment;
use App\Models\Withdrawal;
use App\Models\PayoutSchedule;
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
    public function process_withdrawal(request $request){
        $withdrawal_id=$request->id; 

        
        $user=Auth::user()->name; 

        $update=Withdrawal::where('id', $withdrawal_id)->update(

            [ 
                'status' => 'paid', 
                'by' => $user
                ]
            
        );
        
        return redirect()->back()->with('success', 'Withdrawal Successfully Maked As Paid');
    }

    public function process_payout(request $request){
        $payout_id=$request->id; 

        $user=Auth::user()->name; 

        $update=PayoutSchedule::where('id', $payout_id)->update([
            'payout_status' => 'paid', 
            'by' => $user, 
        ]);

        return redirect()->back()->with('success', 'Payout Successfully Maked As Paid');


    }
}
