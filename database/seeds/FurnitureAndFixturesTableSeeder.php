<?php

use Illuminate\Database\Seeder;

class FurnitureAndFixturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 records
        factory(App\Furniture_and_fixture::class, 10)->create();
    }
}
