<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Word;

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
            "library_id" => 1,
            "name" => "<a href=></a>",
            "meaning" => "ハイパーリンク",
            "note" => "なし"
        ]);
        Word::create([
            "library_id" => 1,
            "name" => "<form>",
            "meaning" => "フォーム",
            "note" => "なし"
        ]);


    }
}
