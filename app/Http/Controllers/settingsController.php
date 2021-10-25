<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Auth;

class settingsController extends Controller
{
    public function index(){

        $address=User::find(Auth::user()->id)->address;


        return view('backend.settings', ['address'=>$address]);
    }

}
