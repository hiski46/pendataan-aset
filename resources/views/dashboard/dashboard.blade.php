@extends('dashboard.layout')

@section('content')
    <h1>
        Hallo {{ auth()->user()->name }}
    </h1>
@endsection
