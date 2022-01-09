<?php

namespace App\Observers;

use App\Models\Wallet;
use App\Notifications\WalletCreatedSuccessfully; 
use App\Models\User;

class WalletObserver
{
    /**
     * Handle the Wallet "created" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function created(Wallet $wallet)
    {
        $user_id=$wallet->user_id; 
        $user=User::find($user_id); 
        $user->notify(new WalletCreatedSuccessfully()); 
    }

    /**
     * Handle the Wallet "updated" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function updated(Wallet $wallet)
    {
        //
    }

    /**
     * Handle the Wallet "deleted" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function deleted(Wallet $wallet)
    {
        //
    }

    /**
     * Handle the Wallet "restored" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function restored(Wallet $wallet)
    {
        //
    }

    /**
     * Handle the Wallet "force deleted" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function forceDeleted(Wallet $wallet)
    {
        //
    }
}
