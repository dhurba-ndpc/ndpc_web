@extends('backend.layout.main')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">System Permission Manager for <strong style="color:gold;">{{$getRoleId->name}}</strong> role.</h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted">Check the boxes to define which actions are available for each model in your
                        system.</p>
permission.store
                    <form action="{{ route('permission.store')}}" method="POST">
                        @csrf
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
                                                        <input type="checkbox" name="matrix[]" value="{{ $permName }}"
                                                            class="custom-control-input" id="chk-{{ $permName }}"
                                                            {{ in_array($permName, $existingPermissions) ? 'checked' : '' }}>
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

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">Synchronize Permission Database</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
