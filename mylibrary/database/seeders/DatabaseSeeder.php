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

        //workの登録
        $this->call(WorksTablesSeeder::class);

        //languageの登録
        $this->call(LanguageTableSeeder::class);

        //userの登録
        $this->call(UsersTableSeeder::class);

        //libraryの登録
        $this->call(LibrariesTablesSeeder::class);

        // workの登録
        $this->call(WordsTableSeeder::class);

        // favoriteの登録
        $this->call(FavoritesTableSeed::class);

        //profileの登録
        // $this->call(ProfilesTableSeeder::class);

    }
}
