<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            DistrictSeeder::class,
            StatusSeeder::class,
            AdvertisementSeeder::class,
            ReviewSeeder::class,
            ImageSeeder::class,
            ConsultationSeeder::class,
            FeedbackRequestSeeder::class,
        ]);
    }
}
