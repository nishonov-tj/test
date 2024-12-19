<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskDataTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_get_tasks()
    {
        $task1 = Task::create([
            'title' => 'Task 1',
            'description' => 'Description Task 1',
            'status' => 1
        ]);

        $task2 = Task::create([
            'title' => 'Task 2',
            'description' => 'Description Task 2',
            'status' => 2
        ]);

        $response = $this->get('/api/tasks');

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'title' => 'Task 1',
            'description' => 'Description Task 1',
            'status' => 1
        ]);

        $response->assertJsonFragment([
            'title' => 'Task 2',
            'description' => 'Description Task 2',
            'status' => 2
        ]);
    }

    /**
     * @return void
     */
    public function test_get_single_task()
    {

        $task = Task::create([
            'title' => 'Single Task',
            'description' => 'Description Single Task',
            'status' => 1
        ]);

        $response = $this->get('/api/tasks/' . $task->id);

        $response->assertStatus(200);

        $response->assertJson([
            'id' => $task->id,
            'title' => 'Single Task',
            'description' => 'Description Single Task',
            'status' => 1
        ]);
    }
}
