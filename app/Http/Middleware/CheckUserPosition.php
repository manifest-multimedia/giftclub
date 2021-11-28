<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserPosition
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        $user=Auth::user()->id; 

        //Check if user has an active package
        //Check if user has at least one referral with an active package
        /* 
        
        | If user's account is active and at least one referral has an active account
        | proceed to check how many referrals have an active package

        | Logic: One active referral = Position 1
        | 2 Activie Referrals = Position 2
        | 8 Active Refferrals = Position 8 {Mark as complete and process payout.}
        
        */
        return $next($request);
    }
}
