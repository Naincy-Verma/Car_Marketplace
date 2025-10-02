<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // unique check by email
            [
                'name' => ' Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin@123'), // secure password
                'role' => 'admin',
                'status' => 'approved',
            ]
        );

        $this->command->info('✅ Admin user created: admin@example.com / Admin@12345');
    }
}
