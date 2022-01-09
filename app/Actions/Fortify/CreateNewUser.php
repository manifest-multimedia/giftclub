<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Wallet; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Rules\refValidator;
use App\Notifications\WalletCreatedSuccessfully;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    public $referred_by; 
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    
    {
         
        // if($referred_by=validateReferralCode($input['referred_by'])=='Invalid Refferal Code'){
        //     $input['referred_by']='';
        // };

          
        // if($referred_by=validateReferralCode($input['referred_by'])=='GiftClub'){
        //     $input['referred_by']='GiftC';
        // };
        
               
         //Validate Referral Code 

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'referred_by' => ['required', 'string', new refValidator], 
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'referred_by'=> $input['referred_by'],
        ]);

        //Create New Wallet 

        if($input['wallet']=='no') {
            $email=$input['email']; 
            $password=$input['password']; 
            $wallet=createNewBlockchainWallet($email, $password); 
            $wallet=json_decode($wallet);
            $guid=$wallet->guid; 
            $address=$wallet->address; 
            $label=$wallet->label; 
            
            //Store Wallet Data in DB
            $store = Wallet::create([
                'user_id'=>$user->id,  
                'wallet_address'=>$address,
                'label'=>$label, 
                'guid'=>$guid
            ]); 

            //Shot Mail
            $user->notify(new WalletCreatedSuccessfully()); 


            
        }

        return $user; 

    }
}
