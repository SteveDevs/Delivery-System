<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('orders')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('orders')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('orders')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('orders')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
