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

        DB::table('products')->insert(

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
                    'description' => 'Gold Investment Plan with 100% Annaul Percentage Yield.'
                    
                ],

                // [ 
                //     'name' => '$1000 Plan',
                //     'cost' => '1000', 
                    
                // ],

              
            ]);

        #END

    }
}
