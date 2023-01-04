<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('category');
        Schema::create('category', function (Blueprint $table){
            $table->id();
            $table->string('teyinat');
            $table->timestamps();
        });

        if(!Schema::hasTable('category')) {
            Schema::create('category', function (Blueprint $table) {
                $table->id();
                $table->string('teyinat');
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
