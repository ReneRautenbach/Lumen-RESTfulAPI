<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'id' => 1,
            'user_id' => 1,
            'beer_id' => 1,
            'aroma' => 1,
            'appearance' => 4,
            'taste' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => null
            ]);
        DB::table('reviews')->insert([
            'id' => 2,
            'user_id' => 1,
            'beer_id' => 1,
            'aroma' => 1,
            'appearance' => 4,
            'taste' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => null
            ]);
        DB::table('reviews')->insert([
            'id' => 3,
            'user_id' => 1,
            'beer_id' => 2,
            'aroma' => 1,
            'appearance' => 4,
            'taste' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => null
            ]);
    }
}
