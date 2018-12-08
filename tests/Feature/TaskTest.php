<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTaskIndex()
    {
        $response = $this->json('GET', '/api/task');

        $response->assertStatus(200);
    }

    public function testTaskStore()
    {
        $response = $this->json('POST', '/api/task', [
            'task' => 'Testing Task'
        ]);

        $response->assertStatus(201);
    }

    public function testTaskShow()
    {
        $response = $this->json('GET', '/api/task/1');

        $response->assertStatus(200)
                 ->assertJson([
                     'task' => 'Testing Task'
                 ]);
    }

    public function testTaskUpdate()
    {
        $response = $this->json('PUT', '/api/task/1', [
            'task'      => 'Testing Task',
            'completed' => true
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'completed' => true
                 ]);
    }

    public function testTaskDestroy()
    {
        $response = $this->json('DELETE', '/api/task/1');

        $response->assertStatus(200);
    }

}
