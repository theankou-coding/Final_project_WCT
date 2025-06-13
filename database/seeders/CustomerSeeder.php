<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::updateOrCreate(
            ['email' => 'john@example.com'],
            [
                'name' => 'John Doe',
                'phone' => '012345678',
                'address' => 'Phnom Penh, Cambodia',
            ]
        );

        Customer::updateOrCreate(
            ['email' => 'jane@example.com'],
            [
                'name' => 'Jane Smith',
                'phone' => '098765432',
                'address' => 'Siem Reap, Cambodia',
            ]
        );
    }
}
