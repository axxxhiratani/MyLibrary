<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Library;

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
            "user_id" => 4,
            "language_id" => 4,
            "name" => "HTML Library",
            "view_permit" => true,
        ]);

        Library::create([
            "user_id" => 4,
            "language_id" => 14,
            "name" => "CSS Library",
            "view_permit" => false,
        ]);

    }
}
