<x-guest-layout>
    @if (session('status'))
        <div class="auth-status">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <i class="fas fa-envelope auth-field-icon"></i>
            <label class="auth-label" for="email">{{ __('Email address') }}</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}"
                required autofocus autocomplete="username">
            @error('email')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-field">
            <i class="fas fa-lock auth-field-icon"></i>
            <label class="auth-label" for="password">{{ __('Password') }}</label>
            <input id="password" class="auth-input" type="password" name="password"
                required autocomplete="current-password">
            @error('password')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-row">
            <label for="remember_me" class="auth-check">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>

            <a class="auth-link" href="{{ route('password.request') }}">
                {{ __('Forgot password?') }}
            </a>
        </div>

        <button type="submit" class="auth-button">
            <span>{{ __('Log in') }}</span>
            <i class="fas fa-arrow-right"></i>
        </button>

        {{-- <p class="auth-meta">
            {{ __('New to the platform?') }}
            <a class="auth-link" href="{{ route('register') }}">{{ __('Create an account') }}</a>
        </p> --}}
    </form>
</x-guest-layout>
