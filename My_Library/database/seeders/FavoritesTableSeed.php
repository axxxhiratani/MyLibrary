<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Favorite;

class FavoritesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Favorite::create([
            "library_id" => 1,
            "user_id" => 1
        ]);

        Favorite::create([
            "library_id" => 2,
            "user_id" => 1
        ]);

        Favorite::create([
            "library_id" => 3,
            "user_id" => 1
        ]);
    }
}
