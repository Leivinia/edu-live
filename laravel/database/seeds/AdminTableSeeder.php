<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #步骤1：插入30条测试数据（通过faker类，注：该类默认在vendor目录中）
        for ($i = 1; $i <= 30; $i++) {
            #步骤2：实例化faker类
            $faker = Faker\Factory::create();
            #步骤3：组装插入数据
            $data[] = array(
                'username' => $faker->userName,
                'password' => bcrypt($faker->password),
                'sex' => mt_rand(1,2),
                'mobile' => '1' . mt_rand(10,99) . mt_rand(1000, 9999) . mt_rand(1000, 9999),
                'email' => $faker->email,
                'role_id' => mt_rand(1,8),
                'created_at' => time(),
                'updated_at' => time()
            );
        }
        #步骤4：插入加数据
        DB::table('admin')->insert($data);
    }
}
