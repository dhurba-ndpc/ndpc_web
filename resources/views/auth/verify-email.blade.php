<x-guest-layout>
    <p class="auth-copy">
        {{ __('Before getting started, verify your email address using the secure link we sent to your inbox.') }}
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="auth-status" style="margin-top: 18px;">
            {{ __('A new verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="auth-form" style="margin-top: 22px;">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="auth-button">
                <span>{{ __('Resend verification email') }}</span>
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="auth-button auth-button-secondary">
                <i class="fas fa-sign-out-alt"></i>
                <span>{{ __('Log out') }}</span>
            </button>
        </form>
    </div>
</x-guest-layout>
