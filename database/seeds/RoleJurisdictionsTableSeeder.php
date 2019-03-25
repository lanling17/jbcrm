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
      factory(RoleJurisdiction::class,10)->create();
      RoleJurisdiction::find(1)->update(['role_id'=>1,'jurisdiction_id'=>1]);
    }
}
