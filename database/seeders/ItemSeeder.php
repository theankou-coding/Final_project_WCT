<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::create([
            'name' => 'Projector',
            'description' => 'HD projector for presentations',
            'category' => 'Electronics',
            'price_per_day' => 15.00,
            'status' => 'available',
        ]);

        Item::create([
            'name' => 'Camera',
            'description' => 'DSLR camera with 18-55mm lens',
            'category' => 'Photography',
            'price_per_day' => 20.00,
            'status' => 'available',
        ]);
    }
}
