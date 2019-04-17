<?php

use Illuminate\Database\Seeder;

class PupilParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 30 pupil records
        factory(App\PupilParent::class, 30)->create();
    }
}
