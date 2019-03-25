<?php

use Illuminate\Database\Seeder;

class ClassifiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Classify::class,5)->create();
    }
}
