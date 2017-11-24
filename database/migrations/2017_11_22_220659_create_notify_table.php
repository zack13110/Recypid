<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('notify', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user_A');
            $table->integer('id_user_B');
            $table->integer('id_product_A');
            $table->integer('id_product_B');
            $table->string('type_product_A');
            $table->string('type_product_B');
            $table->string('confirm_A');
            $table->string('confirm_B');
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
        //
        Schema::dropIfExists('notify');
    }
}
