<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 relative">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/slider/slider01.webp') }}"
             alt="Background"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-[#2A2D5A]/70 to-black/60"></div>
    </div>

    <div class="w-full max-w-lg px-4 relative z-10">
        <!-- Login Card -->
        <div class="bg-white/95 backdrop-blur-sm rounded-lg shadow-2xl overflow-hidden">
            <div class="px-12 py-16">
                <!-- Header -->
                <div class="text-center mb-10">
                    <div class="mx-auto h-16 w-16 flex items-center justify-center bg-[#2A2D5A] rounded-xl mb-4">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Welcome back</h2>
                    <p class="mt-2 text-sm text-gray-600">Sign in to your account to continue</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Form -->
                <form wire:submit="login" class="space-y-6">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input
                            wire:model="form.email"
                            id="email"
                            type="email"
                            name="email"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#2A2D5A] focus:ring-1 focus:ring-[#2A2D5A] text-base" />
                        <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input
                            wire:model="form.password"
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#2A2D5A] focus:ring-1 focus:ring-[#2A2D5A] text-base" />
                        <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between text-sm pt-2">
                        <label class="flex items-center">
                            <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-[#2A2D5A] focus:ring-[#2A2D5A]" name="remember">
                            <span class="ml-2 text-gray-700">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" wire:navigate class="text-[#2A2D5A] hover:text-[#1f2347] font-medium">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="w-full bg-[#2A2D5A] hover:bg-[#1f2347] text-white font-medium py-3 px-4 rounded-lg transition-colors text-base">
                        Sign in
                    </button>
                </form>

                <!-- Sign up link -->
                <p class="mt-8 text-center text-sm text-gray-600">
                    Don't have an account? <a href="{{ route('register') }}" wire:navigate class="text-[#2A2D5A] hover:text-[#1f2347] font-medium">Sign up</a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="mt-6 text-center text-xs text-white/70">
            Protected by industry-standard encryption
        </p>
    </div>
</div>
