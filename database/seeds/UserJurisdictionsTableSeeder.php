<?php

use Illuminate\Database\Seeder;
use App\Models\UserJurisdictions;

class UserJurisdictionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      factory(UserJurisdictions::class,10)->create();
      UserJurisdictions::find(1)->update(['user_id'=>1,'jurisdictions_id'=>1]);
    }
}
