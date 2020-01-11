<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('forename', 100);
            $table->char('surname', 100);
            $table->string('add1', 100);
            $table->string('add2', 100);
            $table->string('add3', 100);
            $table->integer('post_code');
            $table->integer('phone');
            $table->string('email');
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
        Schema::dropIfExists('delivery_addresses');
    }
}
