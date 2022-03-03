<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; 

class PayoutsSchedule extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payout_schedules')->insertOrignore([
            
            [
                'user_id'=>'5', 
                'referred_by'=>'', 
                'activation_date'=>'2022-02-28', 
                'package'=>'2',
                'payout_date'=>'2022-08-28',  
                'payout_status'=>'pending', 

            ],
            [
                'user_id'=>'5', 
                'referred_by'=>'', 
                'activation_date'=>'2022-02-28', 
                'package'=>'2',
                'payout_date'=>'2023-02-28',  
                'payout_status'=>'pending', 

            ],

        ]);
    }
}
