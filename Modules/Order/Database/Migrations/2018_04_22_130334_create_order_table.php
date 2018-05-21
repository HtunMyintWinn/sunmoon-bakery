<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('name');
            $table->integer('phone_number');
            $table->string('email');
            $table->longText('address');
            $table->string('product_id');
            $table->string('quantity');
            $table->integer('discount');
            $table->boolean('is_guest')->default(0);
            $table->integer('member_id');
            $table->integer('service_fee');
            $table->integer('delivery_fee');
            $table->string('delivery_address');
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
        Schema::dropIfExists('order');
    }
}
