@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-2">
        <div>
            <h1 class="h3 mb-1">Dashboard</h1>
            <p class="text-muted mb-0">Quick view of your Daily Journal app.</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-card p-4 h-100">
                <div class="text-muted small mb-2">Total Users</div>
                <div class="stat-number">{{ $userCount }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card p-4 h-100">
                <div class="text-muted small mb-2">Total Journal Records</div>
                <div class="stat-number">{{ $journalCount }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card p-4 h-100">
                <div class="text-muted small mb-2">My Journal Records</div>
                <div class="stat-number">{{ $myJournalCount }}</div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card page-card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h5 mb-3">My Entries in the Last 7 Days</h2>
                    <canvas id="journalChart" height="120"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card page-card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h5 mb-3">Quick Menu</h2>
                    <div class="d-grid gap-2">
                        <a href="{{ route('daily-journals.create') }}" class="btn btn-primary">Add Journal Entry</a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">Edit Profile</a>
                        @if ($user->isAdmin())
                            <a href="{{ route('users.create') }}" class="btn btn-outline-primary">Add User</a>
                            <a href="{{ route('admin.settings') }}" class="btn btn-outline-dark">Open Admin Settings</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const journalChart = document.getElementById('journalChart');

    if (journalChart) {
        new Chart(journalChart, {
            type: 'bar',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Entries',
                    data: @json($chartValues),
                    backgroundColor: '#3b82f6',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    }
</script>
@endsection
