<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorksTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Work::create([
            "name"=>"現役エンジニア"
        ]);

        Work::create([
            "name"=>"フリーランスエンジニア"
        ]);
        Work::create([
            "name"=>"エンジニア転職希望者"
        ]);
        Work::create([
            "name"=>"学生"
        ]);
        Work::create([
            "name"=>"その他"
        ]);


    }
}
