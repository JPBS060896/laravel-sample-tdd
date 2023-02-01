<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    public function can_create_a_user()
    {
        $attributes = [
            'username' => $this->faker->name,
            'password' => $this->faker->password,
        ];

        $this->post('api/users/create', $attributes);

        $this->assertDatabaseHas('users', $attributes);
    }
}
