<?php

use Database\Seeders\CustomerSeeder;
use Illuminate\Database\Seeder;
use Pest\ArchPresets\Custom;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CustomerSeeder::class,
            // AdminSeeder::class,
            // ItemSeeder::class,
            // RentalSeeder::class,
            // ReviewSeeder::class,
        ]);
    }
}
