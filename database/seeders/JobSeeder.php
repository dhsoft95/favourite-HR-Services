<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            // Published Jobs
            [
                'title' => 'Senior Laravel Developer',
                'company_name' => 'Tech Solutions Ltd',
                'image' => 'https://images.unsplash.com/photo-1560472355-536de3962603?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>We are seeking an experienced Laravel Developer to join our dynamic team. The ideal candidate will have strong expertise in PHP, Laravel framework, and modern web development practices.</p><p>You will be responsible for developing and maintaining web applications, working with cross-functional teams, and ensuring high-quality code delivery.</p>',
                'requirements' => '• 5+ years of experience with PHP and Laravel
- Strong understanding of MVC architecture
- Experience with MySQL, PostgreSQL, or similar databases
- Knowledge of front-end technologies (Vue.js, React, or similar)
- Familiarity with Git version control
- Experience with RESTful API development
- Strong problem-solving skills
- Excellent communication abilities',
                'benefits' => '• Competitive salary package
- Health insurance coverage
- Professional development opportunities
- Flexible working hours
- Remote work options
- Annual performance bonuses
- Team building activities
- Modern office environment',
                'job_type' => 'Full Time',
                'category' => 'IT & Software',
                'location' => 'Dar es Salaam, Tanzania',
                'experience_level' => 'Senior Level',
                'deadline' => Carbon::now()->addDays(30),
                'is_featured' => true,
                'is_active' => true,
                'status' => 'published',
            ],
            [
                'title' => 'Digital Marketing Manager',
                'company_name' => 'Creative Agency Co',
                'image' => 'https://images.unsplash.com/photo-1553484771-371a605b060b?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>Join our innovative marketing team as a Digital Marketing Manager. You will lead our digital marketing initiatives, develop strategies, and drive online engagement for our diverse client portfolio.</p>',
                'requirements' => '• Bachelor\'s degree in Marketing or related field
- 3+ years of digital marketing experience
- Proven track record in SEO/SEM campaigns
- Experience with Google Analytics and advertising platforms
- Strong content creation and copywriting skills
- Social media management expertise
- Data analysis and reporting capabilities',
                'benefits' => '• Competitive salary
- Health insurance
- Performance bonuses
- Creative work environment
- Learning and development budget
- Flexible schedule',
                'job_type' => 'Full Time',
                'category' => 'Marketing',
                'location' => 'Dar es Salaam, Tanzania',
                'experience_level' => 'Mid Level',
                'deadline' => Carbon::now()->addDays(25),
                'is_featured' => true,
                'is_active' => true,
                'status' => 'published',
            ],
            [
                'title' => 'Registered Nurse',
                'company_name' => 'City Medical Center',
                'image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>We are looking for a compassionate and skilled Registered Nurse to provide high-quality patient care in our medical facility. The ideal candidate will work collaboratively with our healthcare team.</p>',
                'requirements' => '• Valid nursing license
- Bachelor\'s degree in Nursing
- 2+ years of clinical experience
- Strong patient care skills
- Knowledge of medical procedures and protocols
- Excellent communication skills
- Ability to work in fast-paced environment',
                'benefits' => '• Competitive salary
- Comprehensive health coverage
- Continuing education support
- Paid time off
- Retirement plan
- Shift differentials',
                'job_type' => 'Full Time',
                'category' => 'Healthcare',
                'location' => 'Dar es Salaam, Tanzania',
                'experience_level' => 'Mid Level',
                'deadline' => Carbon::now()->addDays(20),
                'is_featured' => false,
                'is_active' => true,
                'status' => 'published',
            ],
            [
                'title' => 'Financial Analyst',
                'company_name' => 'Global Finance Group',
                'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>Seeking a detail-oriented Financial Analyst to join our finance team. You will be responsible for financial planning, analysis, and reporting to support strategic business decisions.</p>',
                'requirements' => '• Bachelor\'s degree in Finance, Accounting, or Economics
- 3+ years of financial analysis experience
- Strong Excel and financial modeling skills
- Knowledge of accounting principles
- CPA or CFA certification preferred
- Excellent analytical abilities
- Strong attention to detail',
                'benefits' => '• Competitive salary package
- Health and dental insurance
- Professional certification support
- Performance bonuses
- Career advancement opportunities
- Modern office facilities',
                'job_type' => 'Full Time',
                'category' => 'Finance',
                'location' => 'Dar es Salaam, Tanzania',
                'experience_level' => 'Mid Level',
                'deadline' => Carbon::now()->addDays(28),
                'is_featured' => false,
                'is_active' => true,
                'status' => 'published',
            ],
            [
                'title' => 'Remote Customer Support Specialist',
                'company_name' => 'E-Commerce Solutions',
                'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>Work from anywhere as a Customer Support Specialist. Provide exceptional customer service, resolve inquiries, and ensure customer satisfaction for our growing e-commerce platform.</p>',
                'requirements' => '• 1-2 years customer service experience
- Excellent written and verbal communication
- Strong problem-solving skills
- Proficiency with help desk software
- Ability to work independently
- Reliable internet connection
- Flexible availability',
                'benefits' => '• Work from home
- Flexible schedule
- Competitive hourly rate
- Performance incentives
- Professional development
- Equipment provided',
                'job_type' => 'Remote',
                'category' => 'Customer Service',
                'location' => 'Remote - Tanzania',
                'experience_level' => 'Entry Level',
                'deadline' => Carbon::now()->addDays(35),
                'is_featured' => true,
                'is_active' => true,
                'status' => 'published',
            ],
            [
                'title' => 'HR Administrator',
                'company_name' => 'Corporate Services Ltd',
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>Join our HR team as an Administrator. You will support various HR functions including recruitment, onboarding, employee relations, and HR documentation.</p>',
                'requirements' => '• Bachelor\'s degree in Human Resources or related field
- 1-3 years HR experience
- Knowledge of HR policies and procedures
- Strong organizational skills
- Proficiency in MS Office
- Excellent interpersonal skills
- Attention to detail',
                'benefits' => '• Competitive salary
- Health insurance
- Professional development
- Paid leave
- Friendly work environment
- Career growth opportunities',
                'job_type' => 'Full Time',
                'category' => 'Human Resources',
                'location' => 'Dar es Salaam, Tanzania',
                'experience_level' => 'Entry Level',
                'deadline' => Carbon::now()->addDays(22),
                'is_featured' => false,
                'is_active' => true,
                'status' => 'published',
            ],

            // Draft Jobs
            [
                'title' => 'Software Engineering Intern',
                'company_name' => 'Tech Innovations',
                'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>Internship opportunity for computer science students to gain hands-on experience in software development. Work with experienced developers on real projects.</p>',
                'requirements' => '• Currently pursuing Computer Science degree
- Basic knowledge of programming languages
- Passion for technology
- Willingness to learn
- Good communication skills',
                'benefits' => '• Stipend provided
- Learning opportunities
- Mentorship program
- Certificate upon completion
- Potential full-time offer',
                'job_type' => 'Internship',
                'category' => 'IT & Software',
                'location' => 'Dar es Salaam, Tanzania',
                'experience_level' => 'Entry Level',
                'deadline' => Carbon::now()->addDays(40),
                'is_featured' => false,
                'is_active' => true,
                'status' => 'draft',
            ],
            [
                'title' => 'Sales Executive',
                'company_name' => 'Premium Products Inc',
                'image' => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>Seeking motivated Sales Executives to join our growing team. You will be responsible for generating leads, closing deals, and building client relationships.</p>',
                'requirements' => '• 2+ years sales experience
- Proven sales track record
- Excellent negotiation skills
- Strong communication abilities
- Self-motivated and target-driven
- Valid driver\'s license',
                'benefits' => '• Base salary plus commission
- Health insurance
- Company vehicle
- Performance bonuses
- Career advancement
- Sales training',
                'job_type' => 'Full Time',
                'category' => 'Sales',
                'location' => 'Dar es Salaam, Tanzania',
                'experience_level' => 'Mid Level',
                'deadline' => Carbon::now()->addDays(45),
                'is_featured' => false,
                'is_active' => true,
                'status' => 'draft',
            ],

            // Closed Job
            [
                'title' => 'Project Manager',
                'company_name' => 'Construction Masters',
                'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>Experienced Project Manager needed for construction projects. This position has been filled.</p>',
                'requirements' => '• 5+ years project management experience
- PMP certification preferred
- Construction industry experience
- Strong leadership skills',
                'benefits' => '• Competitive package
- Health benefits
- Vehicle allowance',
                'job_type' => 'Full Time',
                'category' => 'Engineering',
                'location' => 'Dar es Salaam, Tanzania',
                'experience_level' => 'Senior Level',
                'deadline' => Carbon::now()->subDays(5),
                'is_featured' => false,
                'is_active' => false,
                'status' => 'closed',
            ],
            [
                'title' => 'Administrative Assistant',
                'company_name' => 'Business Solutions Group',
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop&crop=face',
                'description' => '<p>Part-time Administrative Assistant to support office operations and administrative tasks.</p>',
                'requirements' => '• High school diploma or equivalent
- 1+ year office experience
- Proficiency in MS Office
- Strong organizational skills
- Good communication abilities',
                'benefits' => '• Flexible hours
- Competitive hourly rate
- Friendly environment',
                'job_type' => 'Part Time',
                'category' => 'Administration',
                'location' => 'Dar es Salaam, Tanzania',
                'experience_level' => 'Entry Level',
                'deadline' => Carbon::now()->addDays(15),
                'is_featured' => false,
                'is_active' => true,
                'status' => 'published',
            ],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
