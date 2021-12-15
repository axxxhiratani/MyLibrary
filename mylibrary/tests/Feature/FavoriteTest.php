<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\Favorite;

class FavoriteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_favorite()
    {
        $item = Favorite::factory()->create();
        $response = $this->get('/api/v1/favorite');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "library_id" => $item->library_id,
            "user_id" => $item->user_id
        ]);
    }

    public function test_store_favorite()
    {
        $item = [
            "library_id" => 4,
            "user_id" => 5,
        ];
        $response = $this->post('/api/v1/favorite',$item);
        $response->assertStatus(201);
        $response->assertJsonFragment($item);
        $this->assertDatabaseHas("favorites",$item);
    }

    public function test_show_favorite()
    {
        $item = Favorite::factory()->create();
        $response = $this->get('/api/v1/favorite/'.$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "library_id" => $item->library_id,
            "user_id" => $item->user_id
        ]);
    }

    public function test_update_favorite()
    {
        $item = Favorite::factory()->create();
        $data = [
            "library_id" => 4,
            "user_id" => 5,
        ];
        $response = $this->put('/api/v1/favorite/'.$item->id,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas("favorites",$data);
    }

    public function test_delete_favorite()
    {
        $item = Favorite::factory()->create();
        $response = $this->delete('/api/v1/favorite/'.$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }

}
