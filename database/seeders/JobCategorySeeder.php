<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'IT & Software', 'slug' => 'it-software', 'is_active' => true],
            ['name' => 'Marketing', 'slug' => 'marketing', 'is_active' => true],
            ['name' => 'Healthcare', 'slug' => 'healthcare', 'is_active' => true],
            ['name' => 'Finance', 'slug' => 'finance', 'is_active' => true],
            ['name' => 'Customer Service', 'slug' => 'customer-service', 'is_active' => true],
            ['name' => 'Human Resources', 'slug' => 'human-resources', 'is_active' => true],
            ['name' => 'Sales', 'slug' => 'sales', 'is_active' => true],
            ['name' => 'Engineering', 'slug' => 'engineering', 'is_active' => true],
            ['name' => 'Administration', 'slug' => 'administration', 'is_active' => true],
        ];

        foreach ($categories as $category) {
            JobCategory::create($category);
        }
    }
}
