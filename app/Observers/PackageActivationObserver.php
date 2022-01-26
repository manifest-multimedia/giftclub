<?php

namespace App\Observers;

use App\Notifications\PackageActivated; 
use App\Notifications\PaymentSuccessful; 
use App\Models\UserProduct;
use App\Models\User;
use App\Models\Product; 
use App\Models\ReferralEarning; 

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
        if ($referredby!='GiftClub') {
            
            # code...
            $referredby = auth()->user()->referred_by;
            $referral_id=auth()->user()->affiliate_id;
            $userearn=User::where('affiliate_id', $referredby)->get(); 
            $user_id=$userearn->id; 
            $amount=find($userProduct->product_id)->get();
            $cost=$amount->cost; 
            $earning_amount = 0.02 * $cost; 

            $store_earnings = new ReferralEarning;
            $store_earnings->user_id=$user_id;
            $store_earnings->amount=$earning_amount;
            $store_earnings->referral_id=$referral_id;
            $store_earnings->package_id=$userProduct->product_id; 
            $store_earnings->now()->toDateTimeString('Y-m-d');
            $store_earnings->save(); 
            
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
