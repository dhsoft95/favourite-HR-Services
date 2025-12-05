<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_postings';

    protected $fillable = [
        'title',
        'company_name',
        'image',
        'description',
        'requirements',
        'benefits',
        'job_type',
        'category',
        'location',
        'experience_level',
        'deadline',
        'is_featured',
        'is_active',
        'status'
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
