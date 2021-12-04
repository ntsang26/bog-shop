<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('account_id');
            $table->integer('shop_id');
            $table->string('od_code');
            $table->float('od_total_price');
            $table->string('ship_name');
            $table->string('ship_address');
            $table->string('ship_email');
            $table->string('ship_phone');
            $table->float('ship_fee');
            $table->string('od_note');
            $table->integer('od_status');
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
