<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // 获取 Faker 实例
      $faker = app(Faker\Generator::class);

      //头像假数据
      $head_pic = [
           'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png',
           'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png',
           'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png',
           'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png',
           'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png',
           'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png',
      ];
      // 生成数据集合
       $users = factory(User::class)->times(10)->make()->each(function ($user,$index) use ($faker,$head_pic){
         $user->head_pic = $faker->randomElement($head_pic);
       });
       // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($user_array);

        //单独处理第一个用户
      //   DB::table('users')->insert([
      //      'name' => Str::random(10),
      //      'email' => Str::random(10).'@gmail.com',
      //      'username' => Str::random(6),
      //      'password' => bcrypt('123456'),
      //  ]);
    }
}
