<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; 

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('products')->insertOrignore(

            [

                [ 
                    'name' => 'Popular Plan $100',
                    'cost' => '100',
                    'description'=>'Popular Investment Plan with 100% Annual Percentage Yield.', 
                    
                ],

                [ 
                    'name' => 'Classic Plan $200',
                    'cost' => '200', 
                    'description' => 'Classic Investment Plan with 100% Annual Percentage Yield.', 
                    
                ],

                [ 
                    'name' => 'Silver Plan $500',
                    'cost' => '500',
                    'description' => 'Silver Investment Plan with 100% Annual Percentage Yield.', 
                    
                ],

                [ 
                    'name' => 'Gold Plan $1000',
                    'cost' => '1000', 
                    'description' => 'Gold Investment Plan with 100% Annual Percentage Yield.'
                    
                ],
                
                [ 
                    'name' => 'Platinum Plan $2000-$5000',
                    'cost' => '0',
                    'description' => 'Platinum Investman Plan with 100% Annual Percentage Yield.' 
                    
                ],
                

                [ 
                    'name' => '$12 Test Plan',
                    'cost' => '12', 
                    'description' => 'Test Plan for testing purposes.'
                    
                ],

            ]);

        #END

    }
}
