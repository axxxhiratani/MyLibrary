<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\Profile;

class ProfileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_profile()
    {
        $item = Profile::factory()->create();
        $response = $this->get('/api/v1/profile');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "work_id" => $item->work_id,
            "language_id" => $item->language_id,
            "introduction" => $item->introduction
        ]);
    }

    public function test_store_profile()
    {
        $item = [
            "user_id" => 1,
            "work_id" => 1,
            "language_id" => 3,
            "introduction" => "Goodmorning"
        ];
        $response = $this->post('/api/v1/profile',$item);
        $response->assertStatus(201);
        $response->assertJsonFragment($item);
        $this->assertDatabaseHas("profiles",$item);
    }

    public function test_show_profile()
    {
        $item = Profile::factory()->create();
        $response = $this->get('/api/v1/profile/'.$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "user_id" => $item->user_id,
            "work_id" => $item->work_id,
            "language_id" => $item->language_id,
            "introduction" => $item->introduction
        ]);
    }

    public function test_update_profile()
    {
        $item = Profile::factory()->create();
        $data = [
            "user_id" => 1,
            "work_id" => 2,
            "language_id" => 2,
            "introduction" => "Good"
        ];
        $response = $this->put('/api/v1/profile/'.$item->id,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas("profiles",$data);
    }

    public function test_delete_profile()
    {
        $item = Profile::factory()->create();
        $response = $this->delete('/api/v1/profile/'.$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }

}
