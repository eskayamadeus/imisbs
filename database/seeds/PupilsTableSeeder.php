<?php

use Illuminate\Database\Seeder;

class PupilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 30 pupil records
        factory(App\Pupil::class, 30)->create();
    }
}
