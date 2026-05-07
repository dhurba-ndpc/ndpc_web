@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">User Profile</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile Details</li>
                </ol>
            </nav>
        </div>

        <a href="#" class="btn btn-sm btn-outline-primary shadow-sm">
            <i class="fas fa-list fa-sm mr-1"></i> Edit Details
        </a>
    </div>


    @if ($isEdit)
        <div class="card shadow mb-4 border-left-primary user-profile-card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-edit mr-2"></i>Update Profile
                </h6>
                <span class="badge badge-pill badge-primary">Static Form</span>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 mb-4 mb-xl-0">
                            <div class="user-profile-side bg-light rounded border p-3">
                                <div class="text-center">
                                    <label class="small font-weight-bold text-dark d-block mb-3">Profile Image</label>

                                    <div class="user-avatar-preview mx-auto mb-3">
                                        <img id="profileImagePreview" src="" alt="Selected profile image"
                                            class="d-none">
                                        <div class="user-avatar-placeholder" id="profileImagePlaceholder">
                                            <span>JD</span>
                                        </div>
                                    </div>

                                    <div class="custom-file text-left">
                                        <input type="file" id="image" name="image" class="custom-file-input"
                                            accept="image/*">
                                        <label class="custom-file-label" for="image">Choose profile image...</label>
                                    </div>

                                    <small class="text-muted d-block mt-3">JPG or PNG, maximum 2MB.</small>
                                </div>

                                <hr>

                                <div class="small text-muted">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span>Account status</span>
                                        <span class="badge badge-success">Active</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span>Role</span>
                                        <span class="font-weight-bold text-primary">Administrator</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="form-section-title">
                                <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                            </div>

                            <div class="form-row mt-3">
                                <div class="form-group col-md-6">
                                    <label for="name" class="small font-weight-bold text-dark">Full Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="John Doe">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email" class="small font-weight-bold text-dark">Email Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="john.doe@example.com">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone" class="small font-weight-bold text-dark">Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            value="+977 9800000000">
                                    </div>
                                </div>


                            </div>

                            <div class="form-group">
                                <label for="address" class="small font-weight-bold text-dark">Address</label>
                                <textarea id="address" name="address" rows="3" class="form-control">Kathmandu, Nepal</textarea>
                            </div>

                            <div class="form-section-title mt-4">
                                <h6 class="m-0 font-weight-bold text-primary">Security</h6>
                            </div>

                            <div class="form-row mt-3">
                                <div class="form-group col-md-6">
                                    <label for="password" class="small font-weight-bold text-dark">New Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Leave blank to keep current">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password_confirmation" class="small font-weight-bold text-dark">Confirm
                                        Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" placeholder="Leave blank to keep current">
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions border-top pt-4 mt-4">
                                <button type="button" class="btn btn-primary btn-icon-split shadow-sm">
                                    <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                    <span class="text">Update Profile</span>
                                </button>
                                <a href="#" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                    <span class="icon text-white-50"><i class="fas fa-times"></i></span>
                                    <span class="text">Cancel</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="card shadow mb-4 border-left-primary overflow-hidden">
            <div class="card-body p-0">
                <div class="profile-overview-banner p-4 p-lg-5">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                            <div class="profile-overview-avatar mr-4">
                                <span>JD</span>
                            </div>
                            <div>
                                <div class="small font-weight-bold text-primary text-uppercase mb-2">Profile Overview</div>
                                <h2 class="h3 font-weight-bold text-dark mb-1">{{ $user->name }}</h2>
                                <div class="text-muted mb-3">{{ $user->email }}</div>
                                <div class="d-flex flex-wrap">
                                    <span class="badge badge-primary badge-pill px-3 py-2 mr-2 mb-2">
                                        <i class="fas fa-user-shield mr-1"></i>{{ $user->getRoleNames()->first() }}
                                    </span>
                                    <span class="badge badge-success badge-pill px-3 py-2 mr-2 mb-2">
                                        <i class="fas fa-check-circle mr-1"></i>Active
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="profile-overview-dates">
                            <div class="profile-date-card mb-3">
                                <div class="small text-muted">Created</div>
                                <div class="font-weight-bold text-dark">{{ $user->created_at->format('Y-m-d') }}</div>
                            </div>
                            <div class="profile-date-card">
                                <div class="small text-muted">Last Updated</div>
                                <div class="font-weight-bold text-dark">{{ $user->updated_at->format('Y-m-d') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="profile-contact-tile">
                                <div class="profile-contact-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="small text-muted">Full Name</div>
                                <div class="font-weight-bold text-dark">{{ $user->name }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="profile-contact-tile">
                                <div class="profile-contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="small text-muted">Email Address</div>
                                <div class="font-weight-bold text-dark text-break">{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="profile-contact-tile">
                                <div class="profile-contact-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="small text-muted">Phone Number</div>
                                <div class="font-weight-bold text-dark">{{ $user->phone }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="profile-contact-tile">
                                <div class="profile-contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="small text-muted">Address</div>
                                <div class="font-weight-bold text-dark">{{ $user->address }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('script')
    <style>
        .profile-overview-banner {
            background:
                linear-gradient(135deg, rgba(26, 57, 128, 0.08), rgba(255, 255, 255, 0.95)),
                #f8faff;
            border-bottom: 1px solid #dbe1ec;
        }

        .profile-overview-avatar {
            align-items: center;
            background: #1a3980;
            border: 6px solid #fff;
            border-radius: 1rem;
            box-shadow: 0 0.75rem 1.75rem rgba(26, 57, 128, 0.18);
            color: #fff;
            display: flex;
            flex: 0 0 auto;
            font-size: 2.1rem;
            font-weight: 800;
            height: 104px;
            justify-content: center;
            width: 104px;
        }

        .profile-overview-dates {
            min-width: 220px;
        }

        .profile-date-card,
        .profile-contact-tile {
            background: #fff;
            border: 1px solid #dbe1ec;
            border-radius: 0.5rem;
            box-shadow: 0 0.35rem 1rem rgba(26, 57, 128, 0.06);
        }

        .profile-date-card {
            padding: 0.85rem 1rem;
        }

        .profile-contact-tile {
            height: 100%;
            padding: 1rem;
        }

        .profile-contact-icon {
            align-items: center;
            background: #edf3ff;
            border-radius: 0.45rem;
            color: #1a3980;
            display: flex;
            height: 40px;
            justify-content: center;
            margin-bottom: 0.85rem;
            width: 40px;
        }

        @media (max-width: 575.98px) {
            .profile-overview-avatar {
                height: 82px;
                width: 82px;
                font-size: 1.6rem;
            }
        }
    </style>

    <script>
        const profileImageInput = document.getElementById('image');
        const profileImagePreview = document.getElementById('profileImagePreview');
        const profileImagePlaceholder = document.getElementById('profileImagePlaceholder');

        if (profileImageInput && profileImagePreview && profileImagePlaceholder) {
            profileImageInput.addEventListener('change', function() {
                const file = profileImageInput.files[0];
                const fileLabel = profileImageInput.nextElementSibling;

                fileLabel.textContent = file ? file.name : 'Choose profile image...';

                if (!file) {
                    profileImagePreview.classList.add('d-none');
                    profileImagePreview.removeAttribute('src');
                    profileImagePlaceholder.classList.remove('d-none');
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(event) {
                    profileImagePreview.src = event.target.result;
                    profileImagePreview.classList.remove('d-none');
                    profileImagePlaceholder.classList.add('d-none');
                };

                reader.readAsDataURL(file);
            });
        }
    </script>
@endpush
