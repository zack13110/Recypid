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
            $table->integer('id_user')
                ->reference('id')->on('User')->onDelete('cascade');
            $table->integer('type');
            $table->integer('sub_type');
            $table->integer('gender');
            $table->integer('time');
            $table->integer('volume');
            $table->double('price');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('buys');
    }
}
