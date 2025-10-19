<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('home', [
            'title' => 'Home - Favourite Web Services',
            'activePage' => 'home'
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'title' => 'About Us - Favourite Web Services',
            'activePage' => 'about'
        ]);
    }

    public function solutions()
    {
        return view('pages.solutions', [
            'title' => 'Our Solutions - Favourite Web Services',
            'activePage' => 'solutions'
        ]);
    }

    public function jobs()
    {
        return view('pages.job-list', [
            'title' => 'Jobs - Favourite Web Services',
            'activePage' => 'jobs'
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'title' => 'Contact Us - Favourite Web Services',
            'activePage' => 'contact'
        ]);
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required|min:10'
        ]);

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    public function login()
    {
        return view('auth.login', [
            'title' => 'Login - Favourite Web Services',
            'activePage' => 'login'
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        return view('pages.search', [
            'title' => 'Search Results - Favourite Web Services',
            'query' => $query,
            'results' => []
        ]);
    }
}
