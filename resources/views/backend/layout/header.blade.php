@php
    $authUser = Auth::user();
    $profileImage = $authUser && $authUser->image
        ? asset('storage/' . $authUser->image)
        : asset('backend/img/default.png');
    $roleName = $authUser?->getRoleNames()->first() ?? 'User';
@endphp

<nav class="navbar navbar-expand navbar-light bg-white topbar backend-topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 backend-topbar-toggle">
        <i class="fa fa-bars"></i>
    </button>

    <div class="backend-topbar-brand d-none d-md-flex">
        <div class="backend-topbar-mark">
            <i class="fas fa-shield-alt"></i>
        </div>
        <div>
            <div class="backend-topbar-title">NDPC Admin</div>
            <div class="backend-topbar-subtitle">Content and access management</div>
        </div>
    </div>

    <ul class="navbar-nav ml-auto align-items-center">
        <li class="nav-item d-none d-lg-flex mr-3">
            <a href="{{ url('/') }}" target="_blank" class="backend-topbar-action">
                <i class="fas fa-external-link-alt"></i>
                <span>View Website</span>
            </a>
        </li>

        <li class="nav-item d-none d-sm-flex mr-3">
            <div class="backend-topbar-status">
                <span class="backend-status-dot"></span>
                <span>System Online</span>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle backend-user-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-3 d-none d-lg-block text-right">
                    <span class="backend-user-name">{{ Str::title($authUser->name) }}</span>
                    <span class="backend-user-role">{{ $roleName }}</span>
                </span>
                <img class="img-profile rounded-circle backend-user-avatar" src="{{ $profileImage }}"
                    alt="{{ $authUser->name }}">
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in backend-user-menu"
                aria-labelledby="userDropdown">
                <div class="backend-user-menu-head">
                    <img class="backend-user-menu-avatar" src="{{ $profileImage }}" alt="{{ $authUser->name }}">
                    <div>
                        <div class="backend-user-menu-name">{{ Str::title($authUser->name) }}</div>
                        <div class="backend-user-menu-email">{{ $authUser->email }}</div>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ route('viewProfile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                    Profile
                </a>
                <a class="dropdown-item d-lg-none" href="{{ url('/') }}" target="_blank">
                    <i class="fas fa-external-link-alt fa-sm fa-fw mr-2"></i>
                    View Website
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content backend-logout-modal">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="logoutModalLabel">End Current Session?</h5>
                    <p class="mb-0 small text-muted">You can sign back in anytime with your admin credentials.</p>
                </div>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Please confirm if you are ready to logout from the NDPC admin dashboard.
            </div>
            <div class="modal-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
