<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Language::create([
            "name" => "HTML",
            "image" => "HTML.png"
        ]);

        Language::create([
            "name" => "CSS",
            "image" => "CSS.png"
        ]);

        Language::create([
            "name" => "JavaScript",
            "image" => "JavaScript.png"
        ]);

        Language::create([
            "name" => "PHP",
            "image" => "PHP.png"
        ]);

        Language::create([
            "name" => "JAVA",
            "image" => "JAVA.png"
        ]);

        Language::create([
            "name" => "Ruby",
            "image" => "Ruby.png"
        ]);

        Language::create([
            "name" => "Python",
            "image" => "Python.png"
        ]);
    }
}
