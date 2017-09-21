<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('type');
            $table->string('sub_type');
            $table->string('gender')
            ->reference('gender')->on("User");
            $table->string('time');
            $table->string('volume');
            $table->string('price');
            //$table->string('location');
            $table->string('name');
            $table->long('desc');
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
        Schema::dropIfExists('sells');
    }
}
