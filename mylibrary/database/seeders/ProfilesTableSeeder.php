<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Profile::create([
            "user_id"=>4,
            "work_id"=>4,
            "language_id"=>4,
            "introduction" => "よろしくお願いいたします。"
        ]);
    }
}
