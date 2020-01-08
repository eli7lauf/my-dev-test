<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'user_name'=>'admin',
               'email'=>'admin@test.com',
                'is_admin'=>'1',
               'password'=> bcrypt('1234567'),
            ],
            [
               'name'=>'User',
               'user_name'=>'user',
               'email'=>'user@test.com',
                'is_admin'=>'0',
               'password'=> bcrypt('1234567'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
