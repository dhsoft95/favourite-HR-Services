<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'mail:test';
    protected $description = 'Test email configuration';

    public function handle()
    {
        try {
            Mail::raw('This is a test email from DHSoft mail server.', function ($message) {
                $message->to('davidhaule3@gmail.com')
                    ->subject('Test Email - DHSoft Mail Server');
            });

            $this->info('Email sent successfully!');
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}
