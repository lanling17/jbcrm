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
        $date = date('Y-m-d H:i:s',time());
        Role::insert([
          ['name' => '开发者','slug' => 'Administrator','created_at' => $date,'updated_at' => $date],
          ['name' => 'CEO','slug' => 'CEO','created_at' => $date,'updated_at' => $date],
          ['name' => '运营','slug' => 'Operation','created_at' => $date,'updated_at' => $date],
          ['name' => '市场','slug' => 'Market','created_at' => $date,'updated_at' => $date],
          ['name' => '国际','slug' => 'International','created_at' => $date,'updated_at' => $date],
          ['name' => '编辑','slug' => 'Redact','created_at' => $date,'updated_at' => $date],
        ]);
    }
}
