<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $streets = ['Ленина', 'Ворошилова', 'Карла-Маркса', 'Гагарина', 'Калмыкова', 'Доменщиков', 'Электросети', 'Галиуллина', 'Завенягина'];
        return [
            'address' => $streets[random_int(0, 8)],
            'house_number' => random_int(1, 350),
            'district_id' => random_int(1, 15),
        ];
    }
}
