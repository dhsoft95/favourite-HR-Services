<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

// Main pages with named routes
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/solutions', [PagesController::class, 'solutions'])->name('solutions');
Route::get('/jobs', [PagesController::class, 'jobs'])->name('jobs');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

// Contact form submission
Route::post('/contact', [PagesController::class, 'contactSubmit'])->name('contact.submit');

// Auth routes
Route::get('/login', [PagesController::class, 'login'])->name('login');

// Search route
Route::get('/search', [PagesController::class, 'search'])->name('search');
