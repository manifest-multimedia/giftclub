<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth; 
use App\Models\PendingPayment;
use App\Models\Transaction;
use App\Models\UserProduct;



class ActivatePackages
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
        
        // Check for Completed Payment Notices
        if ($user=Auth::user()){

            $user_id=Auth::user()->id;

            $activate=activatePackages($user_id);

            if($activate=='success') {

                return $next($request);
            }

            else {
                return $next($request);
            }
    
        

        
            
            
    }

}
}