<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlaceSeeder::class);
        $this->call(ConsequencesSeeder::class);
        $this->call(ClassifcationSeeder::class);
        $this->call(EventNameSeeder::class);
        $this->call(DetailSeeder::class);
        $this->call(OriginsSeeder::class);
        $this->call(ContributoryFactorsSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
