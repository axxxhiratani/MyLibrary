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
            'uuid' => "fioniowf31r4r",
            "work_id" =>1,
            "language_id" => 1,
            "introduction" =>"hello",

        ]);

        User::create([
            "name"=>"yuri",
            'uuid' => "fiofwewwfeniowf31r4r",
            "work_id" =>1,
            "language_id" => 1,
            "introduction" =>"hello",
        ]);


    }
}
