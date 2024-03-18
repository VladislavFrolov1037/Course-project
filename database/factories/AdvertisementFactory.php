<?php

namespace Database\Factories;

use App\Models\Advertisement;
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
            'address' => $this->faker->address(),
            'house_number' => random_int(1, 255),
            'description' => $this->faker->text(50),
            'price' => random_int(5000, 35000),
            'square' => random_int(25, 150),
            'floor' => $randomFloor,
            'num_floors' => $num_floors,
            'balcony' => $this->faker->boolean,
            'rental_time_id' => random_int(1, 2),
            'num_rooms' => random_int(1, 6),
            'repair_type_id' => random_int(1, 4),
            'status_id' => 1,
            'user_id' => random_int(1, 50),
            'district_id' => random_int(1, 3),
            'type_object_id' => random_int(1, 2),
        ];
    }
}
