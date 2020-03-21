<?php

use Illuminate\Database\Seeder;

class DeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->insert([
            'courier' => 'Courier1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('deliveries')->insert([
            'courier' => 'Courier2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('deliveries')->insert([
            'courier' => 'Courier3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('deliveries')->insert([
            'courier' => 'Courier4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('deliveries')->insert([
            'courier' => 'Courier5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
