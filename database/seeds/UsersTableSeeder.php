<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([           
            'id' => 1, 
            'name' => 'Rene Rautenbach', 
            'email' => 'rene@clickasite.co.za',
            'password' => app('hash')->make('test12'),
            'daily_beer_limit' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => null
            ]);
            
    }
}
