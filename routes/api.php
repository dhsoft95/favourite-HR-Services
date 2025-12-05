<?php

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/job-suggestions', function (Request $request) {
    $query = $request->get('q');

    if (empty($query)) {
        return response()->json([]);
    }

    $jobs = Job::where('status', 'published')
        ->where('is_active', true)
        ->where('deadline', '>=', now())
        ->where(function($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->orWhere('company_name', 'like', "%{$query}%");
        })
        ->select('id', 'title', 'company_name', 'location', 'job_type')
        ->limit(10)
        ->get();

    return response()->json($jobs);
})->name('api.job-suggestions');
