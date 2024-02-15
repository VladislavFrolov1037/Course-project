<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Advertisement::class;

    public function definition(): array {
        $randomFloor = random_int(1, 14);
        $num_floors = random_int($randomFloor, 14);
        return [
            'address' => $this->faker->address(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'price' => random_int(5000, 25000),
            'square' => random_int(25, 150),
            'floor' => $randomFloor,
            'num_floors' => $num_floors,
            'city' => $this->faker->city,
            'time_of_agreement' => 'Долгосрочный',
            'balcony' => $this->faker->boolean,
            'num_rooms' => random_int(1, 6),
            'phone' => $this->faker->phoneNumber,

        ];
    }
}
