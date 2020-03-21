<?php

use Illuminate\Database\Seeder;

class DeliveryParcelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_parcels')->insert([
            'delivery_id' => 1,
            'parcel_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_parcels')->insert([
            'delivery_id' => 1,
            'parcel_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_parcels')->insert([
            'delivery_id' => 1,
            'parcel_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_parcels')->insert([
            'delivery_id' => 2,
            'parcel_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_parcels')->insert([
            'delivery_id' => 2,
            'parcel_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_parcels')->insert([
            'delivery_id' => 2,
            'parcel_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_parcels')->insert([
            'delivery_id' => 3,
            'parcel_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_parcels')->insert([
            'delivery_id' => 3,
            'parcel_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_parcels')->insert([
            'delivery_id' => 3,
            'parcel_id' => 9,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
