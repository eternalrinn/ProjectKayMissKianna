@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h1 class="h3 mb-1">Edit Journal Entry</h1>
        <p class="text-muted mb-0">Update your existing record.</p>
    </div>

    <div class="card page-card shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('daily-journals.update', $dailyJournal) }}">
                @csrf
                @method('PUT')
                @include('daily-journals.form', ['dailyJournal' => $dailyJournal])
            </form>
        </div>
    </div>
</div>
@endsection
