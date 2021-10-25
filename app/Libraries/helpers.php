<?php 

use Illuminate\Support\Facades\DB;
use App\Models\User; 
use Livewire\WithPagination;


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
            if(Cookie::get('referral') !==null)
                {
                    $referred_by = Cookie::get('referralcode');
                }           

                else ($referred_by=null); 
              //  dd($referred_by); 
            if($referral_code==$referred_by) {

                try {
                        $verifyReferralCode= DB::table('users')->where('affiliate_id', $referral_code)->first();
                            if(!empty($referred_by=$verifyReferralCode->affiliate_id))
                                {
                                    return $referred_by;
                                };    
                    }

                catch(Exception $e) {
                                    return "GiftClub"; }

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
                                return "GiftClub"; }

               
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


if(!function_exists("bitpay")){

    function bitpay(){


    //Token ID: TexnXW8hQQ8E11eMx6bN6559z3sXU76kFcf


$resourceUrl = 'https://bitpay.com/tokens';

$postData = json_encode([
   'id' => 'TexnXW8hQQ8E11eMx6bN6559z3sXU76kFcf',
   'label' => 'giftclubglobal.com',
   'facade' => 'merchant'
]);

$curlCli = curl_init($resourceUrl);

curl_setopt($curlCli, CURLOPT_HTTPHEADER, [
   'X-Accept-Version: 2.0.0',
   'Content-Type: application/json'
]);

curl_setopt($curlCli, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curlCli, CURLOPT_POSTFIELDS, stripslashes($postData));

$result = curl_exec($curlCli);
$resultData = json_decode($result, TRUE);
curl_close($curlCli);

return $resultData;

}
}

if(!function_exists("btcRates")){
function btcRates(){


    $resourceUrl = 'https://bitpay.com/rates/BTC/GHS';

$curlCli = curl_init($resourceUrl);

curl_setopt($curlCli, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($curlCli, CURLOPT_HTTPHEADER, [
   'X-Accept-Version: 2.0.0',
   'Content-Type: application/json'
]);

$result = curl_exec($curlCli);
$resultData = json_decode($result, TRUE);
curl_close($curlCli);

return $resultData;


}}


if(!function_exists('referrals')){


    function referrals($type)
     

    {
        switch ($type) {
            case 'list':

                $id=Auth::user()->affiliate_id;
                // $referrals=User::where('referred_by', $id)->get(); 
                // $list=$referrals;
                
                return $id; 

                break;

            case 'count':

                $id=Auth::user()->affiliate_id;
                $referrals=User::where('referred_by', $id); 

                $count=$referrals->count(); 

                return $count; 

                break; 
            
            default:
                # code...
                break;
        }
    }

}

if(!function_exists('earnings')){

function earnings($id){

    // $earning=User::find($id)->earning()
    // ->where('user_id', $id)
    // ->first(); 

    $earning=User::find($id)->earning;
    
    try {

        if(!is_null($earning) && $earning->count()>0){
            $earning=$earning->sum("amount"); 
        }
        else {
            $earning=0;
        } 

        return $earning; 
    }
    catch(Exception $e) {
        $error=$e->getMessage(); 
    }

    if ($error){
        print('<script>console.log('.$error.')</script>'); 
        return 0; 
    }

}
}

if(!function_exists('totalinvested')){

    function totalinvested($id){

        $totalinvested=User::find($id)->userProducts;

        try {

            if(!is_null($totalinvested) && $totalinvested->count()>0){
                $totalinvested=$totalinvested->sum("cost"); 
            }
            else {
                $totalinvested=0;
            } 
    
            return $totalinvested; 
        }
        catch(Exception $e) {
            $error=$e->getMessage(); 
        }
    
        if ($error){
            print('<script>console.log('.$error.')</script>'); 
            return 0; 
        }
    
    }


    

    }




    if(!function_exists('points')){

            function points(){

            $points=referrals('count'); 

            return $points; 


        }
    }