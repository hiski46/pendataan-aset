@extends('dashboard.layout')
@section('content')
    <h3>Add User</h3>
    <form action="/user" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                value="{{ old('password') }}" required>
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
                placeholder="Password Confirmation" required>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
@endsection


@section('js')
    <script src="/js/showpassword.js"></script>
@stop
