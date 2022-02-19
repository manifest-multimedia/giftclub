<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Notification;
use App\Notifications\DeclinedWithdrawalRequestNotification;
use App\Notifications\SuccessfulWithdrawalRequestNotification;
use App\Notifications\WithdrawalRequestNotification;
use Auth;


class WithdrawalRequestController extends Controller
{
    public function WithdrawalRequest(Request $request) {
        //Retrieve Data 
        $userpassword=$request->userpassword; 
        $password=$request->password_confrimation;
        $amount=$request->amount;

        $wallet=referrals('walletaddress'); 
        
        if($wallet!="invalid"){
                                $walletaddress=$wallet->wallet_address; 
                                $user_id=$wallet->user_id; 
                                $user=User::find($user_id);   
                                $name=getFirstName($user->name);
                                $email=$user->email; 
        } else {
            $reason = "because there was no valid wallet linked to your account."; 
            $email=Auth::user()->email;
            $name=getFirstName(Auth::user()->name);
            Notification::route('mail',  $email)->notify(new DeclinedWithdrawalRequestNotification($name, $reason));
            return redirect('dashboard')->with('toast_error', 'You do not have a linked/valid wallet in your account!'); 
        }

        $earnings=referrals('earnings');

        //Validate Password
        $check=verifypass($password, $userpassword);

        switch ($check) {
            case 'success':
                //Failed Amount Less than Minimum 
                if($amount<50){

                    //Dispatch Notification to User
                    $reason="because the amount requested is less than the minimum amount of $50 withdrawable from referral earnings.";
                    Notification::route('mail',  $email)->notify(new DeclinedWithdrawalRequestNotification($name, $reason));
                    
                    return redirect('dashboard')->with('toast_error', "Action Failed! You've entered an amount less than $50 USD"); 
                } 
                
                if($amount>$earnings && $earnings>=50) {
                    
                    $reason="because the amount requested is more than the amount you have earned through your referrals.";
                     //Dispatch Notification to User
                     Notification::route('mail',  $email)->notify(new DeclinedWithdrawalRequestNotification($name, $reason));
            
                    
                    return redirect('dashboard')->with('toast_error', "Action Failed! You've entered an amount greater than your referral earnings!"); 
                 }

                 if($amount>$earnings && $earnings<=49) {
                     //Dispatch Notification to User
                     $reason="because you do not have enough referral earnings to withdraw from.";
                     Notification::route('mail',  $email)->notify(new DeclinedWithdrawalRequestNotification($name, $reason));
            
                    return redirect('dashboard')->with('toast_error', "You do not have enough earnings to withdraw. Minimum withdrawal is $50."); 
                 }

                 if($amount<=$earnings && $earnings>=50) {

                        //Dispatch Notification to User
                        Notification::route('mail',  $email)->notify(new SuccessfulWithdrawalRequestNotification($name, $walletaddress, $amount));
                
                        //Dispatch Notification to Admin
                        Notification::route('mail',  'withdrawal@giftclubglobal.com')->notify(new WithdrawalRequestNotification($name, $walletaddress, $amount, $email));
                    }

                    /* 
                    
                    Dispatch Notification to Admin 

                    Dear Admin, 

                    This User, has requested a withdrawal of xxx from his referral earnings. 

                    Payment of xxx should be made to the linked wallet below: 
                    Wallet Address: xxxxxxxxx
                    Currency: BTC 

                    Thank you. 

                    Regards, 
                    Gift Club 

                    $user->name; 
                    $user->wallet_address; 
                    $user->withdrawal_amount; 

                    */ 

                    return redirect('dashboard')->with('success', "Withdrawal Request was Successful"); 
                 
                 
                break;

            case 'failed':

                return redirect('dashboard')->with('toast_error', "Sorry, Password Confirmation Failed!"); 
                # code...
                break;
            
            default:
                # code...
                break;
        }
        
    
        
        //Unsucessful 
        
        //Success
        
        //Dispatch Notification To Admin 
    }
}
