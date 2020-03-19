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
            $table->id();
            $table->bigInteger('pargo_naught_id');
            $table->bigInteger('delivery_id');
            $table->bigInteger('parcel_id');
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
        Schema::dropIfExists('pargo_naught_deliveries');
    }
}
