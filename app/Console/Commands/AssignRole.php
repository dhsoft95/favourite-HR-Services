<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AssignRole extends Command
{
    protected $signature = 'user:assign-role {email} {role}';
    protected $description = 'Assign a role to a user';

    public function handle()
    {
        $email = $this->argument('email');
        $role = $this->argument('role');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found!");
            return 1;
        }

        $user->assignRole($role);

        $this->info("✓ {$user->name} has been assigned the '{$role}' role!");
        return 0;
    }
}
