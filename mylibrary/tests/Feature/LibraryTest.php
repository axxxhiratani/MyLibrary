<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\Library;

class LibraryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_library()
    {
        $item = Library::factory()->create();
        $response = $this->get('/api/v1/library');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "language_id" => $item->language_id,
            "name" => $item->name,
            // "view_permit" => $item->view_permit
        ]);
    }

    public function test_store_library()
    {
        $item = [
            "user_id" => 1,
            "language_id" => 1,
            "name" => "HTML Library",
            "view_permit" => false
        ];
        $response = $this->post('/api/v1/library',$item);
        $response->assertStatus(201);
        $response->assertJsonFragment($item);
        $this->assertDatabaseHas("libraries",$item);
    }

    public function test_show_library()
    {
        $item = Library::factory()->create();
        $response = $this->get('/api/v1/library/'.$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "language_id" => $item->language_id,
            "name" => $item->name,
            // "view_permit" => $item->view_permit
        ]);
    }

    public function test_update_library()
    {
        $item = Library::factory()->create();
        $data = [
            "user_id" => 1,
            "language_id" => 1,
            "name" => "HTML Library",
            "view_permit" => false
        ];
        $response = $this->put('/api/v1/library/'.$item->id,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas("libraries",$data);
    }

    public function test_delete_library()
    {
        $item = Library::factory()->create();
        $response = $this->delete('/api/v1/library/'.$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }


}
