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
            SchoolsTableSeeder::class,
            ClassroomsTableSeeder::class,
            PupilParentsTableSeeder::class,
            PupilsTableSeeder::class,
            UsersTableSeeder::class,
            StaffTableSeeder::class,
            VisitorsTableSeeder::class,
            FurnitureAndFixturesTableSeeder::class,
        ]);
    }
}
