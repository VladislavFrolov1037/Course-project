<?php

namespace Database\Seeders;

use App\Models\FeedbackRequest;
use Illuminate\Database\Seeder;

class FeedbackRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeedbackRequest::factory(100)->create();
    }
}
