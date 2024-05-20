<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $i = 1;

    public function definition(): array
    {
        if (static::$i >= 201) {
            static::$i = 1;
        }

        if (static::$i <= 100) {
            $imageRange = range(1, 19);
        } else {
            $imageRange = range(20, 30);
        }

        $randomImage = fake()->randomElement($imageRange);

        static::$i++;

        return [
            'url' => 'uploads/'.$randomImage.'.jpg',
            'advertisement_id' => str(static::$i - 1),
        ];
    }
}
