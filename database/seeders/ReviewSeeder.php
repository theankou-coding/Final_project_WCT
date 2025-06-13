<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::create([
            'customer_id' => 1,
            'item_id' => 1,
            'rating' => 5,
            'comment' => 'Excellent camera!',
            'review_date' => now()->subDays(1),
        ]);

        Review::create([
            'customer_id' => 2,
            'item_id' => 2,
            'rating' => 4,
            'comment' => 'Tent was easy to set up.',
            'review_date' => now(),
        ]);
    }
}
