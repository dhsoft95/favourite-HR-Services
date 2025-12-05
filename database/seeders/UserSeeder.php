<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin User
        $superAdmin = User::create([
            'name' => 'David Haule',
            'email' => 'david.haule@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '+255712345678',
            'bio' => 'System Administrator - Full Access',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole('super_admin');

        // Create Another Super Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'david@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '+255712345679',
            'bio' => 'System Administrator',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('super_admin');

        // Create HR Manager - Emily Bavu
        $hrManager = User::create([
            'name' => 'Emily Bavu',
            'email' => 'emily.bavu@favoritegroup.co.tz',
            'password' => Hash::make('password'),
            'phone' => '+255723456789',
            'bio' => 'HR Manager - All recruitment stages',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        $hrManager->assignRole('hr_manager');

        // Create Shortlister - Anna Meela
        $shortlister = User::create([
            'name' => 'Anna Meela',
            'email' => 'anna.meela@favoritegroup.co.tz',
            'password' => Hash::make('password'),
            'phone' => '+255734567891',
            'bio' => 'Talent Acquisition - Shortlisting stage only',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        $shortlister->assignRole('shortlister');

        // Create Reviewer - James Kasele
        $reviewer1 = User::create([
            'name' => 'James Kasele',
            'email' => 'james.kasele@favoritegroup.co.tz',
            'password' => Hash::make('password'),
            'phone' => '+255745678902',
            'bio' => 'Recruitment Coordinator - Initial CV review, interview scheduling & rejection emails',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        $reviewer1->assignRole('reviewer');

        // Create Reviewer - Martha Bavu
        $reviewer2 = User::create([
            'name' => 'Martha Bavu',
            'email' => 'martha.bavu@favoritegroup.co.tz',
            'password' => Hash::make('password'),
            'phone' => '+255756789013',
            'bio' => 'Recruitment Coordinator - Initial CV review, interview scheduling & rejection emails',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        $reviewer2->assignRole('reviewer');

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
                'email' => 'davidbrown@example.com',
                'phone' => '+255778901234',
                'bio' => 'Mechanical engineer specializing in HVAC systems and building infrastructure.',
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emilydavis@example.com',
                'phone' => '+255789012345',
                'bio' => 'Recent graduate with a degree in Business Administration. Eager to start my career in HR.',
            ],
            [
                'name' => 'James Wilson',
                'email' => 'jameswilson@example.com',
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
                'phone' => '+255712345680',
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

        $this->command->info('Users seeded successfully with roles assigned.');
    }
}
