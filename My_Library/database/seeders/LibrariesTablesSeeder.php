<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Library;

class LibrariesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Library::create([
            "user_id" => 1,
            "language_id" => 1,
            "name" => "HTML Library",
            "view_permit" => true,
        ]);

        Library::create([
            "user_id" => 1,
            "language_id" => 2,
            "name" => "CSS Library",
            "view_permit" => false,
        ]);

    }
}
