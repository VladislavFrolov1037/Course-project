<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::insert([
            [
                'name' => 'Ленинский',
                'city_id' => 1,
            ],
            [
                'name' => 'Правобережный',
                'city_id' => 1,
            ],
            [
                'name' => 'Орджоникидзевский',
                'city_id' => 1,
            ],

            [
                'name' => 'Калининский',
                'city_id' => 2,
            ],
            [
                'name' => 'Курчатовский',
                'city_id' => 2,
            ],
            [
                'name' => 'Ленинский',
                'city_id' => 2,
            ],
            [
                'name' => 'Металлургический',
                'city_id' => 2,
            ],
            [
                'name' => 'Советский',
                'city_id' => 2,
            ],
            [
                'name' => 'Тракторозаводский',
                'city_id' => 2,
            ],
            [
                'name' => 'Центральный',
                'city_id' => 2,
            ],

            [
                'name' => 'Северный',
                'city_id' => 3,
            ],
            [
                'name' => 'Южный',
                'city_id' => 3,
            ],
            [
                'name' => 'Восточный',
                'city_id' => 3,
            ],
            [
                'name' => 'Западный',
                'city_id' => 3,
            ],
            [
                'name' => 'Центральный',
                'city_id' => 3,
            ],
        ]);
    }
}
