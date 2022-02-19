<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NewContractController;
use App\Http\Controllers\SignedPaymentController;
use App\Http\Controllers\WithdrawalRequestController;
use App\Http\Livewire\Checkout; 
use Jantinnerezo\LivewireAlert\LivewireAlert;
use RealRashid\SweetAlert\Facades\Alert;
// use Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::view('/', 'backend.login');

    // Route::view('/about', 'frontend.about');
    // Route::view('/services', 'frontend.services');
    // Route::view('/terms', 'frontend.policy.terms');
    // Route::view('/new', 'frontend.new');

Route::middleware(['auth:sanctum', 'activateplans', 'verified' , 'referral'])->group(function(){

    Route::get('/', function () {
        return view('backend.dashboard');
    });

    route::get('/wrongpass', function() {
        
        Alert::html('Action Failed!', 'Request could not be processed. <strong>Password confirmation failed.</strong>', 'warning')->toToast();
        return view('errors.WrongPassword'); 
    })->name('invalidpass');

    Route::get('/dashboard', function () {

         
        return view('backend.dashboard');
    })->name('dashboard');

    Route::get('/wallet', function () {
        return view('backend.wallet');
    })->name('wallet');

    Route::get('/transactions', function () {
        return view('backend.transactions');
    })->name('transactions');

    Route::get('/referrals', function () {
        return view('backend.referrals');
    })->name('referrals');

    Route::get('/settings', [settingsController::class, 'index'])->name('settings');

    Route::get('/profile', function () {
        return view('backend.profile');
    })->name('profile');

    Route::post('newcontract', [NewContractController::class, 'newcontract']);

    // Route::get('/checkout/{product_id}', function($product_id){
    //     return  view('backend.checkout');
    // })->name('pay'); 

    Route::get('/checkout/{product_id}', Checkout::class)->name('pay');
    Route::post('/payment-complete', [CheckoutController::class, 'store'])->name('completepayment');
    Route::get('/payment-complete', [CheckoutController::class, 'index'])->name('paycomplete');
    
    Route::get('/payment-cancelled', [SignedPaymentController::class, 'index']); 
    Route::post('/payment-cancelled/{payment_id}', [SignedPaymentController::class, 'cancelled']); 
    // Route::post('/payment-cancelled/{$payment_id}', [SignedPaymentController::class, 'cancelled'])->name('payment-cancelled');

    Route::get('/exchange', function(){
        return view('backend.exchange'); 
    });

    Route::get('/bonus-withdrawal', function(){

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
    })->name('dashboard');

    Route::post('/authorize-withdrawal', [WithdrawalRequestController::class, 'WithdrawalRequest']);

    route::get('/test', function(){

        $date='2022-01-01'; 

        $first_payout=date('Y-m-d', strtotime($date. '+ 6 months')); 
        $second_payout=date('Y-m-d', strtotime($date. '+ 12 months'));
        return $first_payout.$second_payout; 

    }); 

});