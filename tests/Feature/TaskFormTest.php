<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\TaskForm;
use App\Models\Task;

class TaskFormTest extends TestCase
{
    public function test_error_with_empty_title(): void
    {
        $task = Task::factory()->create();
        $url = "/api/tasks/{$task->id}";
        $empty_title = ['title' => ''];

        $this->assertTitleValidation('put', $url, $empty_title);
    }

    public function test_error_with_over_25_character_title(): void
    {
        $task = Task::factory()->create();
        $url = "/api/tasks/{$task->id}";
        $too_long_title = ['title' => str_repeat('あ', 256)];

        $this->assertTitleValidation('put', $url, $too_long_title);
    }

    protected function assertTitleValidation(string $method, string $url, array $data)
    {
        $methodName = $method . 'Json';
        $response = $this->$methodName($url, $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['title']);
    }

    public function test_correct_title(): void
    {
        $task = Task::factory()->create();

        $response = $this->putJson("/api/tasks/{$task->id}", [
            'title' => 'テストタイトル',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', [
            'title' => 'テストタイトル',
        ]);
    }
}
