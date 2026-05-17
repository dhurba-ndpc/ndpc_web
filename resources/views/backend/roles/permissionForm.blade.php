@extends('backend.layout.main')


@section('content')
    @php
        $actionStyles = [
            'View' => ['class' => 'primary', 'icon' => 'fas fa-eye'],
            'Create' => ['class' => 'success', 'icon' => 'fas fa-plus'],
            'Edit' => ['class' => 'info', 'icon' => 'fas fa-pencil-alt'],
            'Delete' => ['class' => 'danger', 'icon' => 'fas fa-trash'],
        ];
    @endphp

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Permission Management</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Permissions</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-primary permission-card">
                <div class="card-header py-3 bg-white border-bottom-primary">
                    <div class="d-md-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-user-shield fa-fw mr-2"></i>Permission Matrix
                            </h6>
                            <div class="small text-muted mt-1">Manage all module permissions for this role in one view.</div>
                        </div>
                        <span class="badge badge-primary px-3 py-2 mt-3 mt-md-0">
                            {{ $getRoleId->name }}
                        </span>
                    </div>
                </div>
                <div class="card-body permission-shell">

                    <form action="{{ route('roles.update', $getRoleId->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="name" value="{{ isset($getRoleId) ? $getRoleId->name : '' }}">

                        <div class="permission-toolbar border rounded bg-light p-3 mb-4">
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-3 mb-lg-0">
                                    <label class="small font-weight-bold text-dark mb-1" for="permissionSearch">
                                        Find model
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input type="search" class="form-control" id="permissionSearch"
                                            placeholder="Search by model name">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="d-sm-flex align-items-center justify-content-lg-end">
                                        <span class="badge badge-primary px-3 py-2 mr-sm-3 mb-3 mb-sm-0">
                                            <span id="selectedPermissionCount">{{ count($rolePermissions) }}</span>
                                            selected
                                        </span>
                                        <span class="badge badge-light border text-dark px-3 py-2 mr-sm-3 mb-3 mb-sm-0">
                                            <span id="visibleModelCount">{{ count($entities) }}</span>
                                            models shown
                                        </span>
                                        <div class="custom-control custom-switch permission-switch permission-switch-master">
                                            <input type="checkbox" class="custom-control-input" id="selectAllPermissions">
                                            <label class="custom-control-label font-weight-bold text-dark"
                                                for="selectAllPermissions">
                                                Select all
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="permission-table-wrap table-responsive border rounded">
                            <table class="table table-hover mb-0 permission-table">
                                <thead class="bg-light">
                                    <tr class="text-xs font-weight-bold text-dark text-uppercase">
                                        <th class="permission-model-col">Model</th>
                                        @foreach ($actions as $action)
                                            @php
                                                $style = $actionStyles[$action] ?? ['class' => 'secondary', 'icon' => 'fas fa-check'];
                                            @endphp
                                            <th class="text-center permission-action-col">
                                                <span class="badge badge-{{ $style['class'] }} px-2 py-1">
                                                    <i class="{{ $style['icon'] }} mr-1"></i>{{ $action }}
                                                </span>
                                            </th>
                                        @endforeach
                                        <th class="text-center permission-row-count-col">Selected</th>
                                        <th class="text-center permission-row-all-col">All</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-dark">
                                    @foreach ($entities as $entity)
                                        @php
                                            $moduleLabel = Str::of($entity)->headline()->lower()->ucfirst();
                                        @endphp
                                        <tr class="permission-row" data-module="{{ $entity }}"
                                            data-search="{{ Str::lower($moduleLabel . ' ' . $entity) }}">
                                            <td class="permission-model-col">
                                                <div class="d-flex align-items-center">
                                                    <div class="permission-module-icon bg-primary text-white mr-3">
                                                        <i class="fas fa-cube"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-weight-bold text-primary permission-model-name">
                                                            {{ $moduleLabel }}
                                                        </div>
                                                        <div class="text-muted">{{ $entity }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            @foreach ($actions as $action)
                                                @php
                                                    $permName = $entity . '-' . $action;
                                                @endphp
                                                <td class="text-center align-middle permission-action-cell">
                                                    <div class="custom-control custom-checkbox permission-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="{{ $permName }}"
                                                            class="custom-control-input permission-toggle"
                                                            data-module="{{ $entity }}"
                                                            id="permission-{{ Str::slug($permName) }}"
                                                            {{ in_array($permName, $rolePermissions) ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="permission-{{ Str::slug($permName) }}">
                                                            <span class="sr-only">{{ $permName }}</span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @endforeach
                                            <td class="text-center align-middle">
                                                <span class="badge badge-light border text-dark permission-module-progress"
                                                    data-module="{{ $entity }}">
                                                    0/{{ count($actions) }}
                                                </span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary permission-row-toggle"
                                                    data-module="{{ $entity }}">
                                                    All
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr id="permissionNoResults" class="d-none">
                                        <td colspan="{{ count($actions) + 3 }}" class="text-center text-muted py-4">
                                            No models match your search.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-actions text-right mt-4">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">Save Permissions</span>
                            </button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                <span class="icon text-white-50"><i class="fas fa-times"></i></span>
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
        $(function() {
            const $permissionToggles = $('.permission-toggle');
            const $selectAll = $('#selectAllPermissions');
            const $selectedCount = $('#selectedPermissionCount');
            const $permissionRows = $('.permission-row');
            const $permissionSearch = $('#permissionSearch');
            const $visibleModelCount = $('#visibleModelCount');
            const $noResults = $('#permissionNoResults');

            function updatePermissionSummary() {
                const selectedCount = $permissionToggles.filter(':checked').length;
                $selectedCount.text(selectedCount);
                $selectAll.prop('checked', selectedCount === $permissionToggles.length && $permissionToggles.length > 0);

                $('.permission-module-progress').each(function() {
                    const module = $(this).data('module');
                    const $moduleToggles = $permissionToggles.filter('[data-module="' + module + '"]');
                    const moduleSelected = $moduleToggles.filter(':checked').length;

                    $(this).text(moduleSelected + '/' + $moduleToggles.length);
                });

                $('.permission-row-toggle').each(function() {
                    const module = $(this).data('module');
                    const $moduleToggles = $permissionToggles.filter('[data-module="' + module + '"]');
                    const allSelected = $moduleToggles.length > 0 && $moduleToggles.filter(':checked').length === $moduleToggles.length;

                    $(this)
                        .toggleClass('btn-primary', allSelected)
                        .toggleClass('btn-outline-primary', !allSelected)
                        .text(allSelected ? 'Clear' : 'All');
                });
            }

            function filterPermissionRows() {
                const query = $permissionSearch.val().trim().toLowerCase();
                let visibleCount = 0;

                $permissionRows.each(function() {
                    const isVisible = !query || $(this).data('search').indexOf(query) !== -1;
                    $(this).toggleClass('d-none', !isVisible);

                    if (isVisible) {
                        visibleCount++;
                    }
                });

                $visibleModelCount.text(visibleCount);
                $noResults.toggleClass('d-none', visibleCount > 0);
            }

            $selectAll.on('change', function() {
                $permissionToggles.prop('checked', $(this).is(':checked'));
                updatePermissionSummary();
            });

            $permissionToggles.on('change', updatePermissionSummary);
            $permissionSearch.on('input', filterPermissionRows);

            $('.permission-row-toggle').on('click', function() {
                const module = $(this).data('module');
                const $moduleToggles = $permissionToggles.filter('[data-module="' + module + '"]');
                const allSelected = $moduleToggles.length > 0 && $moduleToggles.filter(':checked').length === $moduleToggles.length;

                $moduleToggles.prop('checked', !allSelected);
                updatePermissionSummary();
            });

            updatePermissionSummary();
            filterPermissionRows();
        });
    </script>

    <style>
        .permission-card {
            overflow: hidden;
        }

        .permission-shell {
            background: #fff;
        }

        .permission-toolbar {
            border-color: #e3e6f0 !important;
        }

        .permission-table-wrap {
            border-color: #e3e6f0 !important;
            max-height: 70vh;
            overflow-x: auto;
            overflow-y: auto;
        }

        .permission-table th,
        .permission-table td {
            vertical-align: middle;
        }

        .permission-table thead th {
            background: #f8f9fc;
            border-bottom-width: 1px;
            position: sticky;
            top: 0;
            white-space: nowrap;
            z-index: 4;
        }

        .permission-table tbody tr {
            transition: background-color .15s ease;
        }

        .permission-table tbody tr:hover {
            background-color: #fbfcff;
        }

        .permission-model-col {
            min-width: 260px;
        }

        .permission-table th.permission-model-col,
        .permission-table td.permission-model-col {
            background: #fff;
            left: 0;
            position: sticky;
            z-index: 2;
        }

        .permission-table thead th.permission-model-col {
            background: #f8f9fc;
            z-index: 5;
        }

        .permission-action-col,
        .permission-action-cell {
            min-width: 110px;
        }

        .permission-row-count-col {
            min-width: 95px;
        }

        .permission-row-all-col {
            min-width: 80px;
        }

        .permission-module-icon {
            width: 36px;
            height: 36px;
            border-radius: .35rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 36px;
        }

        .permission-model-name {
            font-size: .9rem;
        }

        .permission-checkbox {
            display: inline-block;
            min-height: 1.25rem;
            padding-left: 1.5rem;
        }

        .permission-switch .custom-control-label::before {
            width: 2.35rem;
            height: 1.2rem;
            border-radius: 1rem;
        }

        .permission-switch .custom-control-label::after {
            width: calc(1.2rem - 4px);
            height: calc(1.2rem - 4px);
            border-radius: 1rem;
        }

        .permission-switch .custom-control-input:checked ~ .custom-control-label::after {
            transform: translateX(1.15rem);
        }

        .permission-switch-master {
            min-height: 1.6rem;
            padding-left: 3rem;
        }

        @media (max-width: 575.98px) {
            .form-actions .btn {
                display: block;
                width: 100%;
                margin-left: 0 !important;
                margin-top: .5rem;
            }
        }
    </style>
@endpush
