<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product; 

class NewContractController extends Controller
{
    public function newcontract(Request $request) {

        // dd($request->product.' and Password:'.$request->password);
        $userPassword=Auth::user()->password;
        $password=$request->password; 
        $product=$request->product; 

        if(empty($password)){
            return redirect('/wrongpass');
            
            } 
            $rules=[
                'password' => 'required', 
                'product' => 'required',
            ]; 
            $this->validate($request, $rules); 
        
            $check=Hash::check($password, $userPassword); 
        
            if($check===true) {
                return redirect("/checkout/$product"); 
                //Code .. 
                resetValues();
            }
            else {
                
                return redirect('/wrongpass');
                resetValues();
            }

        // $product='1'; 
        // return redirect("/checkout/$product"); 

    } 
}
