<?php

namespace App\Observers;

use App\Notifications\PackageActivated; 
use App\Notifications\PaymentSuccessful; 
use App\Models\UserProduct;
use App\Models\User;
use App\Models\Product; 
use App\Models\ReferralEarning; 
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReferralEarningNotification; 
use Auth;

class PackageActivationObserver

{
    /**
     * Handle the UserProduct "created" event.
     *
     * @param  \App\Models\UserProduct  $userProduct
     * @return void
     */
    public function created(UserProduct $userProduct)

    {
        $user_id=$userProduct->user_id;
        $user=User::find($user_id); 
        $user->notify(new PaymentSuccessful()); 
        $user->notify(new PackageActivated()); 

        // Schedule Payouts

        //Schedule First Payout
        // $firstPayoutDate = date('Y-m-d', strtotime("+6 months", strtotime($effectiveDate)));
        
        
        //Shedule Second Payout
        // $secondPayoutDate = date('Y-m-d', strtotime("+12 months", strtotime($effectiveDate)));
        
        //Referral Earning
        #Check referred by
        $referredby=''; 

        $get_user_info=User::where('id', $user_id)->first(); 
        $referredby=$get_user_info->referred_by; 

        if ($referredby!='GiftClub') {
            
            // Get User ID of User to Be Paid for Referral
            
            // $referredby = auth()->user()->referred_by;
            
            //Get Current User Referral ID
            // $referral_id=auth()->user()->affiliate_id;
            $referral_id=$get_user_info->affiliate_id; 
            //Find the user to be paid
            $userearn=User::where('affiliate_id', $referredby)->first(); 
            
            $earn_name=$userearn->name; 
            
            $earn_email=$userearn->email;

            $user_id=$userearn->id; 
            $earning_from=$user->name;

            //Get Amount 
            $amount=Product::find($userProduct->product_id);
            $cost=$amount->cost; 
            //Find Amount to be Paid
            $earning_amount = 0.02 * $cost; 
            // dd($earning_amount);
            
            /* 
            Precision Value for Minutes, Seconds and Microseconds required for now() function. 
            Covert String to Date/Time. 
            $current_date=now();  
            */

            
            try {
                //code...
                $current_date=date("Y-m-d"); 
                $store_earnings = new ReferralEarning;
                $store_earnings->user_id=$user_id;
                $store_earnings->amount=$earning_amount;
                $store_earnings->referral_id=$referral_id;
                $store_earnings->package_id=$userProduct->product_id; 
                $store_earnings->date_activated=$current_date; 
                $store_earnings->save(); 

                //send out email notifications 
                
                // Notify Referrer on New Earnings 
                
            } catch (\Throwable $th) {
                //throw $th;
                
                return redirect('transactions')->with('toast_error', 'There was an error.');
                
            }
            
            Notification::route('mail', $earn_email)->notify(new ReferralEarningNotification($earn_name, $earning_amount, $earning_from));
            
        }

        else {
            //Store Information 
        }

        
        #Add Earnings to Referral
        
    }

    /**
     * Handle the UserProduct "updated" event.
     *
     * @param  \App\Models\UserProduct  $userProduct
     * @return void
     */
    public function updated(UserProduct $userProduct)
    {
        //
    }

    /**
     * Handle the UserProduct "deleted" event.
     *
     * @param  \App\Models\UserProduct  $userProduct
     * @return void
     */
    public function deleted(UserProduct $userProduct)
    {
        //
    }

    /**
     * Handle the UserProduct "restored" event.
     *
     * @param  \App\Models\UserProduct  $userProduct
     * @return void
     */
    public function restored(UserProduct $userProduct)
    {
        //
    }

    /**
     * Handle the UserProduct "force deleted" event.
     *
     * @param  \App\Models\UserProduct  $userProduct
     * @return void
     */
    public function forceDeleted(UserProduct $userProduct)
    {
        //
    }
}
