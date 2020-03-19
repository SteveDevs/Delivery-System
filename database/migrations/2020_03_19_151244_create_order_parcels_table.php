<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_parcels', function (Blueprint $table) {
            $table->primary(['order_id', 'parcel_id']);
            $table->integer('order_id');
            $table->integer('parcel_id');
            $table->float('payment_amount');
            //$table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
            //$table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
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
        Schema::dropIfExists('order_parcels');
    }
}
