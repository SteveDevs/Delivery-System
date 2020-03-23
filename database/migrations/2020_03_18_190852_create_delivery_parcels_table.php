<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_parcels', function (Blueprint $table) {
            $table->primary(['delivery_id', 'parcel_id']);
            $table->bigInteger('delivery_id');
            $table->bigInteger('parcel_id');
            $table->integer('parcel_delivered')->default(0);
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
        Schema::dropIfExists('delivery_parcels');
    }
}
