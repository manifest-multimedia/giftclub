<?php

namespace App\Observers;

use App\Notifications\PackageActivated; 
use App\Notifications\PaymentSuccessful; 
use App\Models\UserProduct;
use App\Models\User;

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
