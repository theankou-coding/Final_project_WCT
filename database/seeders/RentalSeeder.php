<?php

namespace Database\Seeders;  // << Add this line

use Illuminate\Database\Seeder;
use App\Models\Rental;

class RentalSeeder extends Seeder
{
    public function run(): void
    {
        Rental::create([
            'customer_id' => 1,
            'item_id' => 1,
            'rent_date' => now()->subDays(3),
            'return_date' => now(),
            'total_cost' => 30.00,
            'status' => 'returned',
        ]);

        Rental::create([
            'customer_id' => 2,
            'item_id' => 2,
            'rent_date' => now(),
            'return_date' => null,
            'total_cost' => 5.50,
            'status' => 'ongoing',
        ]);
    }
}
