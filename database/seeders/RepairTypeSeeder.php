<?php

namespace Database\Seeders;

use App\Models\RepairType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepairTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RepairType::insert([
            ['name' => 'Без ремонта'],
            ['name' => 'Евроремонт'],
            ['name' => 'Дизайнерский ремонт'],
            ['name' => 'Косметический ремонт'],
        ]);
    }
}
