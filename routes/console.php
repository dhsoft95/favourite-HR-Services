<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule tasks
Schedule::command('jobs:notify-old-drafts')
    ->dailyAt('09:00')
    ->timezone('Africa/Dar_es_Salaam');

Schedule::command('jobs:notify-expiring')
    ->dailyAt('10:00')
    ->timezone('Africa/Dar_es_Salaam');

Schedule::command('jobs:close-expired')
    ->dailyAt('23:00')
    ->timezone('Africa/Dar_es_Salaam');
