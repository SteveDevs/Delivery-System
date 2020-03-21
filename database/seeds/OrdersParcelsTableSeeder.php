<?php

use Illuminate\Database\Seeder;

class OrdersParcelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_parcels')->insert([
            'order_id' => 1,
            'parcel_id' => 1,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('order_parcels')->insert([
            'order_id' => 1,
            'parcel_id' => 2,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('order_parcels')->insert([
            'order_id' => 1,
            'parcel_id' => 3,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('order_parcels')->insert([
            'order_id' => 2,
            'parcel_id' => 4,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('order_parcels')->insert([
            'order_id' => 2,
            'parcel_id' => 5,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('order_parcels')->insert([
            'order_id' => 2,
            'parcel_id' => 6,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('order_parcels')->insert([
            'order_id' => 3,
            'parcel_id' => 7,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('order_parcels')->insert([
            'order_id' => 3,
            'parcel_id' => 8,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('order_parcels')->insert([
            'order_id' => 3,
            'parcel_id' => 9,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('order_parcels')->insert([
            'order_id' => 4,
            'parcel_id' => 10,
            'payment_amount' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
    }
}
