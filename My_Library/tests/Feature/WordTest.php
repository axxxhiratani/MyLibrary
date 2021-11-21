<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\Word;

class WordTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_word()
    {
        $item = Word::factory()->create();
        $response = $this->get('/api/v1/word');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "library_id" => $item->library_id,
            "name" => $item->name,
            "meaning" => $item->meaning,
            "note" => $item->note
        ]);
    }

    public function test_store_word()
    {
        $item = [
            "library_id" => 1,
            "name" => "hidden",
            "meaning" => "隠す",
            "note" => "formの時使用"
        ];
        $response = $this->post('/api/v1/word',$item);
        $response->assertStatus(201);
        $response->assertJsonFragment($item);
        $this->assertDatabaseHas("words",$item);
    }
    public function test_show_word()
    {
        $item = Word::factory()->create();
        $response = $this->get('/api/v1/word/'.$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "library_id" => $item->library_id,
            "name" => $item->name,
            "meaning" => $item->meaning,
            "note" => $item->note
        ]);
    }
    public function test_update_word()
    {
        $item = Word::factory()->create();
        $data = [
            "library_id" => 3,
            "name" => "console.log",
            "meaning" => "値の出力",
            "note" => "デバックで使用する"
        ];
        $response = $this->put('/api/v1/word/'.$item->id,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas("words",$data);
    }

    public function test_delete_word()
    {
        $item = Word::factory()->create();
        $response = $this->delete('/api/v1/word/'.$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }

}
