<?php

namespace App\Http\Requests;

use App\Rules\LessThanFiveTask;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:50',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
            'start_at' => 'required|date',
            'expired_at' => 'required|date|after_or_equal:start_at',
            'user_id' => ['required', 'exists:users,id', new LessThanFiveTask],
            'company_id' => 'required|exists:companies,id',
        ];
    }

    public function messages() {
        return [
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
            'user_id.required' => 'There must be a user attache to this task.',
            
            'user_id.exists' => 'The inserted user, does not exist',

            'company_id.required' => 'There must be a company attached to this task.',
            'company_id.exists' => 'This company does not exist.',
        ];
    }
}
