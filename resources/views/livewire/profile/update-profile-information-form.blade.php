<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $bio = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone ?? '';
        $this->bio = Auth::user()->bio ?? '';
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'bio' => ['nullable', 'string', 'max:500'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-semibold text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Full Name') }}</label>
            <input
                wire:model="name"
                id="name"
                name="name"
                type="text"
                required
                autofocus
                autocomplete="name"
                class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
            <input
                wire:model="email"
                id="email"
                name="email"
                type="email"
                required
                autocomplete="username"
                class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-red-600 hover:text-red-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Phone -->
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Phone Number (Optional)') }}</label>
            <input
                wire:model="phone"
                id="phone"
                name="phone"
                type="tel"
                placeholder="+255 712 345 678"
                autocomplete="tel"
                class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <!-- Bio -->
        <div>
            <label for="bio" class="block text-sm font-medium text-gray-700">{{ __('Bio (Optional)') }}</label>
            <textarea
                wire:model="bio"
                id="bio"
                name="bio"
                rows="4"
                placeholder="Tell us about yourself..."
                class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 resize-none"
            ></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
            <p class="mt-1 text-xs text-gray-500">This will help employers know more about you</p>
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2.5 px-6 rounded-lg transition-colors">
                {{ __('Save Changes') }}
            </button>

            <x-action-message class="text-sm text-gray-600" on="profile-updated">
                {{ __('Saved successfully!') }}
            </x-action-message>
        </div>
    </form>
</section>
