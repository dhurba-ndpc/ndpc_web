@extends('backend.layout.main')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <ul class="nav nav-pills nav-pills-custom" id="accessTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ session('active_tab') == 'role-tab' ? '' : 'active' }}" id="user-tab"
                                data-toggle="tab" href="#newUser" role="tab">
                                <i class="fas fa-user-plus mr-2"></i>New User Onboarding
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ session('active_tab') == 'role-tab' ? 'active' : '' }}" id="role-tab"
                                data-toggle="tab" href="#newRole" role="tab">
                                <i class="fas fa-shield-alt mr-2"></i>Role Architecture
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="accessTabContent">

                        <div class="tab-pane fade show {{ session('active_tab') == 'role-tab' ? '' : 'show active' }}"
                            id="newUser" role="tabpanel">
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf
                                <div class="form-section-title">
                                    <h6 class="m-0 font-weight-bold text-primary">Identity & Credentials</h6>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small font-weight-bold text-dark">Full Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-custom"
                                                placeholder="Enter user's full name" name="name">
                                        </div>
                                        @error('name', 'userCreate')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="small font-weight-bold text-dark">Email Address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control form-control-custom" name="email"
                                                placeholder="email@company.com">

                                        </div>
                                        @error('email', 'userCreate')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small font-weight-bold text-dark">System Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" class="form-control form-control-custom"
                                                placeholder="••••••••" name="password">

                                        </div>
                                        @error('password', 'userCreate')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="small font-weight-bold text-dark">Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control form-control-custom"
                                                placeholder="••••••••" name="password_confirmation">

                                        </div>
                                        @error('password', 'userCreate')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-section-title mt-4">
                                    <h6 class="m-0 font-weight-bold text-primary">Access & Permission Level</h6>
                                </div>

                                <div class="form-group">
                                    <label class="small font-weight-bold text-dark">Assign Primary Role</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class="fas fa-user-tag text-primary"></i></span>
                                        </div>
                                        <select class="form-control form-control-custom" name="role">
                                            <option selected disabled>Choose a role from the database...</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach


                                        </select>

                                    </div>
                                    @error('role', 'userCreate')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <small class="form-text text-muted">This determines the core permissions this user
                                        will inherit upon login.</small>
                                </div>

                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm font-weight-bold">
                                        <i class="fas fa-save mr-2"></i>Create and Activate User
                                    </button>
                                    <button type="reset" class="btn btn-light ml-2">Clear Form</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade {{ session('active_tab') == 'role-tab' ? 'show active' : '' }}"
                            id="newRole" role="tabpanel">
                            <form method="POST" action="{{ route('roles.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="small font-weight-bold text-dark">Role Name</label>
                                    <input type="text" class="form-control" placeholder="e.g. Senior Auditor"
                                        name="name">
                                    @error('name', 'roleBag')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-dark shadow-sm">Save New Role</button>
                            </form>
                            <br>
                            <div class="form-section-title">
                                <h6 class="m-0 font-weight-bold text-primary">Existing Roles Architecture</h6>
                            </div>

                            //role table list
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="rolesTable" width="100%"
                                    cellspacing="0">
                                    <thead class="bg-light">
                                        <tr class="text-xs font-weight-bold text-dark text-uppercase">
                                            <th>ID</th>
                                            <th>Role Designation</th>
                                            <th>Permissions</th>
                                            <th>Users Count</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="small text-dark">
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="font-weight-bold">{{ $role->name }}</td>
                                                <td>
                                                    <span class="badge badge-primary">Read</span>
                                                    <span class="badge badge-success">Write</span>
                                                    <span class="badge badge-danger">Delete</span>
                                                </td>
                                                <td>{{ $role->users_count }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('roles.edit', $role->id) }}"
                                                        class="btn btn-circle btn-sm btn-info shadow-sm mx-1"><i
                                                            class="fas fa-edit fa-xs"></i></a>
                                                    <button class="btn btn-circle btn-sm btn-danger shadow-sm mx-1"><i
                                                            class="fas fa-trash fa-xs"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            @if (session('active_tab'))
                let activeTab = "{{ session('active_tab') }}";
                $('#' + activeTab + '-nav').tab('show');
            @endif
        });
    </script>
@endpush
