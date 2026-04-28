@extends('backend.layout.main')
@section('content')


<form method="POST" action="{{ route('roles.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Enter role name (e.g. admin)" required>

    <button type="submit">Create Role</button>
</form>



@endsection
