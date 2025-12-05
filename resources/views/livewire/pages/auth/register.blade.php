<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $bio = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['nullable', 'string', 'max:20'],
            'bio' => ['nullable', 'string', 'max:500'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'user'; // Set default role

        $user = User::create($validated);

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('jobs', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8 relative">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920&q=80"
             alt="Background"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-red-900/40 to-gray-900/60"></div>
    </div>

    <div class="w-full max-w-4xl px-4 relative z-10">
        <!-- Register Card -->
        <div class="bg-white/95 backdrop-blur-sm rounded-lg shadow-2xl overflow-hidden">
            <div class="px-12 py-16">
                <!-- Header -->
                <div class="text-center mb-10">
                    <div class="mx-auto h-16 w-16 flex items-center justify-center bg-red-600 rounded-xl mb-4">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Create account</h2>
                    <p class="mt-2 text-sm text-gray-600">Sign up to get started</p>
                </div>

                <!-- Form -->
                <form wire:submit="register">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input
                                wire:model="name"
                                id="name"
                                type="text"
                                name="name"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="John Doe"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 text-base" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input
                                wire:model="email"
                                id="email"
                                type="email"
                                name="email"
                                required
                                autocomplete="username"
                                placeholder="you@example.com"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 text-base" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number (Optional)</label>
                            <input
                                wire:model="phone"
                                id="phone"
                                type="tel"
                                name="phone"
                                autocomplete="tel"
                                placeholder="+255 712 345 678"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 text-base" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input
                                wire:model="password"
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 text-base" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="md:col-span-2">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                            <input
                                wire:model="password_confirmation"
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 text-base" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Bio -->
                        <div class="md:col-span-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio (Optional)</label>
                            <textarea
                                wire:model="bio"
                                id="bio"
                                name="bio"
                                rows="3"
                                placeholder="Tell us a bit about yourself..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 text-base resize-none"></textarea>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                            <p class="mt-1 text-xs text-gray-500">This will help employers know more about you</p>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="w-full mt-8 bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-lg transition-colors text-base">
                        Register
                    </button>
                </form>

                <!-- Sign in link -->
                <p class="mt-8 text-center text-sm text-gray-600">
                    Already registered? <a href="{{ route('login') }}" wire:navigate class="text-red-600 hover:text-red-700 font-medium">Sign in</a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="mt-6 text-center text-xs text-gray-500">
            Protected by industry-standard encryption
        </p>
    </div>
</div>
