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
        $this->call(DistrictsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(LangaugesTableSeeder::class);
        $this->call(UniversitiesTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AcademicSpecializationsTableSeeder::class);
        $this->call(TopicsTableSeeder::class);

    }
}
