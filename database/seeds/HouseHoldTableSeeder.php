<?php

use Illuminate\Database\Seeder;

class HouseHoldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('households')->insert([
            'name' => 'household1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('households')->insert([
            'name' => 'household2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('households')->insert([
            'name' => 'household3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('households')->insert([
            'name' => 'household4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('households')->insert([
            'name' => 'household5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('households')->insert([
            'name' => 'household6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
