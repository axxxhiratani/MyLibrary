<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Profile;

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
            "introduction" => "よろしくお願いいたします。"
        ]);
    }
}
