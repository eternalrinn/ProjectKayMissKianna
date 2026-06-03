<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Date</label>
        <input type="date" name="journal_date" class="form-control @error('journal_date') is-invalid @enderror" value="{{ old('journal_date', optional($dailyJournal?->journal_date)->format('Y-m-d')) }}">
        @error('journal_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', optional($dailyJournal)->title) }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Entry</label>
        <textarea name="entry" rows="6" class="form-control @error('entry') is-invalid @enderror">{{ old('entry', optional($dailyJournal)->entry) }}</textarea>
        @error('entry')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">{{ $dailyJournal ? 'Update Entry' : 'Save Entry' }}</button>
        <a href="{{ route('daily-journals.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</div>
