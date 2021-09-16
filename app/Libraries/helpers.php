<?php 

use Illuminate\Support\Facades\DB;

use App\Models\User; 

function createNewBlockchainWallet($email, $password) {
$password=$password; 
$api_code="123";
$secret="key"; 
$label="GiftClub"; 
$email=$email; 
$request = "http://localhost:3000/api/v2/create?password=$password&api_code=$api_code&email=$email&label=$label"; 
$response = file_get_contents($request); 
    return $response; 

}

if(!function_exists("validateReferralCode")){

    function validateReferralCode($referral_code)

        {
            
            $referral_code=$referral_code; 

            $referred_by = Cookie::get('referral');

            if($referral_code==$referred_by) {

                try {
                        $verifyReferralCode= DB::table('users')->where('affiliate_id', $referral_code)->first();
                            if(!empty($referred_by=$verifyReferralCode->affiliate_id))
                                {
                                    return $referred_by;
                                };    
                    }

                catch(Exception $e) {
                                    return "Invalid Refferal Code"; }

            }
            
            elseif($referral_code!=$referred_by && !empty($referral_code) && $referral_code!="GiftClub") {
                $referred_by = Cookie::forget('referral'); 

                try {
                    $verifyReferralCode= DB::table('users')->where('affiliate_id', $referral_code)->first();
                        if(!empty($referred_by=$verifyReferralCode->affiliate_id))
                            {
                                $referred_by = Cookie::make('referral', $referral_code); 
                                $referred_by = $referral_code; 
                                return $referred_by;
                            };    
                }

            catch(Exception $e) {
                                return "Invalid Refferal Code"; }

               
            }

            if(empty($referral_code)) {
                $referred_by = "GiftClub"; 
            }

            if($referral_code=="GiftClub") {
                return 'GiftClub'; 
            }

            return $referred_by;
           
        }

}
