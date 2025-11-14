<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'david@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '+255712345678',
            'bio' => 'System Administrator',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create HR Admin
        User::create([
            'name' => 'HR Manager',
            'email' => 'hr@example.com',
            'password' => Hash::make('password'),
            'phone' => '+255723456789',
            'bio' => 'Human Resources Manager',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create Regular Users (Job Seekers)
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '+255734567890',
                'bio' => 'Experienced software developer with 5+ years in Laravel and React. Passionate about building scalable applications.',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '+255745678901',
                'bio' => 'Digital marketing specialist with expertise in SEO, social media management, and content creation.',
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael@example.com',
                'phone' => '+255756789012',
                'bio' => 'Finance professional with CPA certification. Experienced in financial analysis and reporting.',
            ],
            [
                'name' => 'Sarah Williams',
                'email' => 'sarah@example.com',
                'phone' => '+255767890123',
                'bio' => 'Registered nurse with 3 years experience in patient care and medical documentation.',
            ],
            [
                'name' => 'David Brown',
                'email' => 'david@example.com',
                'phone' => '+255778901234',
                'bio' => 'Mechanical engineer specializing in HVAC systems and building infrastructure.',
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily@example.com',
                'phone' => '+255789012345',
                'bio' => 'Recent graduate with a degree in Business Administration. Eager to start my career in HR.',
            ],
            [
                'name' => 'James Wilson',
                'email' => 'james@example.com',
                'phone' => '+255790123456',
                'bio' => 'Sales professional with proven track record in B2B sales and client relationship management.',
            ],
            [
                'name' => 'Lisa Anderson',
                'email' => 'lisa@example.com',
                'phone' => '+255701234567',
                'bio' => 'Graphic designer with expertise in Adobe Creative Suite and brand identity development.',
            ],
            [
                'name' => 'Robert Taylor',
                'email' => 'robert@example.com',
                'phone' => '+255712345679',
                'bio' => 'Customer service specialist with excellent communication skills and problem-solving abilities.',
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'maria@example.com',
                'phone' => '+255723456780',
                'bio' => 'Administrative assistant with strong organizational skills and proficiency in Microsoft Office.',
            ],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password'),
                'phone' => $userData['phone'],
                'bio' => $userData['bio'],
                'role' => 'user',
                'email_verified_at' => now(),
            ]);
        }
    }
}
