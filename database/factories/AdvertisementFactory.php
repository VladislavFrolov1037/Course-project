<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Advertisement::class;

    public function definition(): array
    {
        $randomFloor = random_int(1, 14);
        $num_floors = random_int($randomFloor, 14);
        return [
            'user_id' => User::factory()->create()->id,
            'address_id' => Address::factory()->create()->id,
            'repair_type_id' => random_int(1, 4),
            'num_rooms' => random_int(1, 6),
            'num_floors' => $num_floors,
            'floor' => $randomFloor,
            'square' => random_int(25, 150),
            'price' => random_int(5000, 35000),
            'type_object' => fake()->randomElement(['Дом', 'Квартира']),
            'balcony' => fake()->boolean,
            'rental_time' => fake()->randomElement(['Посуточно', 'Долгосрочно']),
            'description' => fake()->text(50),
            'status_id' => random_int(1,3)
        ];
    }
}
