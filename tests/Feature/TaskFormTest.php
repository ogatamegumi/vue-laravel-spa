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

        $response = $this->putJson("/api/tasks/{$task->id}", [
            'title' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['title']);
        $response->assertJsonFragment([
            'title' => ['タイトルは必須です。']
        ]);
    }

    public function test_error_with_over_25_character_title(): void
    {
        $task = Task::factory()->create();
        $longTitle = str_repeat('あ', 256);

        $response = $this->putJson("/api/tasks/{$task->id}", [
            'title' => $longTitle,
        ]);

        $response->assertJsonValidationErrors(['title']);
        $response->assertJsonFragment([
            'title' => ['タイトルは255字以内で入力してください。']
        ]);
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
