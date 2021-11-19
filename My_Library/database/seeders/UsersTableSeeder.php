<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            "name"=>"akio",
            "email"=>"akio@gmail.com",
            "password"=>"root1223334444"
        ]);
        User::create([
            "name"=>"yuri",
            "email"=>"yuri@gmail.com",
            "password"=>"root1223334444"
        ]);

    }
}
