<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\PendingPayment;
use App\Models\UserProduct; 

class CheckPaymentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:paymentstatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check payment Status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        //Check All PEnding Payments 
        $pending_payment=PendingPayment::all(); 

        foreach ($pending_payment as $item) {
            
            $payment_status=getPaymentStatus($item->payment_id);
            $payment_status=json_decode($payment_status);
            $user_id=$item->user_id;
            $product_id=$item->product_id;
            $transaction_id=$item->transaction_id;
                
            if(isset($payment_status->payment_status))
                {            

                    $paystatus=$payment_status->payment_status;
                    // $user_id=$item->user_id; 
                    // $transaction_id=$item->transaction_id; 
                    // $product_id=$item->product_id; 

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
                                echo 'Successfully Activated Package'; 

                            }

                            break;

                            case 'waiting':
                        
                                // if(PendingPayment::where('transaction_id', $transaction_id)->exists()){
                                    
                                // $delete=PendingPayment::where('transaction_id', $transaction_id)->delete();
                                
                                // $store=new UserProduct; 
                                // $store->timestamps=false;
                                // $store->user_id=$user_id; 
                                // $store->product_id=$product_id;
                                // $store->save(); 

                                // $status='success'; 
                                // echo 'Successfully Activated Package'; 
            
                                // }
                                
                                $status='success'; 
                                break;
                        
                        default:
                            # code...

                            $status='success';

                            break;
                    }

                
                } 
            else {

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


        return 0;
    }
}
