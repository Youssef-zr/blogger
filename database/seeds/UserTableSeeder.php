<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => "youssef", "email" => "admin@admin.com", "password" => bcrypt('123456')],
            ['name' => "samir", "email" => "samir@admin.com", "password" => bcrypt('123456')],
            ['name' => "imad", "email" => "imad@admin.com", "password" => bcrypt('123456')],
        ];

        foreach ($users as $user) {
            $new = new User();
            $new->fill($user)->save();
        }
    }
}
