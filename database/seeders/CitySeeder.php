<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::insert([
            ['name' => 'Магнитогорск'],
            ['name' => 'Челябинск'],
            ['name' => 'Миасс'],
        ]);
    }
}
