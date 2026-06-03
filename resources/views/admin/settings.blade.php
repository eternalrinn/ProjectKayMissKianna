@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-2">
        <div>
            <h1 class="h3 mb-1">Admin Settings</h1>
            <p class="text-muted mb-0">Just some panels</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-card p-4 h-100">
                <div class="text-muted small mb-2">Admin Accounts</div>
                <div class="stat-number">{{ $adminCount }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card p-4 h-100">
                <div class="text-muted small mb-2">Member Accounts</div>
                <div class="stat-number">{{ $memberCount }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
