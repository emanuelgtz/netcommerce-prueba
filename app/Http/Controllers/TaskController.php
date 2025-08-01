<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Rules\LessThanFiveTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $validatedTask = $request->validate([
            'name' => 'required|string|min:4|max:50',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
            'start_at' => 'required|date',
            'expired_at' => 'required|date|after_or_equal:start_at',
            'user_id' => ['required', 'exists:users,id', new LessThanFiveTask],
            'company_id' => 'required|exists:companies,id',
        ], [
            'name.required' => 'Name cannot be empty.',
            'name.string' => 'Name must be a string',
            'name.min' => 'The name must contain at least 4 characters',
            'name.max' => 'The name cannot contain more than 50 characters.',

            'description.string' => 'The description must be string.',

            'is_completed.boolean' => 'The completion status must be true or false.',

            'start_at.required' => 'Start date must be declared.',
            'start_at.date' => 'Start date must be same day or after the task has been created.',

            'expired_at.required' => 'The expiration date is required.',
            'expired_at.date' => 'The expiration date must be a valid date format.',
            'expired_at.after_or_equal' => 'The expiration date must be the same or after the start date',

            'user_id.required' => 'There must be a user attached to this task.',
            'user_id.exists' => 'The inserted user, does not exist',

            'company_id.required' => 'There must be a company attached to this task.',
            'company_id.exists' => 'This company does not exist.',
        ]);
    
        $res = Task::create($validatedTask);
        
        return response()->json($res);
    }
}
