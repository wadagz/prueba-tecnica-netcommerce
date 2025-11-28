<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Stores a new Task.
     */
    public function store(StoreTaskRequest $request): TaskResource
    {
        $validated = $request->validated();

        $task = new Task();
        $task = Task::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'user_id' => $validated['user_id'],
            'company_id' => $validated['company_id'],
        ]);

        $task->load(['user', 'company']);

        return new TaskResource($task);
    }
}
