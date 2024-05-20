<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();

        return [
            'comment' => fake()->text(30),
            'rating' => random_int(1, 5),
            'date' => fake()->date(),
            'user_id' => fake()->randomElement($userIds),
            'status_id' => random_int(1, 3),
        ];
    }
}
