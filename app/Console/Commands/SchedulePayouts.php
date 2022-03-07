<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; 
use App\Models\PayoutSchedule;

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

    // $current_date=date('Y-m-d');
    // $first_payout_date = date('Y-m-d', strtotime("+6 months", strtotime($current_date)));
    // $second_payout_date = date('Y-m-d', strtotime("+6 months", strtotime($first_payout_date)));
    
    // echo $second_payout_date;

        // Update All Payout Schedules to Due where Payout Date is Equal to Current Date 

        $current_date=date('Y-m-d'); 
        $update=PayoutSchedule::where('payout_date', $current_date)
        ->where('payout_status', 'pending')
        ->update([
            'payout_status'=>'due'
         ]);

         echo $current_date; 

        return 0;
    }
}
