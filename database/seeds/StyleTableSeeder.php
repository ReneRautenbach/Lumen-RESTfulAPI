<?php

use Illuminate\Database\Seeder;

class StyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
             $path = __DIR__ . "/data";
             
             if ($handle = opendir($path)) {
                 while (false !== ($file = readdir($handle))) {
                     if ('.' === $file) continue;
                     if ('..' === $file) continue;
                     
                     $files[] = $file;
                     
                     $filename =  __DIR__ . "/data/" . $file;
                     $row = 1;
                     if (($fp = fopen($filename, "r")) !== FALSE) {
                         while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
                             $num = count($data); 

                              DB::table('styles')->insert([
                                 'id' => $row,
                                 'style' => $data[0],
                                 'style_category_id' => $data[1],    
                             ]);
                            $row++;

                         }
                         fclose($fp);
                     }
                       
                    }
            }
            closedir($handle);  
               
    }
     
}
