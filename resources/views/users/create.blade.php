@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h1 class="h3 mb-1">Add User</h1>
        <p class="text-muted mb-0">Create a new user record.</p>
    </div>

    <div class="card page-card shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                @include('users.form', ['user' => null])
            </form>
        </div>
    </div>
</div>
@endsection
