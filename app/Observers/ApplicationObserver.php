<?php

namespace App\Observers;

use App\Models\Application;
use App\Notifications\ApplicationSubmittedNotification;
use App\Notifications\ApplicationStatusChangedNotification;

class ApplicationObserver
{
    public function created(Application $application): void
    {
        // Send notification when application is first created
        $application->user->notify(new ApplicationSubmittedNotification($application));
    }

    public function updating(Application $application): void
    {
        // Check if status is changing
        if ($application->isDirty('status')) {
            $oldStatus = $application->getOriginal('status');
            $newStatus = $application->status;

            // Send notification about status change
            $application->user->notify(
                new ApplicationStatusChangedNotification($application, $oldStatus, $newStatus)
            );
        }
    }
}
