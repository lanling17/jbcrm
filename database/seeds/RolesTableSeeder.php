<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::insert([
          'name' => '超级管理员',
          'slug' => 'Administrator',
          'created_at' => date('Y-m-d H:i:s',time()),
          'updated_at' => date('Y-m-d H:i:s',time()),
        ]);
    }
}
