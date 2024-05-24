@extends('dashboard.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Detail User</div>
            <div class="card-body">
                <h3 class="card-title">{{ $user->name }}</h3>
                <div class="card-text">{{ $user->email }}</div>
            </div>
        </div>
    </div>
@endsection
