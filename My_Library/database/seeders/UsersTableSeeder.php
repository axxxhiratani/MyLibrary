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
            'uuid' => "XdXdU5WP9ASO3LNosjuYZE4bY032",
            "work_id" =>1,
            "language_id" => 1,
            "introduction" =>"hello world",
        ]);

    }
}
