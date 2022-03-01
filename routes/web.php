<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NewContractController;
use App\Http\Controllers\SignedPaymentController;
use App\Http\Controllers\BonusWithdrawalController;
use App\Http\Controllers\WithdrawalRequestController;
use App\Http\Controllers\PasswordValidationController;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\Checkout; 
use Jantinnerezo\LivewireAlert\LivewireAlert;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;


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

Route::middleware(['auth:sanctum', 'activateplans', 'verified' , 'referral'])->group(function(){

    Route::get('/', function () { return view('backend.dashboard');});
    route::get('/wrongpass', PasswordValidationController::class)->name('invalidpass');
    Route::get('/dashboard', function () { return view('backend.dashboard');})->name('dashboard');
    Route::get('/wallet', function () { return view('backend.wallet');})->name('wallet');
    Route::get('/transactions', function () { return view('backend.transactions');})->name('transactions');
    Route::get('/referrals', function () { return view('backend.referrals');})->name('referrals');
    Route::get('/settings', [settingsController::class, 'index'])->name('settings');
    Route::get('/profile', function () { return view('backend.profile');})->name('profile');
    Route::post('newcontract', [NewContractController::class, 'newcontract']);
    Route::get('/checkout/{product_id}', Checkout::class)->name('pay');
    Route::post('/payment-complete', [CheckoutController::class, 'store'])->name('completepayment');
    Route::get('/payment-complete', [CheckoutController::class, 'index'])->name('paycomplete');
    Route::get('/payment-cancelled', [SignedPaymentController::class, 'index']); 
    Route::post('/payment-cancelled/{payment_id}', [SignedPaymentController::class, 'cancelled']); 
    Route::get('/exchange', function(){ return view('backend.exchange'); });
    Route::get('/bonus-withdrawal', BonusWithdrawalController::class)->name('bonus-withdrawal');
    Route::post('/authorize-withdrawal', [WithdrawalRequestController::class, 'WithdrawalRequest']);
    Route::get('payouts', function() { return view('backend.payouts');}); 
    Route::get('admin', AdminController::class); 
    Route::get('/users', function(){ 
        if (Gate::allows(['isAdmin'])) {
        return view('backend.users');
        } else {
            abort(404);
        }
    });

});