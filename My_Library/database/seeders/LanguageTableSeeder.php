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
            "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/html.png"
        ]);

        Language::create([
            "name" => "CSS",
            "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/css.png"
        ]);

        Language::create([
            "name" => "JavaScript",
            "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/javascript.png"
        ]);

        Language::create([
            "name" => "PHP",
            "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/php.png"
        ]);

        Language::create([
            "name" => "JAVA",
            "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/java.png"
        ]);

        Language::create([
            "name" => "Ruby",
            "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/ruby.png"
        ]);

        Language::create([
            "name" => "python",
            "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/python.png"
        ]);
        Language::create([
            "name" => "その他",
            "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/normal.png"
        ]);

    }
}
