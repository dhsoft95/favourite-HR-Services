<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'mail:test {email?}';
    protected $description = 'Test email configuration';

    public function handle()
    {
        $email = $this->argument('email') ?? 'davidhaule3@gmail.com';

        try {
            Mail::raw('This is a test email from Resend API.', function ($message) use ($email) {
                $message->to($email)
                    ->subject('Test Email - Resend');
            });

            $this->info('Email sent successfully to ' . $email);
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}
