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
            $table->increments('id');
            $table->integer('id_user')
                ->reference('id')->on('User')->onDelete('cascade');
            $table->integer('type');
            $table->integer('sub_type');
            $table->integer('men');
            $table->integer('women');
            $table->integer('morning');
            $table->integer('noon');
            $table->integer('afternoon');
            $table->integer('evening');
            $table->integer('night');
            $table->integer('volume');
            $table->double('price');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('desc')->nullable();
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
