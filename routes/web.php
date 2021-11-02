<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::view('/', 'frontend.home');
Route::view('/about', 'frontend.about');
Route::view('/services', 'frontend.services');

Route::view('/terms', 'frontend.policy.terms');

Route::view('/new', 'frontend.new');

Route::middleware(['auth:sanctum', 'verified' , 'referral'])->group(function(){

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

    Route::get('/settings', function () {
        return view('backend.settings');
    })->name('settings');

    Route::get('/profile', function () {
        return view('backend.profile');
    })->name('profile');

});