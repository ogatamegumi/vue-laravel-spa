<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskForm;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return Task::filterByCompleted($request)->get();
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(TaskForm $request)
    {
        return Task::create($request->validated());
    }

    public function update(TaskForm $request, Task $task)
    {
        $task->update($request->validated());

        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return $task;
    }
}
