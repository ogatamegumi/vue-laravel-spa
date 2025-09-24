<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Task extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'title',
//         'content',
//         'person_in_charge'
//     ];
// }

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_task_with_fillable_attributes()
    {
        // Task を作成
        $task = Task::create([
            'title' => 'Test Title',
            'content' => 'Test Content',
            'person_in_charge' => 'Ichiro',
        ]);

        // DB に存在することを確認
        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Title',
            'content' => 'Test Content',
            'person_in_charge' => 'Ichiro',
        ]);

        // モデルの属性も確認
        $this->assertEquals('Test Title', $task->title);
        $this->assertEquals('Test Content', $task->content);
        $this->assertEquals('Ichiro', $task->person_in_charge);
    }

    /** @test */
    public function it_can_generate_task_using_factory()
    {
        // Factory で作成
        $task = Task::factory()->create();

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
        ]);
    }
}
