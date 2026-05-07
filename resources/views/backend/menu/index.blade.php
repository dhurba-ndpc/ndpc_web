@extends('backend.layout.main')

@section('content')
    @php
        $menuItems = collect($menus ?? []);
        $footerMenuItems = collect($footerMenus ?? []);
        $UsefulLinksMenuItems = collect($UsefulLinksMenu ?? []);
    @endphp

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Menu Management</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Menus</li>
                </ol>
            </nav>
        </div>

        <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm btn-icon-split shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus fa-sm"></i>
            </span>
            <span class="text">Create New Menu</span>
        </a>
    </div>

    <div class="card shadow mb-4 border-left-primary menu-manager-card">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-sitemap mr-2"></i>Draggable Menu Builder For <strong>Top Header</strong>
                </h6>
                <p class="small text-muted mb-0 mt-1">Drag menu rows to reorder or nest them under a parent menu.</p>
            </div>
            <span class="badge badge-pill badge-primary">{{ $menuItems->count() }} Menus</span>
        </div>

        <div class="card-body">
            <div class="menu-builder-shell">
                <div class="menu-builder-toolbar">
                    <div class="menu-builder-hint">
                        <span class="menu-builder-icon">
                            <i class="fas fa-arrows-alt"></i>
                        </span>
                        <span>Use the handle to drag. Maximum depth is 2 levels.</span>
                    </div>
                    <textarea id="json-output" class="d-none" aria-hidden="true"></textarea>
                </div>

                <div class="dd nestable menu-nestable" id="nestable">
                    @if ($menuItems->count() > 0)
                        <ol class="dd-list menu-list">
                            @foreach ($menuItems as $menu)
                                <li id="menuItem_{{ $menu->id }}" class="dd-item menu-dd-item"
                                    data-id="{{ $menu->id }}" data-name="{{ $menu->menu_name }}"
                                    data-slug="{{ $menu->slug }}" data-new="0" data-deleted="0">
                                    <div class="menu-dd-row">
                                        <div class="dd-handle menu-drag-handle" title="Drag menu">
                                            <i class="fas fa-grip-vertical"></i>
                                        </div>

                                        <div class="menu-dd-content">
                                            <div class="menu-dd-title">{{ $menu->menu_name }}</div>
                                            <div class="menu-dd-meta">
                                                <span><i
                                                        class="fas fa-map-marker-alt mr-1"></i>{{ str_replace('_', ' & ', $menu->menu_location ?? 'header') }}</span>
                                                @if ($menu->slug)
                                                    <span><i class="fas fa-link mr-1"></i>{{ $menu->slug }}</span>
                                                @endif
                                                <span><i class="fas fa-sort-numeric-down mr-1"></i>Position
                                                    {{ $menu->position ?? 0 }}</span>
                                            </div>
                                        </div>

                                        <div class="menu-dd-actions">
                                            @if ($menu->is_active)
                                                <span class="badge badge-pill badge-success">Published</span>
                                            @else
                                                <span class="badge badge-pill badge-secondary">Draft</span>
                                            @endif

                                            <a class="btn btn-info btn-sm shadow-sm"
                                                href="{{ route('menu.edit', $menu->id) }}" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm shadow-sm"
                                                data-toggle="modal" data-target="#deleteMenuModal{{ $menu->id }}"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @if ($menu->children->count() > 0)
                                        <ol class="dd-list">
                                            @foreach ($menu->children as $submenu)
                                                <li id="menuItem_{{ $submenu->id }}" class="dd-item menu-dd-item"
                                                    data-id="{{ $submenu->id }}" data-name="{{ $submenu->menu_name }}"
                                                    data-slug="{{ $submenu->slug }}" data-new="0" data-deleted="0">
                                                    <div class="menu-dd-row is-child">
                                                        <div class="dd-handle menu-drag-handle" title="Drag child menu">
                                                            <i class="fas fa-grip-vertical"></i>
                                                        </div>

                                                        <div class="menu-dd-content">
                                                            <div class="menu-dd-title">{{ $submenu->menu_name }}</div>
                                                            <div class="menu-dd-meta">
                                                                <span><i class="fas fa-level-up-alt mr-1"></i>Child
                                                                    Menu</span>
                                                                @if ($submenu->slug)
                                                                    <span><i
                                                                            class="fas fa-link mr-1"></i>{{ $submenu->slug }}</span>
                                                                @endif
                                                                <span><i class="fas fa-sort-numeric-down mr-1"></i>Position
                                                                    {{ $submenu->position ?? 0 }}</span>
                                                                <span><i class="fas fa-sort-numeric-down mr-1"></i>Parent:
                                                                    {{ $submenu->parent?->menu_name ?? 'Undefined' }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="menu-dd-actions">
                                                            @if ($submenu->is_active)
                                                                <span
                                                                    class="badge badge-pill badge-success">Published</span>
                                                            @else
                                                                <span class="badge badge-pill badge-secondary">Draft</span>
                                                            @endif

                                                            <a class="btn btn-info btn-sm shadow-sm"
                                                                href="{{ route('menu.edit', $submenu->id) }}"
                                                                title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>

                                                            <button type="button" class="btn btn-danger btn-sm shadow-sm"
                                                                data-toggle="modal"
                                                                data-target="#deleteMenuModal{{ $submenu->id }}"
                                                                title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif

                                </li>
                            @endforeach
                        </ol>
                    @else
                        <div class="menu-empty-state">
                            <div class="menu-empty-icon">
                                <i class="fas fa-bars"></i>
                            </div>
                            <h6>No menus found</h6>
                            <p>Create your first menu item to start building the navigation.</p>
                            <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus mr-1"></i>Create Menu
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-success btn-sm btn-flat" id="serialize">
                <i class="fa fa-save"></i> Update Menu
            </button>
        </div>
    </div>


    <div class="card shadow mb-4 border-left-primary menu-manager-card">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-sitemap mr-2"></i>Draggable Menu Builder For <strong>Footer Company</strong>
                </h6>
                <p class="small text-muted mb-0 mt-1">Drag menu rows to reorder or nest them under a parent menu.</p>
            </div>
            <span class="badge badge-pill badge-primary">{{ $footerMenuItems->count() }} Menus</span>
        </div>

        <div class="card-body">
            <div class="menu-builder-shell">
                <div class="menu-builder-toolbar">
                    <div class="menu-builder-hint">
                        <span class="menu-builder-icon">
                            <i class="fas fa-arrows-alt"></i>
                        </span>
                        <span>Use the handle to drag. Maximum depth is 2 levels.</span>
                    </div>
                    <textarea id="json-output" class="d-none" aria-hidden="true"></textarea>
                </div>

                <div class="dd nestable menu-nestable" id="nestable1">
                    @if ($footerMenuItems->count() > 0)
                        <ol class="dd-list menu-list">
                            @foreach ($footerMenuItems as $menu)
                                <li id="menuItem_{{ $menu->id }}" class="dd-item menu-dd-item"
                                    data-id="{{ $menu->id }}" data-name="{{ $menu->menu_name }}"
                                    data-slug="{{ $menu->slug }}" data-new="0" data-deleted="0">
                                    <div class="menu-dd-row">
                                        <div class="dd-handle menu-drag-handle" title="Drag menu">
                                            <i class="fas fa-grip-vertical"></i>
                                        </div>

                                        <div class="menu-dd-content">
                                            <div class="menu-dd-title">{{ $menu->menu_name }}</div>
                                            <div class="menu-dd-meta">
                                                <span><i
                                                        class="fas fa-map-marker-alt mr-1"></i>{{ str_replace('_', ' & ', $menu->menu_location ?? 'header') }}</span>
                                                @if ($menu->slug)
                                                    <span><i class="fas fa-link mr-1"></i>{{ $menu->slug }}</span>
                                                @endif
                                                <span><i class="fas fa-sort-numeric-down mr-1"></i>Position
                                                    {{ $menu->position ?? 0 }}</span>
                                            </div>
                                        </div>

                                        <div class="menu-dd-actions">
                                            @if ($menu->is_active)
                                                <span class="badge badge-pill badge-success">Published</span>
                                            @else
                                                <span class="badge badge-pill badge-secondary">Draft</span>
                                            @endif

                                            <a class="btn btn-info btn-sm shadow-sm"
                                                href="{{ route('menu.edit', $menu->id) }}" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm shadow-sm"
                                                data-toggle="modal" data-target="#deleteMenuModal{{ $menu->id }}"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @if ($menu->children->count() > 0)
                                        <ol class="dd-list">
                                            @foreach ($menu->children as $submenu)
                                                <li id="menuItem_{{ $submenu->id }}" class="dd-item menu-dd-item"
                                                    data-id="{{ $submenu->id }}" data-name="{{ $submenu->menu_name }}"
                                                    data-slug="{{ $submenu->slug }}" data-new="0" data-deleted="0">
                                                    <div class="menu-dd-row is-child">
                                                        <div class="dd-handle menu-drag-handle" title="Drag child menu">
                                                            <i class="fas fa-grip-vertical"></i>
                                                        </div>

                                                        <div class="menu-dd-content">
                                                            <div class="menu-dd-title">{{ $submenu->menu_name }}</div>
                                                            <div class="menu-dd-meta">
                                                                <span><i class="fas fa-level-up-alt mr-1"></i>Child
                                                                    Menu</span>
                                                                @if ($submenu->slug)
                                                                    <span><i
                                                                            class="fas fa-link mr-1"></i>{{ $submenu->slug }}</span>
                                                                @endif
                                                                <span><i class="fas fa-sort-numeric-down mr-1"></i>Position
                                                                    {{ $submenu->position ?? 0 }}</span>
                                                                <span><i class="fas fa-sort-numeric-down mr-1"></i>Parent:
                                                                    {{ $submenu->parent?->menu_name ?? 'Undefined' }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="menu-dd-actions">
                                                            @if ($submenu->is_active)
                                                                <span
                                                                    class="badge badge-pill badge-success">Published</span>
                                                            @else
                                                                <span class="badge badge-pill badge-secondary">Draft</span>
                                                            @endif

                                                            <a class="btn btn-info btn-sm shadow-sm"
                                                                href="{{ route('menu.edit', $submenu->id) }}"
                                                                title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>

                                                            <button type="button" class="btn btn-danger btn-sm shadow-sm"
                                                                data-toggle="modal"
                                                                data-target="#deleteMenuModal{{ $submenu->id }}"
                                                                title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif

                                </li>
                            @endforeach
                        </ol>
                    @else
                        <div class="menu-empty-state">
                            <div class="menu-empty-icon">
                                <i class="fas fa-bars"></i>
                            </div>
                            <h6>No menus found</h6>
                            <p>Create your first menu item to start building the navigation.</p>
                            <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus mr-1"></i>Create Menu
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-success btn-sm btn-flat" id="serialize1">
                <i class="fa fa-save"></i> Update Menu
            </button>
        </div>
    </div>


    <div class="card shadow mb-4 border-left-primary menu-manager-card">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-sitemap mr-2"></i>Draggable Menu Builder For <strong>Useful Links</strong>
                </h6>
                <p class="small text-muted mb-0 mt-1">Drag menu rows to reorder or nest them under a parent menu.</p>
            </div>
            <span class="badge badge-pill badge-primary">{{ $UsefulLinksMenuItems->count() }} Menus</span>
        </div>

        <div class="card-body">
            <div class="menu-builder-shell">
                <div class="menu-builder-toolbar">
                    <div class="menu-builder-hint">
                        <span class="menu-builder-icon">
                            <i class="fas fa-arrows-alt"></i>
                        </span>
                        <span>Use the handle to drag. Maximum depth is 2 levels.</span>
                    </div>
                    <textarea id="json-output" class="d-none" aria-hidden="true"></textarea>
                </div>

                <div class="dd nestable menu-nestable" id="nestable2">
                    @if ($UsefulLinksMenuItems->count() > 0)
                        <ol class="dd-list menu-list">
                            @foreach ($UsefulLinksMenuItems as $menu)
                                <li id="menuItem_{{ $menu->id }}" class="dd-item menu-dd-item"
                                    data-id="{{ $menu->id }}" data-name="{{ $menu->menu_name }}"
                                    data-slug="{{ $menu->slug }}" data-new="0" data-deleted="0">
                                    <div class="menu-dd-row">
                                        <div class="dd-handle menu-drag-handle" title="Drag menu">
                                            <i class="fas fa-grip-vertical"></i>
                                        </div>

                                        <div class="menu-dd-content">
                                            <div class="menu-dd-title">{{ $menu->menu_name }}</div>
                                            <div class="menu-dd-meta">
                                                <span><i
                                                        class="fas fa-map-marker-alt mr-1"></i>{{ str_replace('_', ' & ', $menu->menu_location ?? 'header') }}</span>
                                                @if ($menu->slug)
                                                    <span><i class="fas fa-link mr-1"></i>{{ $menu->slug }}</span>
                                                @endif
                                                <span><i class="fas fa-sort-numeric-down mr-1"></i>Position
                                                    {{ $menu->position ?? 0 }}</span>
                                            </div>
                                        </div>

                                        <div class="menu-dd-actions">
                                            @if ($menu->is_active)
                                                <span class="badge badge-pill badge-success">Published</span>
                                            @else
                                                <span class="badge badge-pill badge-secondary">Draft</span>
                                            @endif

                                            <a class="btn btn-info btn-sm shadow-sm"
                                                href="{{ route('menu.edit', $menu->id) }}" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm shadow-sm"
                                                data-toggle="modal" data-target="#deleteMenuModal{{ $menu->id }}"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @if ($menu->children->count() > 0)
                                        <ol class="dd-list">
                                            @foreach ($menu->children as $submenu)
                                                <li id="menuItem_{{ $submenu->id }}" class="dd-item menu-dd-item"
                                                    data-id="{{ $submenu->id }}" data-name="{{ $submenu->menu_name }}"
                                                    data-slug="{{ $submenu->slug }}" data-new="0" data-deleted="0">
                                                    <div class="menu-dd-row is-child">
                                                        <div class="dd-handle menu-drag-handle" title="Drag child menu">
                                                            <i class="fas fa-grip-vertical"></i>
                                                        </div>

                                                        <div class="menu-dd-content">
                                                            <div class="menu-dd-title">{{ $submenu->menu_name }}</div>
                                                            <div class="menu-dd-meta">
                                                                <span><i class="fas fa-level-up-alt mr-1"></i>Child
                                                                    Menu</span>
                                                                @if ($submenu->slug)
                                                                    <span><i
                                                                            class="fas fa-link mr-1"></i>{{ $submenu->slug }}</span>
                                                                @endif
                                                                <span><i class="fas fa-sort-numeric-down mr-1"></i>Position
                                                                    {{ $submenu->position ?? 0 }}</span>

                                                                <span><i class="fas fa-sort-numeric-down mr-1"></i>Parent:
                                                                    {{ $submenu->parent?->menu_name ?? 'Undefined' }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="menu-dd-actions">
                                                            @if ($submenu->is_active)
                                                                <span
                                                                    class="badge badge-pill badge-success">Published</span>
                                                            @else
                                                                <span class="badge badge-pill badge-secondary">Draft</span>
                                                            @endif

                                                            <a class="btn btn-info btn-sm shadow-sm"
                                                                href="{{ route('menu.edit', $submenu->id) }}"
                                                                title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>

                                                            <button type="button" class="btn btn-danger btn-sm shadow-sm"
                                                                data-toggle="modal"
                                                                data-target="#deleteMenuModal{{ $submenu->id }}"
                                                                title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif

                                </li>
                            @endforeach
                        </ol>
                    @else
                        <div class="menu-empty-state">
                            <div class="menu-empty-icon">
                                <i class="fas fa-bars"></i>
                            </div>
                            <h6>No menus found</h6>
                            <p>Create your first menu item to start building the navigation.</p>
                            <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus mr-1"></i>Create Menu
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-success btn-sm btn-flat" id="serialize2">
                <i class="fa fa-save"></i> Update Menu
            </button>
        </div>
    </div>

    @foreach ($menuItems as $menu)
        @include('backend.menu.partials.delete-modal', ['menuItem' => $menu])

        @foreach ($menu->children as $submenu)
            @include('backend.menu.partials.delete-modal', ['menuItem' => $submenu])
        @endforeach
    @endforeach
    @foreach ($footerMenuItems as $menu)
        @include('backend.menu.partials.delete-modal', ['menuItem' => $menu])

        @foreach ($menu->children as $submenu)
            @include('backend.menu.partials.delete-modal', ['menuItem' => $submenu])
        @endforeach
    @endforeach
    @foreach ($UsefulLinksMenuItems as $menu)
        @include('backend.menu.partials.delete-modal', ['menuItem' => $menu])

        @foreach ($menu->children as $submenu)
            @include('backend.menu.partials.delete-modal', ['menuItem' => $submenu])
        @endforeach
    @endforeach
@endsection

@push('script')
    <script>
        // backend draggable menu start
        (function() {

            const nestable = $('#nestable, #nestable1, #nestable2');
            const output = $('#json-output');

            if (!$.fn.nestable || !nestable.length) {
                return;
            }

            nestable.nestable({
                maxDepth: 2
            });

            $('#nestable, #nestable1, #nestable2').on('change', function() {

                let data = $(this).nestable('serialize');

                output.val(JSON.stringify(data));
            });

        })();
        // backend draggable menu end



        // arrange menu order start
        $("#serialize, #serialize1, #serialize2").click(function(e) {

            e.preventDefault();

            let button = $(this);

            let nestableId = '';

            if (button.attr('id') === 'serialize') {
                nestableId = '#nestable';

            } else if (button.attr('id') === 'serialize1') {
                nestableId = '#nestable1';

            } else if (button.attr('id') === 'serialize2') {
                nestableId = '#nestable2';
            }

            let serializedData = $(nestableId).nestable('serialize');

            console.log(serializedData);

            button.prop("disabled", true).html(
                `<span class="spinner-grow spinner-grow-sm"></span> Updating...`
            );

            $.ajax({
                url: "{{ route('updateMenuOrder') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    sort: JSON.stringify(serializedData)
                },

                success: function(res) {

                    toastr.options.closeButton = true;

                    toastr.success(
                        'Menu Order Updated Successfully',
                        "Success!"
                    );

                    button.prop("disabled", false).html(
                        `<i class="fa fa-save"></i> Update Menu`
                    );

                    setTimeout(function() {
                        location.reload();
                    }, 800);
                },

                error: function(xhr) {

                    console.log(xhr.responseText);

                    toastr.error(
                        'An error occurred while updating the menu order',
                        "Error!"
                    );

                    button.prop("disabled", false).html(
                        `<i class="fa fa-save"></i> Update Menu`
                    );
                }
            });

        });
        // arrange menu order end
    </script>
@endpush
