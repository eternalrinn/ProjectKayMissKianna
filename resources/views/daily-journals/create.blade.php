@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h1 class="h3 mb-1">Add Journal Entry</h1>
        <p class="text-muted mb-0">Write your record for the day.</p>
    </div>

    <div class="card page-card shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('daily-journals.store') }}">
                @csrf
                @include('daily-journals.form', ['dailyJournal' => null])
            </form>
        </div>
    </div>
</div>
@endsection
