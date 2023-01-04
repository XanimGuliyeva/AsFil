<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table){
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('order_token');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('post_code');
            $table->string('reciever');
            $table->string('payment');
            $table->string('manager')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
