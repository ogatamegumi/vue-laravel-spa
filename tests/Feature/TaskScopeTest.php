<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskScopeTest extends TestCase
{
    use RefreshDatabase;

    public function test_完了済みのタスクを返す(): void
    {
        $completedTask = Task::factory()->create(['is_completed' => true]);
        $incompletedTask = Task::factory()->create(['is_completed' => false]);

        $request = new Request(['is_completed' => true]);
        $tasks = Task::query()->filterByCompleted($request)->get();

        $this->assertTrue($tasks->contains($completedTask));
        $this->assertFalse($tasks->contains($incompletedTask));
    }

    public function test_未完のタスクを返す(): void
    {
        $completedTask = Task::factory()->create(['is_completed' => true]);
        $incompletedTask = Task::factory()->create(['is_completed' => false]);

        $request = new Request(['is_completed' => false]);
        $tasks = Task::query()->filterByCompleted($request)->get();

        $this->assertTrue($tasks->contains($incompletedTask));
        $this->assertFalse($tasks->contains($completedTask));
    }

    public function test_すべてのタスクを返す(): void
    {
        $completedTask = Task::factory()->create(['is_completed' => true]);
        $incompletedTask = Task::factory()->create(['is_completed' => false]);

        $request = new Request();
        $tasks = Task::query()->filterByCompleted($request)->get();

        $this->assertTrue($tasks->contains($incompletedTask));
        $this->assertTrue($tasks->contains($completedTask));
    }
}
