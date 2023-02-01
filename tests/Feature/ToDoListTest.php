<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ToDoListTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    public function succesfully_create_a_note()
    {
        $attributes = [
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'status' => 1
        ];
        $response = $this->postJson('api/v1/notes/create', $attributes);
        $response->assertStatus(200);
    }

    /** @test */
    public function a_note_requires_a_title()
    {
        $attributes = [
            'description' => $this->faker->paragraph,
            'status' => 1
        ];
        $response = $this->postJson('api/v1/notes/create', $attributes)->assertStatus(422);
    }

    /** @test */
    public function a_note_requires_a_description()
    {
        $attributes = [
            'title' => $this->faker->word,
            'status' => 1
        ];
        $response = $this->postJson('api/v1/notes/create', $attributes)->assertStatus(422);
    }

    /** @test */
    public function fail_to_create_a_note()
    {
        $response = $this->postJson('api/v1/notes/create');
        $response->assertStatus(422);
    }

    /** @test */
    public function successfully_update_a_note()
    {
        $attributes = [
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'status' => 0
        ];
        $response = $this->json("PUT", 'api/v1/notes/update/' . 1, $attributes);
        $response->assertStatus(200);
    }

    /** @test */
    public function successfully_delete_a_note()
    {
        $response = $this->json("DELETE", 'api/v1/notes/delete/' . 1);
        $response->assertStatus(200);
    }
}
