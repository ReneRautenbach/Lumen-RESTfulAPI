<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call('UsersTableSeeder');
       $this->call('BeersTableSeeder');
       $this->call('ReviewsTableSeeder');
       $this->call('StyleCategoryTableSeeder');
       $this->call('StyleTableSeeder');
    }
}
