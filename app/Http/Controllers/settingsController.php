<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class settingsController extends Controller
{
    public function index(){

        $address=User::find(Auth::user()->id)->address;
        // Alert::success('Settings', 'Playing')->autoClose(5000)->timerProgressBar();
        
        // Alert::html('Settings', 'Manage your account settings', 'info')->toToast()->autoClose(3000)->timerProgressBar();

        // Alert::html('Your account has been inactive!', '<p> You will be automatically logged out in 10 seconds. </p> <a href="/" class="btn btn-primary"> Continue to Work </a>', 'warning')->toToast()->autoClose(10000)->timerProgressBar();

        return view('backend.settings', ['address'=>$address])->with('success', 'Created successfully!');
    }

}
