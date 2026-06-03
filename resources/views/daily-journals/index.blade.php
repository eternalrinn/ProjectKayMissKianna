@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Daily Journal</h1>
            <p class="text-muted mb-0">Your journal records only.</p>
        </div>
        <a href="{{ route('daily-journals.create') }}" class="btn btn-primary">Add Record</a>
    </div>

    <div class="card page-card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Entry</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($journals as $journal)
                            <tr>
                                <td>{{ $journal->journal_date->format('M d, Y') }}</td>
                                <td>{{ $journal->title }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($journal->entry, 80) }}</td>
                                <td class="text-end">
                                    <a href="{{ route('daily-journals.edit', $journal) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('daily-journals.destroy', $journal) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this journal entry?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No journal entries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $journals->links() }}
    </div>
</div>
@endsection
