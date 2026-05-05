@extends('backend.layout.main')


@section('content')
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
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">System Permission Manager for <strong
                            class="text-secondary">{{ $getRoleId->name }}</strong> role.</h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted">Check the boxes to define which actions are available for each model in your
                        system.</p>

                    <form action="{{ route('roles.update', $getRoleId->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="name" value="{{ isset($getRoleId) ? $getRoleId->name : '' }}">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%">
                                <thead class="bg-gray-100 text-dark">
                                    <tr>
                                        <th class="font-weight-bold">Module / Model</th>
                                        @foreach ($actions as $action)
                                            <th class="text-center">{{ $action }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entities as $entity)
                                        <tr>
                                            <td class="font-weight-bold text-primary">{{ $entity }}</td>
                                            @foreach ($actions as $action)
                                                
                                                @php $permName = $entity . '-' . $action; @endphp
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="permissions[]"
                                                            value="{{ $permName }}" class="custom-control-input"
                                                            id="chk-{{ $permName }}"
                                                            {{ in_array($permName, $rolePermissions) ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="chk-{{ $permName }}"></label>
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="form-actions text-right mt-3">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">Synchronize Permission to Role</span>
                            </button>
                            <a href="{{ route('roles.index')}}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
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
