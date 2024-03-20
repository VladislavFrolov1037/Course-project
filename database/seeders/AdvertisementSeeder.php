<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Database\Factories\AdvertisementFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advertisement::factory(50)->create();
    }
}
