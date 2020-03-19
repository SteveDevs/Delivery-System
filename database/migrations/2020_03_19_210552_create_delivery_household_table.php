<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryHouseholdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_household', function (Blueprint $table) {
            $table->primary(['delivery_id', 'household_id']);
            $table->integer('delivery_id');
            $table->integer('household_id');
            //$table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
            //$table->foreign('household_id')->references('id')->on('households')->onDelete('cascade');
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
        Schema::dropIfExists('delivery_household');
    }
}
