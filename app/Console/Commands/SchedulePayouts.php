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
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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




        return 0;
    }
}
