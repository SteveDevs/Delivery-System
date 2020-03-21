<?php

use Illuminate\Database\Seeder;

class PargonaughtDeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pargo_naught_deliveries')->insert([
            'pargo_naught_id' => 1,
            'delivery_id' => 1,
            'parcel_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naught_deliveries')->insert([
            'pargo_naught_id' => 2,
            'delivery_id' => 1,
            'parcel_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naught_deliveries')->insert([
            'pargo_naught_id' => 3,
            'delivery_id' => 1,
            'parcel_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naught_deliveries')->insert([
            'pargo_naught_id' => 4,
            'delivery_id' => 2,
            'parcel_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
