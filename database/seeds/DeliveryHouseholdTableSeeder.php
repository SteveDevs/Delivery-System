<?php

use Illuminate\Database\Seeder;

class DeliveryHouseholdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_household')->insert([
            'delivery_id' => 1,
            'household_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_household')->insert([
            'delivery_id' => 1,
            'household_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('delivery_household')->insert([
            'delivery_id' => 2,
            'household_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
