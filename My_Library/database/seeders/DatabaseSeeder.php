<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        //userの登録
        // $this->call(UsersTableSeeder::class);

        //languageの登録
        // $this->call(LanguageTableSeeder::class);

        //workの登録
        // $this->call(WorksTablesSeeder::class);

        //profileの登録
        $this->call(ProfilesTableSeeder::class);
    }
}
