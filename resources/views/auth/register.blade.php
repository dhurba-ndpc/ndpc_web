<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <i class="fas fa-user auth-field-icon"></i>
            <label class="auth-label" for="name">{{ __('Full name') }}</label>
            <input id="name" class="auth-input" type="text" name="name" value="{{ old('name') }}"
                required autofocus autocomplete="name">
            @error('name')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-field">
            <i class="fas fa-envelope auth-field-icon"></i>
            <label class="auth-label" for="email">{{ __('Email address') }}</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}"
                required autocomplete="username">
            @error('email')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-field">
            <i class="fas fa-lock auth-field-icon"></i>
            <label class="auth-label" for="password">{{ __('Password') }}</label>
            <input id="password" class="auth-input" type="password" name="password"
                required autocomplete="new-password">
            @error('password')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-field">
            <i class="fas fa-shield-alt auth-field-icon"></i>
            <label class="auth-label" for="password_confirmation">{{ __('Confirm password') }}</label>
            <input id="password_confirmation" class="auth-input" type="password" name="password_confirmation"
                required autocomplete="new-password">
            @error('password_confirmation')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="auth-button">
            <span>{{ __('Create account') }}</span>
            <i class="fas fa-arrow-right"></i>
        </button>

        <p class="auth-meta">
            {{ __('Already registered?') }}
            <a class="auth-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
        </p>
    </form>
</x-guest-layout>
