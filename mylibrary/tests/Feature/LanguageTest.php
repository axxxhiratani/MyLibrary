<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\Language;

class LanguageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_language()
    {
        $item = Language::factory()->create();
        $response = $this->get("/api/v1/language");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name" => $item->name,
            "image" => $item->image
        ]);
    }

    public function test_store_language()
    {
        $item = [
            "name" => "VBA",
            "image" => "VBA.png"
        ];
        $response = $this->post("/api/v1/language",$item);
        $response->assertStatus(201);
        $response->assertJsonFragment($item);
        $this->assertDatabaseHas("languages",$item);
    }

    public function test_show_language()
    {
        $item = Language::factory()->create();
        $response = $this->get("/api/v1/language/".$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name" => $item->name,
            "image" => $item->image
        ]);
    }

    public function test_update_language()
    {
        $item = Language::factory()->create();
        $date = [
            "name" => "HMTL",
            "image" => "HTML.png"
        ];
        $response = $this->put("/api/v1/language/".$item->id,$date);
        $response->assertStatus(200);
        $this->assertDatabaseHas("languages",$date);
    }

    public function test_delete_Language()
    {
        $item = Language::factory()->create();
        $response = $this->delete("/api/v1/language/".$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }

}
