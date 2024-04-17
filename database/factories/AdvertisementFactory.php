<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    protected static $houseCount = 0;
    protected static $apartmentCount = 0;

    public function definition(): array
    {
        $randomFloor = random_int(1, 14);
        $num_floors = random_int($randomFloor, 14);

        if (static::$apartmentCount < 100) {
            $typeObject = 'Квартира';
            static::$apartmentCount++;
        } elseif (static::$houseCount < 100) {
            $typeObject = 'Дом';
            static::$houseCount++;
        } else {
            static::$houseCount = 0;
            static::$apartmentCount = 0;

            $typeObject = 'Квартира';
            static::$apartmentCount++;
        }

        $advertisementData = [
            'user_id' => User::factory()->create()->id,
            'address_id' => Address::factory()->create()->id,
            'repair_type' => random_int(1, 4),
            'num_rooms' => random_int(1, 6),
            'square' => random_int(25, 150),
            'price' => random_int(5000, 35000),
            'type_object' => $typeObject,
            'rental_time' => random_int(1, 2),
            'description' => fake()->text(50),
            'status_id' => random_int(1, 3)
        ];

        if ($typeObject === 'Дом') {
            $advertisementData['num_floors'] = random_int(1, 3);
            $advertisementData['floor'] = null;
            $advertisementData['balcony'] = null;
        } else {
            $advertisementData['floor'] = $randomFloor;
            $advertisementData['balcony'] = fake()->boolean;
            $advertisementData['num_floors'] = $num_floors;
        }

        return $advertisementData;
    }
}

