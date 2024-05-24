@extends('dashboard.layout')
@section('content')
    <h3>Edit User</h3>
    <form action="/user/{{ $user->id }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                value="{{ $user->email }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Change Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="New Password"
                autocomplete="false">
            <div class="form-check">
                <input class="form-check-input" onchange="showPass()" type="checkbox" id="toggle-password">
                <label class="form-check-label" for="toggle-password">
                    Show Password
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                placeholder="Password Confirmation">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
@endsection


@section('js')
    <script src="/js/showpassword.js"></script>
@stop
