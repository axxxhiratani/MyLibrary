<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Word;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Word::create([
            "library_id" => 4,
            "name" => "<a href=></a>",
            "meaning" => "ハイパーリンク",
            "note" => "なし"
        ]);
        Word::create([
            "library_id" => 4,
            "name" => "<form>",
            "meaning" => "フォーム",
            "note" => "なし"
        ]);


    }
}
