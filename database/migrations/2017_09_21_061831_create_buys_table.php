<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buys', function (Blueprint $table) {
            $table->increments('id');
            $table->int('id_user')
                ->reference('id')->on('User')->onDelete('cascade');
            $table->integer('type');
            $table->integer('sub_type');
            $table->integer('gender');
            $table->integer('time');
            $table->integer('volume');
            $table->double('price');
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
        Schema::dropIfExists('buys');
    }
}
