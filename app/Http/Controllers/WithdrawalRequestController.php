<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawalRequestController extends Controller
{
    public function WithdrawalRequest(Request $request) {
        //Success
        $amount=$request->amount; 
        $password=$request->password_confrimation;
        return 'received'.$amount.$password; 

        //Unsucessful 


        //Dispatch Notification To Admin 
    }
}
