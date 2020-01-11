<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->char('name', 100);
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('image', 255);
            $table->integer('price');
            $table->integer('sale_price');
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
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
