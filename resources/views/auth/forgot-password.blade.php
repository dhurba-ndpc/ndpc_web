<x-guest-layout>
    <p class="auth-copy">
        {{ __('Enter the email linked to your account. We will send a secure password reset link.') }}
    </p>

    <x-auth-session-status class="auth-status" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="auth-form" style="margin-top: 22px;">
        @csrf

        <div class="auth-field">
            <i class="fas fa-envelope auth-field-icon"></i>
            <label class="auth-label" for="email">{{ __('Email address') }}</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}"
                required autofocus>
            @error('email')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="auth-button">
            <span>{{ __('Send reset link') }}</span>
            <i class="fas fa-paper-plane"></i>
        </button>

        <p class="auth-meta">
            <a class="auth-link" href="{{ route('login') }}">{{ __('Back to login') }}</a>
        </p>
    </form>
</x-guest-layout>
