<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ToDoListTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    public function can_create_a_to_do_note()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph,
            'status' => 0
        ];

        $this->post('api/v1/notes/create', $attributes);

        $this->assertDatabaseHas('notes', $attributes);
    }
}
