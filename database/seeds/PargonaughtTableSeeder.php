<?php

use Illuminate\Database\Seeder;

class PargonaughtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught1',
            'status' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught2',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught3',
            'status' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught4',
            'status' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught5',
            'status' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught6',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught7',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught8',
            'status' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught9',
            'status' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught10',
            'status' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught11',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught12',
            'status' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught13',
            'status' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught14',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pargo_naughts')->insert([
            'name' => 'pargonaught15',
            'status' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
