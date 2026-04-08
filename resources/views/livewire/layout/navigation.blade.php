<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->to('/login');
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center">
                        <img src="/images/logo/logo.png" alt="Favourite Web Services" class="h-10 w-auto">
                    </a>
                </div>

                <!-- Desktop Nav Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="relative group">
                        {{ __('Dashboard') }}
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-[#2A2D5A] to-[#1f2347] group-hover:w-full transition-all duration-300"></span>
                    </x-nav-link>
                    <x-nav-link :href="route('jobs')" :active="request()->routeIs('jobs*')" class="relative group">
                        {{ __('Browse Jobs') }}
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-[#2A2D5A] to-[#1f2347] group-hover:w-full transition-all duration-300"></span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#2A2D5A] focus:ring-opacity-20 transition ease-in-out duration-150">
                            <div class="flex items-center space-x-2">
                                <div class="h-8 w-8 rounded-full bg-gradient-to-br from-[#2A2D5A] to-[#1f2347] flex items-center justify-center text-white font-semibold text-xs">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate class="hover:bg-blue-50 hover:text-[#2A2D5A] transition-colors">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link class="hover:bg-blue-50 hover:text-[#2A2D5A] transition-colors">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-gray-500 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 focus:text-[#2A2D5A] transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="hover:bg-blue-50 hover:border-[#2A2D5A]">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('jobs')" :active="request()->routeIs('jobs*')" class="hover:bg-blue-50 hover:border-[#2A2D5A]">
                {{ __('Browse Jobs') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive User Info -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[#2A2D5A] to-[#1f2347] flex items-center justify-center text-white font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate class="hover:bg-blue-50 hover:border-[#2A2D5A]">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link class="hover:bg-blue-50 hover:border-[#2A2D5A]">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
