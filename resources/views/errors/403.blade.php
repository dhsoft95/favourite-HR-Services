@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')
@endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full text-center">
            <div class="mb-8">
                <svg class="mx-auto h-24 w-24 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Access Denied</h1>
            <p class="text-lg text-gray-600 mb-8">
                You don't have permission to access this area. Admin privileges are required.
            </p>
            <div class="space-y-3">
                <a href="{{ route('dashboard') }}" class="inline-block w-full bg-[#2A2D5A] text-white font-semibold py-3 px-6 rounded-lg hover:bg-[#1f2347] transition-colors">
                    Go to Dashboard
                </a>
                <a href="{{ route('jobs') }}" class="inline-block w-full bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg hover:bg-gray-300 transition-colors">
                    Browse Jobs
                </a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('patrials.footer')
@endsection
