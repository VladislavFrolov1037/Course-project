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

        if (static::$i >= 101) {
            static::$i = 1;
        }

        return [
            'url' => 'uploads/' . random_int(1, 19) . '.jpg',
            'advertisement_id' => str(static::$i++),
        ];
    }
}
