<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_user()
    {
        $item = User::factory()->create();
        $response = $this->get("/api/v1/user");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name" => $item->name,
            "email" => $item->email,
            //passwordは暗号化せれているので一致しない
            "password" => $item->password
        ]);
    }

    public function test_store_user()
    {
        $data = [
            "name" => "hayate",
            "email" => "hayate@gmail.com",
            "password" => "root1219",
        ];
        $response = $this->post("/api/v1/user",$data);
        $response->assertStatus(201);
        //passwordは暗号化せれているので一致しない
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas("users",$data);
    }

    public function test_show_user()
    {
        $item = User::factory()->create();
        $response = $this->get("/api/v1/user/".$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name" => $item->name,
            "email" => $item->email,
            //passwordは暗号化せれているので一致しない
            "password" => $item->password
        ]);
    }

    public function test_update_user()
    {
        $item = User::factory()->create();
        $data = [
            "name" => "nobu",
            "email"=> "daigo@gmail.com",
            "password"=>"dddd"
        ];
        $response = $this->put("/api/v1/user/".$item->id,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas("users",$data);
    }

    public function test_delete_user()
    {
        $item = User::factory()->create();
        $response = $this->delete("/api/v1/user/".$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }
}
