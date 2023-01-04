<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('ad');
            $table->string('sekil1')->nullable();
            $table->string('sekil2')->nullable();
            $table->string('sekil3')->nullable();
            $table->string('ambar_kodu');
            $table->string('istehsalci_kodu');
            $table->longtext('haqqinda');
            $table->string('filtr');
            $table->string('teyinat');
            $table->double('qiymet');
            $table->string('istehsalci');
            $table->integer('baxis')->default('0');
            $table->float('reytinq')->default('0');
            $table->string('endirim')->default('0');
            $table->tinyInteger('movcudluq')->default('1');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('products');
    }
}
