<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskAddTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_task_can_be_created_via_api()
    {
        $taskData = [
            'title' => 'Test Task',
            'description' => 'This is a test task description.',
            'status' => 1,
        ];

        $response = $this->postJson('/api/tasks', $taskData);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id', 'title', 'description', 'status', 'created_at', 'updated_at',
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test task description.',
            'status' => 1,
        ]);
    }
}
