<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Livewire\Checkout; 
use Jantinnerezo\LivewireAlert\LivewireAlert;
use RealRashid\SweetAlert\Facades\Alert;

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

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::view('/', 'backend.login');
// Route::view('/about', 'frontend.about');
// Route::view('/services', 'frontend.services');

// Route::view('/terms', 'frontend.policy.terms');

// Route::view('/new', 'frontend.new');

Route::middleware(['auth:sanctum', 'verified' , 'referral'])->group(function(){

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

    // Route::get('/checkout/{product_id}', function($product_id){
    //     return  view('backend.checkout');
    // })->name('pay'); 

    Route::get('/checkout/{product_id}', Checkout::class)->name('pay');
    Route::post('/payment-complete', [CheckoutController::class, 'store'])->name('paycomplete');

    Route::get('/exchange', function(){
        return view('backend.exchange'); 
    });

});