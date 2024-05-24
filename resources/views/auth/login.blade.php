@extends('auth.layout')

@section('content')
    <form method="POST" action="/login">
        @csrf
        <h1 class="md-4">Welcome</h1>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show text-start" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
                required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                required>
            <label for="floatingPassword">Password</label>
        </div>


        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
    </form>

@endsection
