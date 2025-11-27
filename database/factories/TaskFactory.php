<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use DateInterval;
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
        $start_at = fake()->dateTime();
        $is_expired = fake()->boolean();
        $expired_at = null;

        if ($is_expired) {
            $expired_at = $start_at->add(new DateInterval("P{$this->faker->numberBetween(1, 10)}D"));
        }

        return [
            'name' => fake()->word(),
            'description' => fake()->text(),
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'is_completed' => fake()->boolean(),
            'start_at' => $start_at,
            'expired_at' => $expired_at
        ];
    }
}
