<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => 'Task',
            'description' => fake()->paragraph(),
            'is_completed' => fake()->boolean(60,),
            'start_at' => now(),
            'expired_at' => fake()->dateTimeThisYear('+2 months'),
            'user_id' => User::factory(),
            'company_id' => Company::factory()
        ];
    }
}
