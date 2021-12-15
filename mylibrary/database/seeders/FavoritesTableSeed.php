<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite;

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
            "library_id" => 4,
            "user_id" => 4
        ]);

        Favorite::create([
            "library_id" => 14,
            "user_id" => 4
        ]);

    }
}
