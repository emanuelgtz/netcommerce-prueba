<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\CreatedTaskResource;
use App\Models\Task;


class TaskController extends Controller
{
    //
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        
        // return new CreatedTaskResource($task);
        return response()->json( new CreatedTaskResource($task));
    }
}
