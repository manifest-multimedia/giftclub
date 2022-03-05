<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SchedulePayouts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:payouts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule Payouts for Investments';

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

         // route::get('/test', function(){

    //     $date='2022-01-01'; 

    //     $first_payout=date('Y-m-d', strtotime($date. '+ 6 months')); 
    //     $second_payout=date('Y-m-d', strtotime($date. '+ 12 months'));
    //     // return $first_payout.$second_payout; 
    //     return view("errors.419"); 

    // }); 

    $current_date=date('Y-m-d');
    $first_payout_date = date('Y-m-d', strtotime("+6 months", strtotime($current_date)));
    $second_payout_date = date('Y-m-d', strtotime("+6 months", strtotime($first_payout_date)));
    
    echo $second_payout_date;

        return 0;
    }
}
