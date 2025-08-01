<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LessThanFiveTask implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $user = User::find($value);

        if (!$user) {
            $fail("The specified user does not exist.");
            return;
        }

        $userTasks = $user->tasks()->count();

        if ($userTasks >= 5) {
            $fail("The user cannot contain more than five task, please, assign this task to another user.");
        }

    }
}
