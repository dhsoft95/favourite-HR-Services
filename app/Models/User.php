<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'bio',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function savedJobs()
    {
        return $this->belongsToMany(Job::class, 'saved_jobs');
    }

    // Check if user is admin (for basic checks)
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Filament panel access
    public function canAccessPanel(Panel $panel): bool
    {
        // Only users with 'admin' role in users table can access Filament
        return $this->isAdmin() && $this->hasAnyRole(['super_admin', 'hr_manager', 'shortlister', 'reviewer']);
    }

    // Check if user has super admin role
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin');
    }

    // Check if user is HR Manager
    public function isHRManager(): bool
    {
        return $this->hasRole('hr_manager');
    }

    // Check if user is Shortlister
    public function isShortlister(): bool
    {
        return $this->hasRole('shortlister');
    }

    // Check if user is Reviewer
    public function isReviewer(): bool
    {
        return $this->hasRole('reviewer');
    }

    // Get user's primary role name for display
    public function getPrimaryRole(): string
    {
        if ($this->isSuperAdmin()) return 'Super Administrator';
        if ($this->isHRManager()) return 'HR Manager';
        if ($this->isShortlister()) return 'Shortlister';
        if ($this->isReviewer()) return 'Reviewer';
        return $this->role === 'admin' ? 'Administrator' : 'Job Seeker';
    }

    // Check if user can perform specific actions
    public function canManageJobs(): bool
    {
        return $this->hasAnyRole(['super_admin', 'hr_manager']);
    }

    public function canShortlistApplications(): bool
    {
        return $this->hasAnyRole(['super_admin', 'hr_manager', 'shortlister']);
    }

    public function canScheduleInterviews(): bool
    {
        return $this->hasAnyRole(['super_admin', 'hr_manager', 'reviewer']);
    }

    public function canSendRejectionEmails(): bool
    {
        return $this->hasAnyRole(['super_admin', 'hr_manager', 'reviewer']);
    }

    public function canApproveApplications(): bool
    {
        return $this->hasAnyRole(['super_admin', 'hr_manager']);
    }

    public function canManageUsers(): bool
    {
        return $this->hasAnyRole(['super_admin', 'hr_manager']);
    }

    public function canViewReports(): bool
    {
        return $this->hasAnyRole(['super_admin', 'hr_manager']);
    }
}
