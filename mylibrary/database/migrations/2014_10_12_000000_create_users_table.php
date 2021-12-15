<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('uuid');
            $table->integer("work_id");
            $table->integer("language_id");
            $table->string("introduction",1024);
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            $table->timestamp("created_at")->useCurrent()->nullable();
            $table->timestamp("updated_at")->useCurrent()->nullable();
            $table->softDeletes();
        });

        // //データ挿入
        // DB::table('users')->insert([
        //     "name"=>"akio",
        //     'uuid' => "XdXdU5WP9ASO3LNosjuYZE4bY032",
        //     "work_id" =>1,
        //     "language_id" => 1,
        //     "introduction" =>"hello world",
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
