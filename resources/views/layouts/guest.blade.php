@php
    $authTitle = 'Welcome Back';
    $authSubtitle = 'Sign in to manage the NDPC digital service dashboard.';

    if (request()->routeIs('register')) {
        $authTitle = 'Create Account';
        $authSubtitle = 'Join the secure NDPC administration workspace.';
    } elseif (request()->routeIs('password.request')) {
        $authTitle = 'Reset Access';
        $authSubtitle = 'Enter your email and we will send a secure reset link.';
    } elseif (request()->routeIs('password.reset')) {
        $authTitle = 'Set New Password';
        $authSubtitle = 'Create a strong password for your account.';
    } elseif (request()->routeIs('password.confirm')) {
        $authTitle = 'Confirm Password';
        $authSubtitle = 'Re-enter your password to continue securely.';
    } elseif (request()->routeIs('verification.notice')) {
        $authTitle = 'Verify Email';
        $authSubtitle = 'Confirm your email address to activate full access.';
    }
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --auth-primary: #2454d6;
                --auth-cyan: #1bc8f2;
                --auth-purple: #7c3aed;
                --auth-ink: #12233f;
                --auth-muted: #66758f;
                --auth-border: rgba(121, 148, 190, .26);
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: 'Figtree', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                color: var(--auth-ink);
            }

            .auth-page {
                align-items: center;
                background:
                    radial-gradient(circle at 14% 14%, rgba(27, 200, 242, .22), transparent 30%),
                    radial-gradient(circle at 86% 16%, rgba(124, 58, 237, .22), transparent 26%),
                    linear-gradient(135deg, #f7fbff 0%, #eaf4ff 48%, #f6f0ff 100%);
                display: flex;
                justify-content: center;
                min-height: 100vh;
                overflow: hidden;
                padding: 32px;
                position: relative;
            }

            .auth-page::before,
            .auth-page::after {
                border-radius: 999px;
                content: "";
                filter: blur(8px);
                opacity: .72;
                position: absolute;
            }

            .auth-page::before {
                background: rgba(27, 200, 242, .18);
                height: 220px;
                left: -70px;
                top: 12%;
                width: 220px;
            }

            .auth-page::after {
                background: rgba(124, 58, 237, .16);
                bottom: -80px;
                height: 280px;
                right: -70px;
                width: 280px;
            }

            .auth-shell {
                background: rgba(255, 255, 255, .64);
                border: 1px solid rgba(255, 255, 255, .74);
                border-radius: 28px;
                box-shadow: 0 28px 80px rgba(25, 50, 95, .16);
                display: grid;
                grid-template-columns: minmax(340px, .88fr) minmax(380px, 1.12fr);
                max-width: 1120px;
                min-height: 660px;
                overflow: hidden;
                position: relative;
                width: 100%;
                z-index: 1;
            }

            .auth-panel {
                backdrop-filter: blur(22px);
                background: rgba(255, 255, 255, .72);
                padding: 48px;
            }

            .auth-brand {
                align-items: center;
                color: inherit;
                display: flex;
                gap: 14px;
                margin-bottom: 42px;
                text-decoration: none;
            }

            .auth-brand-logo {
                align-items: center;
                background: #fff;
                border: 1px solid rgba(36, 84, 214, .14);
                border-radius: 18px;
                box-shadow: 0 14px 28px rgba(36, 84, 214, .12);
                display: flex;
                height: 58px;
                justify-content: center;
                width: 58px;
            }

            .auth-brand-logo img {
                max-height: 42px;
                max-width: 42px;
            }

            .auth-brand-name {
                font-size: 1rem;
                font-weight: 700;
                letter-spacing: 0;
                margin: 0;
            }

            .auth-brand-caption {
                color: var(--auth-muted);
                font-size: .82rem;
                margin: 2px 0 0;
            }

            .auth-heading {
                margin-bottom: 30px;
            }

            .auth-heading h1 {
                color: var(--auth-ink);
                font-size: 2rem;
                font-weight: 700;
                letter-spacing: 0;
                line-height: 1.18;
                margin: 0 0 10px;
            }

            .auth-heading p,
            .auth-copy {
                color: var(--auth-muted);
                font-size: .96rem;
                line-height: 1.7;
                margin: 0;
            }

            .auth-form {
                display: grid;
                gap: 18px;
            }

            .auth-field {
                position: relative;
            }

            .auth-field-icon {
                color: #8090aa;
                left: 18px;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                transition: color .18s ease;
                z-index: 1;
            }

            .auth-input {
                background: rgba(255, 255, 255, .82);
                border: 1px solid var(--auth-border);
                border-radius: 16px;
                color: var(--auth-ink);
                font-size: .95rem;
                height: 58px;
                outline: 0;
                padding: 22px 18px 8px 48px;
                transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease, background .18s ease;
                width: 100%;
            }

            .auth-label {
                color: #6f7f98;
                font-size: .76rem;
                font-weight: 700;
                left: 48px;
                pointer-events: none;
                position: absolute;
                top: 9px;
                transition: color .18s ease;
            }

            .auth-input:focus {
                background: #fff;
                border-color: rgba(36, 84, 214, .56);
                box-shadow: 0 0 0 4px rgba(27, 200, 242, .14), 0 12px 28px rgba(36, 84, 214, .08);
                transform: translateY(-1px);
            }

            .auth-field:focus-within .auth-field-icon,
            .auth-field:focus-within .auth-label {
                color: var(--auth-primary);
            }

            .auth-error {
                color: #dc3545;
                display: block;
                font-size: .78rem;
                margin-top: 7px;
            }

            .auth-row {
                align-items: center;
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
                justify-content: space-between;
            }

            .auth-check {
                align-items: center;
                color: var(--auth-muted);
                display: inline-flex;
                font-size: .88rem;
                gap: 9px;
            }

            .auth-check input {
                accent-color: var(--auth-primary);
                height: 16px;
                width: 16px;
            }

            .auth-link {
                color: var(--auth-primary);
                font-size: .88rem;
                font-weight: 700;
                text-decoration: none;
                transition: color .18s ease;
            }

            .auth-link:hover {
                color: var(--auth-purple);
            }

            .auth-button {
                align-items: center;
                background: linear-gradient(135deg, var(--auth-primary), var(--auth-cyan));
                border: 0;
                border-radius: 16px;
                box-shadow: 0 16px 34px rgba(36, 84, 214, .28);
                color: #fff;
                cursor: pointer;
                display: inline-flex;
                font-size: .95rem;
                font-weight: 700;
                gap: 10px;
                height: 54px;
                justify-content: center;
                padding: 0 24px;
                text-decoration: none;
                transition: box-shadow .18s ease, transform .18s ease, filter .18s ease;
                width: 100%;
            }

            .auth-button:hover {
                box-shadow: 0 20px 38px rgba(36, 84, 214, .34);
                filter: saturate(1.08);
                transform: translateY(-2px);
            }

            .auth-button-secondary {
                background: rgba(255, 255, 255, .74);
                border: 1px solid var(--auth-border);
                box-shadow: none;
                color: var(--auth-primary);
                width: auto;
            }

            .auth-meta {
                color: var(--auth-muted);
                font-size: .9rem;
                margin-top: 22px;
                text-align: center;
            }

            .auth-status {
                background: rgba(27, 200, 242, .12);
                border: 1px solid rgba(27, 200, 242, .22);
                border-radius: 14px;
                color: #08758b;
                font-size: .88rem;
                margin-bottom: 18px;
                padding: 12px 14px;
            }

            .auth-visual {
                background:
                    radial-gradient(circle at 35% 24%, rgba(27, 200, 242, .38), transparent 28%),
                    radial-gradient(circle at 76% 70%, rgba(124, 58, 237, .34), transparent 30%),
                    linear-gradient(145deg, #15336f 0%, #11204a 54%, #261453 100%);
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                min-height: 100%;
                overflow: hidden;
                padding: 46px;
                position: relative;
            }

            .auth-visual::before,
            .auth-visual::after {
                border-radius: 999px;
                content: "";
                position: absolute;
            }

            .auth-visual::before {
                background: rgba(255, 255, 255, .08);
                height: 260px;
                right: -88px;
                top: -80px;
                width: 260px;
            }

            .auth-visual::after {
                background: rgba(27, 200, 242, .12);
                bottom: -92px;
                height: 310px;
                left: -105px;
                width: 310px;
            }

            .auth-visual-copy {
                color: #fff;
                position: relative;
                z-index: 2;
            }

            .auth-pill {
                background: rgba(255, 255, 255, .14);
                border: 1px solid rgba(255, 255, 255, .22);
                border-radius: 999px;
                color: rgba(255, 255, 255, .86);
                display: inline-flex;
                font-size: .78rem;
                font-weight: 700;
                gap: 8px;
                padding: 9px 13px;
            }

            .auth-visual-copy h2 {
                font-size: 2.3rem;
                font-weight: 700;
                letter-spacing: 0;
                line-height: 1.16;
                margin: 22px 0 12px;
                max-width: 430px;
            }

            .auth-visual-copy p {
                color: rgba(255, 255, 255, .74);
                line-height: 1.75;
                margin: 0;
                max-width: 420px;
            }

            .wallet-scene {
                align-items: center;
                display: flex;
                flex: 1;
                justify-content: center;
                min-height: 360px;
                perspective: 1000px;
                position: relative;
                z-index: 2;
            }

            .wallet-card {
                background: linear-gradient(145deg, rgba(255, 255, 255, .32), rgba(255, 255, 255, .09));
                border: 1px solid rgba(255, 255, 255, .26);
                border-radius: 28px;
                box-shadow: 0 34px 70px rgba(0, 0, 0, .28), inset 0 1px 0 rgba(255, 255, 255, .32);
                height: 230px;
                padding: 24px;
                position: relative;
                transform: rotateY(-18deg) rotateX(12deg);
                width: 330px;
            }

            .wallet-card::before {
                background: linear-gradient(135deg, rgba(27, 200, 242, .8), rgba(124, 58, 237, .7));
                border-radius: 999px;
                box-shadow: 0 0 45px rgba(27, 200, 242, .56);
                content: "";
                height: 80px;
                position: absolute;
                right: 24px;
                top: 22px;
                width: 80px;
            }

            .wallet-chip {
                background: linear-gradient(135deg, #f9d77f, #f5ad3d);
                border-radius: 12px;
                height: 48px;
                margin-top: 18px;
                width: 62px;
            }

            .wallet-line {
                background: rgba(255, 255, 255, .7);
                border-radius: 999px;
                height: 10px;
                margin-top: 52px;
                width: 72%;
            }

            .wallet-line.short {
                margin-top: 14px;
                width: 46%;
            }

            .floating-token {
                align-items: center;
                background: rgba(255, 255, 255, .16);
                border: 1px solid rgba(255, 255, 255, .2);
                border-radius: 20px;
                box-shadow: 0 20px 45px rgba(0, 0, 0, .18);
                color: #fff;
                display: flex;
                height: 76px;
                justify-content: center;
                position: absolute;
                width: 76px;
            }

            .floating-token.one {
                left: 42px;
                top: 78px;
            }

            .floating-token.two {
                bottom: 76px;
                right: 46px;
            }

            .security-badge {
                align-items: center;
                background: rgba(255, 255, 255, .12);
                border: 1px solid rgba(255, 255, 255, .18);
                border-radius: 18px;
                bottom: 24px;
                color: #fff;
                display: flex;
                gap: 12px;
                left: 28px;
                padding: 14px 16px;
                position: absolute;
            }

            .security-badge span {
                color: rgba(255, 255, 255, .7);
                display: block;
                font-size: .75rem;
                margin-top: 2px;
            }

            @media (max-width: 960px) {
                .auth-page {
                    padding: 20px;
                }

                .auth-shell {
                    grid-template-columns: 1fr;
                    max-width: 520px;
                    min-height: auto;
                }

                .auth-visual {
                    display: none;
                }
            }

            @media (max-width: 575.98px) {
                .auth-page {
                    padding: 0;
                }

                .auth-shell {
                    border-radius: 0;
                    min-height: 100vh;
                }

                .auth-panel {
                    padding: 30px 22px;
                }

                .auth-brand {
                    margin-bottom: 30px;
                }

                .auth-heading h1 {
                    font-size: 1.72rem;
                }
            }
        </style>
    </head>
    <body>
        <main class="auth-page">
            <section class="auth-shell">
                <aside class="auth-visual" aria-label="Secure fintech illustration">
                    <div class="auth-visual-copy">
                        <span class="auth-pill"><i class="fas fa-shield-alt"></i> Secure fintech workspace</span>
                        <h2>Manage digital services with clarity and confidence.</h2>
                        <p>Modern access for wallet operations, protected transactions, and technology-driven service delivery.</p>
                    </div>

                    <div class="wallet-scene" aria-hidden="true">
                        <div class="floating-token one"><i class="fas fa-lock fa-lg"></i></div>
                        <div class="wallet-card">
                            <div class="wallet-chip"></div>
                            <div class="wallet-line"></div>
                            <div class="wallet-line short"></div>
                        </div>
                        <div class="floating-token two"><i class="fas fa-bolt fa-lg"></i></div>
                        <div class="security-badge">
                            <i class="fas fa-fingerprint fa-lg"></i>
                            <strong>Verified<span>Encrypted access</span></strong>
                        </div>
                    </div>
                </aside>
                <div class="auth-panel">
                    <a class="auth-brand" href="{{ url('/') }}">
                        <span class="auth-brand-logo">
                            <img src="{{ asset('backend/img/ndpc_logo.png') }}" alt="{{ config('app.name', 'NDPC') }}">
                        </span>
                        <span>
                            <span class="auth-brand-name">{{ config('app.name', 'NDPC') }}</span>
                            <span class="auth-brand-caption"><br />NDPC Digital Service</span>
                        </span>
                    </a>

                    <div class="auth-heading">
                        <h1>{{ $authTitle }}</h1>
                        <p>{{ $authSubtitle }}</p>
                    </div>

                    {{ $slot }}
                </div>

                
            </section>
        </main>
    </body>
</html>
