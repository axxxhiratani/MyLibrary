<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("image");
            $table->timestamp("created_at")->useCurrent()->nullable();
            $table->timestamp("updated_at")->useCurrent()->nullable();
            $table->softDeletes();
          });

        //データ挿入
        // DB::table('languages')->insert([
        //     "name" => "HTML",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/html.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "CSS",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/css.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "JavaScript",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/javascript.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "VBA",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/vba.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "PHP",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/php.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "Java",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/java.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "Ruby",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/ruby.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "Python",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/python.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "Linux",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/linux.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "ShellScript",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/shellscript.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "IT用語",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/itword.png"
        // ]);
        // DB::table('languages')->insert([
        //     "name" => "その他",
        //     "image" => "https://d1jsua0yydl5v7.cloudfront.net/img/normal.png"
        // ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
