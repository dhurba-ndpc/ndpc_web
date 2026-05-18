@php
    $errorCode = trim($__env->yieldContent('code', '500'));
    $errorTitle = trim($__env->yieldContent('error_title', 'Something went wrong'));
    $errorMessage = trim($__env->yieldContent('message', 'We could not complete your request right now. Please try again later.'));
    $errorHint = trim($__env->yieldContent('hint', 'Our team has been notified if this needs attention.'));
    $errorIcon = trim($__env->yieldContent('icon', 'bi-exclamation-diamond'));
@endphp

@extends('frontend.layout.main')

@section('title', $errorCode . ' - ' . $errorTitle . ' | Namaste Pay')

@push('styles')
    <style>
        .error-page {
            position: relative;
            min-height: 100vh;
            padding: 150px 0 90px;
            background:
                linear-gradient(135deg, rgba(25, 57, 128, .96), rgba(18, 42, 100, .94)),
                url("{{ asset('frontend/images/ads_image.jpg') }}") center/cover no-repeat;
            overflow: hidden;
        }

        .error-page::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 15% 20%, rgba(255, 255, 255, .16), transparent 28%),
                radial-gradient(circle at 86% 70%, rgba(232, 25, 44, .22), transparent 30%);
            pointer-events: none;
        }

        .error-page .container {
            position: relative;
            z-index: 1;
        }

        .error-panel {
            background: #ffffff;
            border: 1px solid rgba(25, 57, 128, .12);
            border-radius: 14px;
            box-shadow: 0 24px 60px rgba(4, 18, 54, .22);
            overflow: hidden;
        }

        .error-visual {
            height: 100%;
            min-height: 420px;
            padding: 48px;
            background:
                linear-gradient(145deg, rgba(25, 57, 128, .98), rgba(25, 57, 128, .86)),
                url("{{ asset('frontend/images/z1.png') }}") center/cover no-repeat;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .error-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            width: fit-content;
            padding: 9px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .14);
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
        }

        .error-code {
            color: #ffffff;
            font-size: clamp(82px, 12vw, 150px);
            line-height: .9;
            font-weight: 800;
            margin: 48px 0 16px;
        }

        .error-visual p {
            color: rgba(255, 255, 255, .82);
            max-width: 410px;
            margin: 0;
        }

        .error-content {
            padding: 56px 48px;
        }

        .error-icon {
            width: 72px;
            height: 72px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f4f7fc;
            color: var(--blue);
            font-size: 34px;
            margin-bottom: 24px;
        }

        .error-content h1 {
            color: #111827;
            font-size: clamp(30px, 4vw, 46px);
            margin-bottom: 16px;
        }

        .error-message {
            color: #34435b;
            font-size: 17px;
            margin-bottom: 18px;
        }

        .error-hint {
            border-left: 4px solid var(--red);
            background: #fbfdff;
            color: #5b6c8f;
            padding: 16px 18px;
            margin: 26px 0 32px;
            border-radius: 0 8px 8px 0;
        }

        .error-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .error-actions .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 22px;
            font-weight: 600;
        }

        .btn-error-outline {
            border: 1px solid rgba(25, 57, 128, .22) !important;
            color: var(--blue) !important;
            background: #ffffff !important;
        }

        .btn-error-outline:hover {
            background: #f4f7fc !important;
        }

        .error-quick-links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid #e4e6ef;
        }

        .error-quick-links a {
            color: var(--blue);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .error-quick-links a:hover {
            color: var(--red);
        }

        @media (max-width: 991px) {
            .error-page {
                padding-top: 130px;
            }

            .error-visual {
                min-height: auto;
                padding: 36px;
            }

            .error-content {
                padding: 38px 28px;
            }
        }
    </style>
@endpush

@section('content')
    <main class="error-page">
        <div class="container">
            <div class="error-panel">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <div class="error-visual">
                            <div>
                                <span class="error-badge">
                                    <i class="bi {{ $errorIcon }}"></i>
                                    Namaste Pay
                                </span>
                                <div class="error-code">{{ $errorCode }}</div>
                                <p>{{ $errorHint }}</p>
                            </div>
                            <p>Secure digital payment services remain our priority, even when a page needs attention.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="error-content">
                            <div class="error-icon">
                                <i class="bi {{ $errorIcon }}"></i>
                            </div>
                            <h1>{{ $errorTitle }}</h1>
                            <p class="error-message">{{ $errorMessage }}</p>
                            <div class="error-hint">{{ $errorHint }}</div>

                            <div class="error-actions">
                                <a href="{{ url('/') }}" class="btn btn-primary">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                                <a href="{{ url()->previous() === url()->current() ? url('/') : url()->previous() }}"
                                    class="btn btn-error-outline">
                                    <i class="bi bi-arrow-left"></i>
                                    Go Back
                                </a>
                                @auth
                                    <a href="{{ route('dashboard.index') }}" class="btn btn-error-outline">
                                        <i class="bi bi-speedometer2"></i>
                                        Dashboard
                                    </a>
                                @endauth
                            </div>

                            <div class="error-quick-links">
                                <a href="{{ url('/about') }}">About Us</a>
                                <a href="{{ url('/product') }}">Our Product</a>
                                <a href="{{ url('/notice') }}">Notices</a>
                                <a href="{{ url('/contact') }}">Contact Support</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
