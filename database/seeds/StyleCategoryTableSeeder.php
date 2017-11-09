<?php

use Illuminate\Database\Seeder;

class StyleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('style_categories')->insert([           
            'id' => 1, 
            'style_category' => 'Anglo-American Ales', 
        ]);
        DB::table('style_categories')->insert([           
            'id' => 2, 
            'style_category' => 'Lagers', 
        ]);
        DB::table('style_categories')->insert([           
            'id' => 3, 
            'style_category' => 'Belgian-Style Ales', 
        ]);
        DB::table('style_categories')->insert([           
            'id' => 4, 
            'style_category' => 'Stout and Porter', 
        ]);
        DB::table('style_categories')->insert([           
            'id' => 5, 
            'style_category' => 'Wheat Beer', 
        ]);
        DB::table('style_categories')->insert([           
            'id' => 6, 
            'style_category' => 'Sour Beer', 
        ]);
        DB::table('style_categories')->insert([           
            'id' => 7, 
            'style_category' => 'Other Styles', 
        ]);
        DB::table('style_categories')->insert([           
            'id' => 8, 
            'style_category' => 'Cider, Mead, Sake', 
        ]); 
    }
}
