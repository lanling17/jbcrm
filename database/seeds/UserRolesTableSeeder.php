<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserRole::insert([
          'user_id' => 1,
          'role_id' => 1,
          'created_at' => date('Y-m-d H:i:s',time()),
          'updated_at' => date('Y-m-d H:i:s',time()),
        ]);
    }
}
