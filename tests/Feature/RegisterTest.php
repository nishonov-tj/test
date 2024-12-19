<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_user_can_register_via_api()
    {

        $registrationData = [
            'name' => 'Demo',
            'email' => 'demo@example.com',
            'password' => 'qwerty123',
            'password_confirmation' => 'qwerty123',
        ];

        $response = $this->postJson('/api/register', $registrationData);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'user' => [
                'id', 'name', 'email', 'created_at', 'updated_at'
            ],
            'token'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'demo@example.com',
        ]);

        $this->assertNotNull($response->json('token'));
    }
}