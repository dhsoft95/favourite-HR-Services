<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 relative">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920&q=80"
             alt="Background"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-red-900/40 to-gray-900/60"></div>
    </div>

    <div class="w-full max-w-lg px-4 relative z-10">
        <!-- Forgot Password Card -->
        <div class="bg-white/95 backdrop-blur-sm rounded-lg shadow-2xl overflow-hidden">
            <div class="px-12 py-16">
                <!-- Header -->
                <div class="text-center mb-10">
                    <div class="mx-auto h-16 w-16 flex items-center justify-center bg-red-600 rounded-xl mb-4">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Forgot password?</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        No problem. Just let us know your email address and we will email you a password reset link.
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <!-- Form -->
                <form wire:submit="sendPasswordResetLink" class="space-y-6">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input
                            wire:model="email"
                            id="email"
                            type="email"
                            name="email"
                            required
                            autofocus
                            placeholder="you@example.com"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 text-base" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-lg transition-colors text-base">
                        Email Password Reset Link
                    </button>
                </form>

                <!-- Back to login link -->
                <p class="mt-8 text-center text-sm text-gray-600">
                    Remember your password? <a href="{{ route('login') }}" wire:navigate class="text-red-600 hover:text-red-700 font-medium">Sign in</a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="mt-6 text-center text-xs text-gray-500">
            Protected by industry-standard encryption
        </p>
    </div>
</div>
