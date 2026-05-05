@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($user) ? 'Edit User' : 'Create User' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($user) ? 'Edit User' : 'Create User' }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-primary">
                 <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-{{ isset($user) ? 'user-edit' : 'user-plus' }}"></i> 
                        {{ isset($user) ? 'Update User: ' . $user->name : 'Create New User' }}
                    </h6>
                </div>
                <div class="card-body">
                    {{-- 1. Dynamic Form Action --}}
                    <form method="POST" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
                        @csrf
                        
                        {{-- 2. Method Spoofing for Update --}}
                        @if(isset($user))
                            @method('PUT')
                        @endif

                        <div class="form-section-title">
                            <h6 class="m-0 font-weight-bold text-primary">Identity & Credentials</h6>
                        </div>

                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label class="small font-weight-bold text-dark">Full Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" 
                                        name="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Enter user's full name">
                                </div>
                                @error('name') <span class="text-danger small"><strong>{{ $message }}</strong></span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="small font-weight-bold text-dark">Email Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" 
                                        name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="email@company.com">
                                </div>
                                @error('email') <span class="text-danger small"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small font-weight-bold text-dark">
                                    {{ isset($user) ? 'New Password (Leave blank to keep current)' : 'System Password' }}
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="••••••••">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary password-toggle-btn" type="button"
                                            data-password-toggle="password" aria-label="Show password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('password') <span class="text-danger small"><strong>{{ $message }}</strong></span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="small font-weight-bold text-dark"> {{ isset($user) ? 'Confirm Password (Leave blank to keep current)' : 'System Password' }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••••">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary password-toggle-btn" type="button"
                                            data-password-toggle="password_confirmation" aria-label="Show confirm password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section-title mt-4">
                            <h6 class="m-0 font-weight-bold text-primary">Access & Permission Level</h6>
                        </div>

                        <div class="form-group mt-3">
                            <label class="small font-weight-bold text-dark">Assign Primary Role</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-tag text-primary"></i></span>
                                </div>
                                <select class="form-control" name="role">
                                    <option selected disabled>Choose a role...</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" 
                                            {{ (old('role') == $role->name || (isset($user) && $user->hasRole($role->name))) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role') <span class="text-danger small"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-actions mt-5 border-top pt-4">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text">{{ isset($user) ? 'Update User Account' : 'Create and Assign Role' }}</span>
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-times"></i>
                                </span>
                                <span class="text">Cancel</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.querySelectorAll('[data-password-toggle]').forEach(function(button) {
            button.addEventListener('click', function() {
                const input = document.getElementById(button.dataset.passwordToggle);
                const icon = button.querySelector('i');
                const isHidden = input.type === 'password';

                input.type = isHidden ? 'text' : 'password';
                icon.classList.toggle('fa-eye', !isHidden);
                icon.classList.toggle('fa-eye-slash', isHidden);
                button.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
            });
        });
    </script>
@endpush
