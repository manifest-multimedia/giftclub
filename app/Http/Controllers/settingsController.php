<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class settingsController extends Controller
{
    public function index(){
        return view('backend.settings');
    }

}
