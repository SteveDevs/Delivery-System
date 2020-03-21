<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DeliveryHouseholdTableSeeder::class,
            DeliveryParcelTableSeeder::class,
            DeliveryTableSeeder::class,
            HouseHoldTableSeeder::class,
            OrdersParcelsTableSeeder::class,
            OrdersTableSeeder::class,
            ParcelTableSeeder::class,
            PargonaughtDeliveryTableSeeder::class,
            PargonaughtTableSeeder::class
        ]);
    }
}
