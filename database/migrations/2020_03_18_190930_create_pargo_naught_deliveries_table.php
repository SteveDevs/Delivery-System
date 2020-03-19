<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePargoNaughtDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pargo_naught_deliveries', function (Blueprint $table) {
            
            $table->bigInteger('pargo_naught_id');
            $table->bigInteger('delivery_id');
            $table->bigInteger('parcel_id');
            //$table->foreign('pargo_naught_id')->references('id')->on('pargo_naughts')->onDelete('cascade');
            //$table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
            //$table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['pargo_naught_id', 'delivery_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pargo_naught_deliveries');
    }
}
