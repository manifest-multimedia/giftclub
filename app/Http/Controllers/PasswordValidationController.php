<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PasswordValidationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Alert::html('Action Failed!', 'Request could not be processed. <strong>Password confirmation failed.</strong>', 'warning')->toToast();
        return view('errors.WrongPassword'); 
    }
}
