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
                    'name' => '$100 Plan',
                    'cost' => '100', 
                    
                ],

                [ 
                    'name' => '$200 Plan',
                    'cost' => '200', 
                    
                ],

                [ 
                    'name' => '$300 Plan',
                    'cost' => '300', 
                    
                ],

                [ 
                    'name' => '$500 Plan',
                    'cost' => '500', 
                    
                ],

                [ 
                    'name' => '$1000 Plan',
                    'cost' => '1000', 
                    
                ],

              
            ]);

        #END

    }
}
