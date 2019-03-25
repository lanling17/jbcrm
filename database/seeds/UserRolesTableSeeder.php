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
        factory(UserRole::class,10)->create();
        UserRole::find(1)->update(['user_id'=>1,'role_id'=>1]);
    }
}
