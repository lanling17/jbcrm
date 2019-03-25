<?php

use Illuminate\Database\Seeder;
use App\Models\RoleJurisdiction;

class RoleJurisdictionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      RoleJurisdiction::insert([
        'role_id' => 1,
        'jurisdiction_id' => 1,
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),
      ]);
    }
}
