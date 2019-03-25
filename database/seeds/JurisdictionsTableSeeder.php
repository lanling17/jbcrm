<?php

use Illuminate\Database\Seeder;
use App\Models\Jurisdiction;

class JurisdictionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //插入一条所有权限
        Jurisdiction::insert([
          'name' => '所有权限',
          'slug' => '*',
          'http_method' => 'ANY',
          'http_path' => '*',
          'created_at' => date('Y-m-d H:i:s',time()),
          'updated_at' => date('Y-m-d H:i:s',time()),
        ]);
    }
}
