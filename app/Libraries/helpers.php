<?php 

use Illuminate\Support\Facades\DB;
use App\Models\User; 
use App\Models\Product;
use App\Models\Placement;
use App\Models\Address;
use Livewire\WithPagination;
use App\Models\PendingPayment;
use App\Models\Transaction;
use App\Models\UserProduct;


if(!function_exists("getFirstName")){
    function getFirstName($name){
        $firstname=explode(' ', trim($name))[0];
        return $firstname; 
    }
}

if(!function_exists("createNewBlockchainWallet")){
    function createNewBlockchainWallet($email, $password) {
            $password=$password; 
            $api_code="123";
            $secret="key"; 
            $label="GiftClub"; 
            $email=$email; 
            $request = "http://localhost:3000/api/v2/create?password=$password&api_code=$api_code&email=$email&label=$label"; 
            $response = file_get_contents($request); 
                return $response;    
                // dd($response);         
        }
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

        
        try {

            $totalinvested=User::find($id)->userProducts;

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

   
if (! function_exists('SMSnotify')){
     
    function SMSnotify($destination, $message, $sender, $authorization){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://l4rr2.api.infobip.com/sms/2/text/advanced',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"messages":
                [{"from": "'.$sender.'",
                "destinations":[{"to":"'.$destination.'"}],
                "text":"'.$message.'"}]}',
            CURLOPT_HTTPHEADER => array(
                'Authorization:'."$authorization",
                'Content-Type: application/json', 
                'Accept: application/json', 
            )    
        
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
    
        return $response;
    }   
}

    if(!function_exists('nowpay')) {
        function nowpay($request){

            switch ($request) {
                case 'status':
                    
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.nowpayments.io/v1/status',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                    echo $response;


                    break;
                case 'available-currencies': 
                    $api_key=config('nowpay.apikey');
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.nowpayments.io/v1/currencies',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        "x-api-key: $api_key"
                    ),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                    echo $response;
                break;

                case 'rates':

                    $api_key=config('nowpay.apikey');
                    $amount=10; 
                    $from='eur';
                    $to='btc'; 

                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.nowpayments.io/v1/estimate?amount=$amount&currency_from=$from&currency_to=$to",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    "x-api-key:$api_key",
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;

                break; 


                default:
                    # code...
                    break;
            }

            

        }


        if(!function_exists('checkmethod')){
            function checkmethod($paymentMethod){
                switch ($paymentMethod) {
                    case 'card':
                        return "{method:1}"; 
                        break;

                    case 'crypto':
                        return "{method:2}";
                        break;
                    
                    case 'other':
                        return "{method:3}"; 
                        break; 
                           
                    default:
                        return "{method:1}"; 
                        break;
                }
            }
        }



        if(!function_exists('payNow')) {

            function payNow($amount, $fiat, $crypto, $product, $description) {
                $api_key=config('nowpay.apikey');

                $curl = curl_init();

                $data=[
                    'price_amount'=>"$amount", 
                    'price_currency' =>"$fiat", 
                    'pay_currency' => "$crypto", 
                    "ipn_callback_url" => "https://nowpayments.io",
                    'order_id'=> "$product", 
                    'order_description' =>"$description"
                ]; 

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.nowpayments.io/v1/payment',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "price_amount": '.$amount.',
                "price_currency": "'.$fiat.'",
                "pay_currency": "'.$crypto.'",
                "ipn_callback_url": "https://nowpayments.io",
                "order_id": "'.$product.'",
                "order_description": "'.$description.'"
                }',
                
                CURLOPT_HTTPHEADER => array(
                    "x-api-key: $api_key",
                    "Content-Type: application/json"
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                return $response;

            }

        }

        if(!function_exists('getPaymentStatus'))
        {
            function getPaymentStatus($paymentid){
                $id=$paymentid; 
                $api_key=config('nowpay.apikey'); 
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.nowpayments.io/v1/payment/$id",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    "x-api-key: $api_key",
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
               
                return $response;

            }
        }

        if(!function_exists('activatePackages'))
{
    function activatePackages($user_id){
        $status='success'; 
        
        
        $PendingPayments=PendingPayment::where('user_id', $user_id)->get(); 

       

        foreach ($PendingPayments as $item) {

            

            $payment_status=getPaymentStatus($item->payment_id);
            $payment_status=json_decode($payment_status);
            $user_id=$item->user_id;
            $product_id=$item->product_id;
            $transaction_id=$item->transaction_id;

            if(isset($payment_status->payment_status))
            {

               

                $paystatus=$payment_status->payment_status;
                $user_id=$item->user_id; 
                $transaction_id=$item->transaction_id; 
                $product_id=$item->product_id; 

                switch ($paystatus) {
                    case 'finished':
                        
                        # code...
                        if(PendingPayment::where('transaction_id', $transaction_id)->exists())
                        {
                            $delete=PendingPayment::where('transaction_id', $transaction_id)->delete();
                            
                            $store=new UserProduct; 
                            $store->timestamps=false;
                            $store->user_id=$user_id; 
                            $store->product_id=$product_id;
                            $store->save(); 
    
                            $status='success'; 
                        }

                        break;

                        case 'waiting':
                       
                            # code...
                            // if(PendingPayment::where('transaction_id', $transaction_id)->exists()){
                                
                            // $delete=PendingPayment::where('transaction_id', $transaction_id)->delete();
                            
                            // $store=new UserProduct; 
                            // $store->timestamps=false;
                            // $store->user_id=$user_id; 
                            // $store->product_id=$product_id;
                            // $store->save(); 

                            // $status='success'; 
        
                            // }
                            
                            $status='success'; 

                            break;
                    
                    default:
                        # code...

                        $status='success';

                        break;
                }

            # code...
        } else {

                            // $paystatus=$payment_status->message; 
        
                            // if($paystatus=='Payment not found'){
                            //     $store=new UserProduct; 
                            //     $store->timestamps=false;
                            //     $store->user_id=$user_id; 
                            //     $store->product_id=$product_id;
                            //     $store->save(); 
            
                            //     $delete=PendingPayment::where('transaction_id', $transaction_id)->delete();
                                
                            //     $status='success';
                            // }

                            $status="success";
            
        }
        
 

        


    }

   

    return $status;
}



    }
}