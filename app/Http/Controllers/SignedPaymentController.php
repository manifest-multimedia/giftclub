<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction; 
use App\Models\PendingPayment;
use App\Models\Withdrawal;
use App\Models\PayoutSchedule;
use Auth; 
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminSuccessfulPayoutNotification; 
use App\Notifications\UserSuccessfulPayoutNotification; 


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

        //Send Notification to User

        //Send Notification to Admin
        
        return redirect()->back()->with('success', 'Withdrawal Successfully Maked As Paid');
    }

    public function process_payout(request $request){
        $payout_id=$request->id; 

        $payout_details=PayoutSchedule::where('id',$payout_id)->first();
        $payout_to=$payout_details->user_id;
        $payout_amount=getPayoutAmount($payout_details->package);
        $payout_package_name=Product::where('id',$payout_details->package)->first()->name;
        $payout_user_details=User::where('id', $payout_to)->first();
        $payout_user_email=$payout_user_details->email;
        $payout_user_name=getFirstName($payout_user_details->name);

        $user=Auth::user()->name; 

        $update=PayoutSchedule::where('id', $payout_id)->update([
            'payout_status' => 'paid', 
            'by' => $user, 
        ]);

        //Send Payout Notification to User
        Notification::route('mail', $payout_user_email)->notify(new UserSuccessfulPayoutNotification($payout_user_name, $payout_amount, $payout_package_name));
        
        //Send Payout Notification to Admin 
        Notification::route('mail', 'withdrawal@giftclubglobal.com')->notify(new AdminSuccessfulPayoutNotification($user,$payout_user_name, $payout_amount, $payout_package_name));


        return redirect()->back()->with('success', 'Payout Successfully Maked As Paid');


    }
}
