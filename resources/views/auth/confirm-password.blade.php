<x-guest-layout>
    <p class="auth-copy">
        {{ __('This is a secure area. Confirm your password before continuing.') }}
    </p>

    <form method="POST" action="{{ route('password.confirm') }}" class="auth-form" style="margin-top: 22px;">
        @csrf

        <div class="auth-field">
            <i class="fas fa-lock auth-field-icon"></i>
            <label class="auth-label" for="password">{{ __('Password') }}</label>
            <input id="password" class="auth-input" type="password" name="password"
                required autocomplete="current-password">
            @error('password')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="auth-button">
            <span>{{ __('Confirm access') }}</span>
            <i class="fas fa-unlock-alt"></i>
        </button>
    </form>
</x-guest-layout>
