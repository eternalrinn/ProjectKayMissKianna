@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h1 class="h3 mb-1">Edit User</h1>
        <p class="text-muted mb-0">Update the selected user.</p>
    </div>

    <div class="card page-card shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('users.update', $user) }}">
                @csrf
                @method('PUT')
                @include('users.form', ['user' => $user])
            </form>
        </div>
    </div>
</div>
@endsection
