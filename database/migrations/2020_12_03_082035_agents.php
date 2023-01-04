<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Agents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table){
            $table->id();
            $table->string('user_id');
            $table->string('category');
            $table->string('name');
            $table->string('address');
            $table->string('voen');
            $table->string('leader')->nullable();
            $table->string('leader_ns')->nullable();
            $table->string('bank');
            $table->string('h_account');
            $table->string('m_account');
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
        Schema::dropIfExists('agents');
    }
}
