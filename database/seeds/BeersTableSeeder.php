<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BeersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beers')->insert([           
            'id' => 1, 
            'name' => 'Damn Good Coffee Stout', 
            'ibu' => 5,
            'calories' => 55.5,
            'abv' => 7.7,
            'brewery' => 'Mikkeller Brewing San Diego',
            'location' => "San Diego",
            'user_id' => 1,
            'style' => 'American IPA',
            'created_at' => Carbon::now(),
            'updated_at' => null
            ]);
          
            DB::table('beers')->insert([           
                'id' => 2, 
                'name' => 'Stone Go To IPA', 
                'ibu' => 5,
                'calories' => 55.5,
                'abv' => 4.8,
                'brewery' => 'Stone Go To IPA',
                'location' => "",
                'style' => 'American IPA', 
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null
                ]);      
                DB::table('beers')->insert([           
                    'id' => 3, 
                    'name' => 'Shila IPA', 
                    'ibu' => 5,
                    'calories' => 55.5,
                    'abv' => 4.8,
                    'style' => 'American IPA',
                    'brewery' => 'Asheville Brewing Company',
                    'location' => "", 
                    'user_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => null
                    ]);      
        }
}
