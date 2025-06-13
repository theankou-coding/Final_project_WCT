<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insert([
            ['username' => 'admin1', 'email' => 'admin1@example.com', 'role' => 'superadmin'],
            ['username' => 'admin2', 'email' => 'admin2@example.com', 'role' => 'manager'],
        ]);
    }
}
