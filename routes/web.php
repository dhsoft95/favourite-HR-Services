<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/', 'home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Job routes (Livewire)
Route::get('/jobs', [PagesController::class, 'jobs'])->name('jobs');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/solutions', [PagesController::class, 'solutions'])->name('solutions');
Route::get('/jobs/{id}', [PagesController::class, 'jobsDetails'])->name('jobs-details');



require __DIR__.'/auth.php';


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout')->middleware('auth');
