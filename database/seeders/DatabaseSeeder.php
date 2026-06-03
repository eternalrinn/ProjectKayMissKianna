<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@laravelpro.test'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('admin12345'),
                'is_admin' => true,
                'address' => 'Carmona, Cavite',
                'gender' => 'Female',
            ]
        );

        User::updateOrCreate(
            ['email' => 'student@laravelpro.test'],
            [
                'name' => 'Student User',
                'password' => Hash::make('student12345'),
                'is_admin' => false,
                'address' => 'Carmona, Cavite',
                'gender' => 'Male',
            ]
        );
    }
}
