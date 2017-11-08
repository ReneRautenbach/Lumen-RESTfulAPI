<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBeers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string( 'name' ); 
            $table->integer( 'ibu' ); 
            $table->integer( 'calories' );  
            $table->decimal('abv', 5, 2);
            $table->string( 'brewery' ); 
            $table->string( 'location' ); 
            $table->string( 'style' );  
            $table->integer( 'user_id' ); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}
