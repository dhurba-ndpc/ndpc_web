@php
    $user = auth()->user();

    $canAccess = function ($permissions) use ($user) {
        if ($user->hasRole('Super Admin')) {
            $allowedForSuperAdmin = [
                'User-View',
                'User-Create',
                'User-Edit',
                'User-Delete',
                'Role-View',
                'Role-Create',
                'Role-Edit',
                'Role-Delete',
                'Permission-View',
                'Permission-Create',
                'Permission-Edit',
                'Permission-Delete',
            ];

            $permissions = is_array($permissions) ? $permissions : [$permissions];

            return collect($permissions)->contains(fn($permission) => in_array($permission, $allowedForSuperAdmin));
        }

        $permissions = is_array($permissions) ? $permissions : [$permissions];

        return collect($permissions)->contains(fn($permission) => $user->can($permission));
    };

    $isActive = function ($patterns) {
        $patterns = is_array($patterns) ? $patterns : [$patterns];

        return collect($patterns)->contains(fn($pattern) => Route::is($pattern));
    };

    $singleMenus = [
        [
            'title' => 'Dashboard',
            'icon' => 'fas fa-fw fa-tachometer-alt',
            'route' => 'dashboard.index',
            'active' => 'dashboard.*',
            'permissions' => [],
        ],
        [
            'title' => 'Menu',
            'icon' => 'fas fa-fw fa-bars',
            'route' => 'menu.index',
            'active' => 'menu.*',
            'permissions' => ['Menu-View'],
        ],
        [
            'title' => 'Banner',
            'icon' => 'fas fa-fw fa-image',
            'route' => 'banner.index',
            'active' => 'banner.*',
            'permissions' => ['Banner-View'],
        ],
        [
            'title' => 'About Us',
            'icon' => 'fas fa-fw fa-info-circle',
            'route' => 'about.index',
            'active' => 'about.*',
            'permissions' => ['About-View'],
        ],
        [
            'title' => 'Mission Vision',
            'icon' => 'fas fa-fw fa-bullseye',
            'route' => 'mvg.index',
            'active' => 'mvg.*',
            'permissions' => ['MissionVision-View'],
        ],

        [
            'title' => 'Testimonials',
            'icon' => 'fas fa-fw fa-comment-dots',
            'route' => 'testimonials.index',
            'active' => 'testimonials.*',
            'permissions' => ['Testimonial-View'],
        ],
        [
            'title' => 'Employee Quarters',
            'icon' => 'fas fa-fw fa-newspaper',
            'route' => 'employee-quarters.index',
            'active' => 'employee-quarters.*',
            'permissions' => ['EmployeeQuarter-View'],
        ],
        [
            'title' => 'Our Product',
            'icon' => 'fas fa-fw fa-box-open',
            'route' => 'ourProduct.index',
            'active' => 'ourProduct.*',
            'permissions' => ['OurProduct-View'],
        ],
        [
            'title' => 'Setting',
            'icon' => 'fas fa-fw fa-sliders-h',
            'route' => 'siteSetting.index',
            'active' => ['siteSetting.*', 'darkbanner.*', 'playStore.*', 'promotion_message.*', 'company_goals.*'],
            'permissions' => [
                'SiteSetting-View',
                'DarkBanner-View',
                'PlayStore-View',
                'PromotionMessage-View',
                'CompanyGoal-View',
            ],
        ],
    ];

    $dropdownMenus = [
        [
            'title' => 'User Management',
            'icon' => 'fas fa-fw fa-user-shield',
            'id' => 'collapseUserManagement',
            'active' => ['roles.*', 'users.*'],
            'permissions' => ['Role-View', 'User-View'],
            'items' => [
                ['title' => 'Roles', 'route' => 'roles.index', 'permissions' => ['Role-View']],
                ['title' => 'User', 'route' => 'users.index', 'permissions' => ['User-View']],
            ],
        ],
        [
            'title' => 'Blogs',
            'icon' => 'fas fa-fw fa-blog',
            'id' => 'collapseUserBlogs',
            'active' => ['blog.*', 'blogCategory.*'],
            'permissions' => ['Blog-View', 'BlogCategory-View'],
            'items' => [
                ['title' => 'Blogs', 'route' => 'blog.index', 'permissions' => ['Blog-View']],
                ['title' => 'Category', 'route' => 'blogCategory.index', 'permissions' => ['BlogCategory-View']],
            ],
        ],
        [
            'title' => 'Offer',
            'icon' => 'fas fa-fw fa-gift',
            'id' => 'collapseOffer',
            'active' => ['services.*', 'features.*'],
            'permissions' => ['Service-View', 'Feature-View'],
            'items' => [
                ['title' => 'Services Offer', 'route' => 'services.index', 'permissions' => ['Service-View']],
                ['title' => 'Features Offer', 'route' => 'features.index', 'permissions' => ['Feature-View']],
            ],
        ],
        [
            'title' => 'Vacancy & Recruitment',
            'icon' => 'fas fa-fw fa-briefcase',
            'id' => 'collapseVacancy',
            'active' => ['recruitment-results.*', 'vacancy.*'],
            'permissions' => ['RecruitmentResult-View', 'Vacancy-View'],
            'items' => [
                [
                    'title' => 'Recruitment Results',
                    'route' => 'recruitment-results.index',
                    'permissions' => ['RecruitmentResult-View'],
                ],
                ['title' => 'Vacancy', 'route' => 'vacancy.index', 'permissions' => ['Vacancy-View']],
            ],
        ],
        [
            'title' => 'Notices',
            'icon' => 'fas fa-fw fa-bullhorn',
            'id' => 'collapseNotice',
            'active' => ['notices.*', 'report.*'],
            'permissions' => ['Notice-View', 'Report-View'],
            'items' => [
                ['title' => 'Our Notices', 'route' => 'notices.index', 'permissions' => ['Notice-View']],
                ['title' => 'Reports Download', 'route' => 'report.index', 'permissions' => ['Report-View']],
            ],
        ],
        [
            'title' => 'Technology Solutions',
            'icon' => 'fas fa-fw fa-microchip',
            'id' => 'collapseTechnologySolutions',
            'active' => ['technology-solution-categories.*', 'technology-solution-items.*'],
            'permissions' => ['TechnologySolutionCategory-View', 'TechnologySolutionItem-View'],
            'items' => [
                [
                    'title' => 'Category',
                    'route' => 'technology-solution-categories.index',
                    'permissions' => ['TechnologySolutionCategory-View'],
                ],
                [
                    'title' => 'Items',
                    'route' => 'technology-solution-items.index',
                    'permissions' => ['TechnologySolutionItem-View'],
                ],
            ],
        ],
        [
            'title' => 'Gallery',
            'icon' => 'fas fa-fw fa-images',
            'id' => 'collapseGallery',
            'active' => ['albums.*', 'galleries.*'],
            'permissions' => ['Album-View', 'Gallery-View'],
            'items' => [
                ['title' => 'Album', 'route' => 'albums.index', 'permissions' => ['Album-View']],
                ['title' => 'Gallery', 'route' => 'galleries.index', 'permissions' => ['Gallery-View']],
            ],
        ],
        [
            'title' => 'Team Member',
            'icon' => 'fas fa-fw fa-users',
            'id' => 'collapseTeamMember',
            'active' => ['leadingTeams.*', 'boardOfDirectors.*'],
            'permissions' => ['LeadingTeam-View', 'BoardOfDirectors-View'],
            'items' => [
                ['title' => 'Leading Team', 'route' => 'leadingTeams.index', 'permissions' => ['LeadingTeam-View']],
                [
                    'title' => 'Board of Director',
                    'route' => 'boardOfDirectors.index',
                    'permissions' => ['BoardOfDirectors-View'],
                ],
            ],
        ],
    ];
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-shield-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">NDPC Admin</div>
    </a>

    <hr class="sidebar-divider my-0">

    @foreach ($singleMenus as $menu)
        @continue(!$canAccess($menu['permissions']))

        <li class="nav-item {{ $isActive($menu['active']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route($menu['route']) }}">
                <i class="{{ $menu['icon'] }}"></i>
                <span>{{ $menu['title'] }}</span>
            </a>
        </li>
    @endforeach

    <hr class="sidebar-divider">

    @foreach ($dropdownMenus as $menu)
        @continue(!$canAccess($menu['permissions']))

        @php
            $active = $isActive($menu['active']);
        @endphp

        <li class="nav-item {{ $active ? 'active' : '' }}">
            <a class="nav-link {{ $active ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
                data-target="#{{ $menu['id'] }}" aria-expanded="{{ $active ? 'true' : 'false' }}"
                aria-controls="{{ $menu['id'] }}">
                <i class="{{ $menu['icon'] }}"></i>
                <span>{{ $menu['title'] }}</span>
            </a>

            <div id="{{ $menu['id'] }}" class="collapse {{ $active ? 'show' : '' }}"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @foreach ($menu['items'] as $item)
                        @continue(!$canAccess($item['permissions'] ?? []))

                        <a class="collapse-item {{ Route::is(str_replace('.index', '.*', $item['route'])) ? 'active' : '' }}"
                            href="{{ route($item['route']) }}">
                            {{ $item['title'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </li>
    @endforeach

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
