<?php

return [
    'database' => [
        'local_path' => storage_path('app/backups/database'),
        's3_path'    => 'simba-courier/backups/database',
        'keep_days'  => 7,
    ],
    'reports' => [
        'local_path' => storage_path('app/reports'),
        'keep_days'  => 2,
    ],
];
