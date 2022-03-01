<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BonusWithdrawalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $userpassword=Auth::user()->password;

        alert()->html('
<style> .swal2-confirm {display:none !important} div.swal2-footer{display:block !important;}</style>
<span style="color:red; margin:0; padding:0;"><strong>AUTHORIZE</strong></span>',
"This action requires authorization",
'toast')->footer('
<form method="post" action="/authorize-withdrawal/"> 

 <label style="text-align:center !important; width:100%">Enter Amount to Withdraw </label><br />
 <input type="number" class="form-control"  placeholder="(Min. = 50)" name="amount">  
 <label class="pt-2" style="text-align:center !important; width:100%">Password Confirmation</label><br />
 <input type="password" class="form-control" placeholder="Confirm Password" name="password_confrimation"> 
 <input type="hidden" name="userpassword" value="'.$userpassword.'">
 <input type="hidden" name="userpassword" value="'.$userpassword.'">
 
<input type="hidden" name="_token" value="'.csrf_token().'"> 
<div style="padding-bottom:10px; padding-top:10px;" class="align-items-center"> 
<button type="submit" class="swal2-confirm2 btn btn-danger swal2-styled swal2-default-outline" style="width:100%;color:white;display: inline-block;">Authorize Withdrawal</button>
</div>

</form>')->persistent(false,false);

        return view('backend.dashboard');
    }
}
