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
        $this->call(UsersTableSeeder::class);
        $this->call(UserJurisdictionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(JurisdictionsTableSeeder::class);
        $this->call(RoleJurisdictionsTableSeeder::class);
        $this->call(ClassifiesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
    }
}
