<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="auth-form">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="auth-field">
            <i class="fas fa-envelope auth-field-icon"></i>
            <label class="auth-label" for="email">{{ __('Email address') }}</label>
            <input id="email" class="auth-input" type="email" name="email"
                value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            @error('email')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-field">
            <i class="fas fa-lock auth-field-icon"></i>
            <label class="auth-label" for="password">{{ __('New password') }}</label>
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
            <span>{{ __('Reset password') }}</span>
            <i class="fas fa-check"></i>
        </button>
    </form>
</x-guest-layout>
