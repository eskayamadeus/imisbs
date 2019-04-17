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
            AdminsTableSeeder::class,
            PupilsTableSeeder::class,
            PupilParentsTableSeeder::class,
            UsersTableSeeder::class,
            StaffTableSeeder::class,
            VisitorsTableSeeder::class,
        ]);
    }
}
