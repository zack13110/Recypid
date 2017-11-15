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
            $table->string('type');
            $table->string('sub_type');
            $table->string('gender_trade');
            $table->string('morning');
            $table->string('noon');
            $table->string('afternoon');
            $table->string('evening');
            $table->string('night');
            $table->string('volume');
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('name_product');
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
