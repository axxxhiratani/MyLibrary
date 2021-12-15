<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\Work;

class WorkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_work()
    {
        $item = Work::factory()->create();
        $response = $this->get('/api/v1/work');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name" => $item->name
        ]);
    }

    public function test_store_work()
    {
        $item = [
            "name" => "講師"
        ];
        $response = $this->post("/api/v1/work",$item);
        $response->assertStatus(201);
        $response->assertJsonFragment($item);
        $this->assertDatabaseHas("works",$item);
    }

    public function test_show_work(){
        $item = Work::factory()->create();
        $response = $this->get("/api/v1/work/".$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name" => $item->name
        ]);
    }

    public function test_update_work()
    {
        $item = Work::factory()->create();
        $data = [
            "name" => "講師"
        ];
        $response = $this->put("/api/v1/work/".$item->id,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas("works",$data);
    }

    public function test_delete_work()
    {
        $item = Work::factory()->create();
        $response = $this->delete("/api/v1/work/".$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }

}
