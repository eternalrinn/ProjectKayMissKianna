<?php

namespace App\Http\Controllers;

use App\Models\DailyJournal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyJournalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('daily-journals.index', [
            'journals' => DailyJournal::where('user_id', Auth::id())
                ->latest('journal_date')
                ->latest('created_at')
                ->paginate(10),
        ]);
    }

    public function create()
    {
        return view('daily-journals.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'journal_date' => ['required', 'date'],
            'entry' => ['required', 'string'],
        ]);

        DailyJournal::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'journal_date' => $data['journal_date'],
            'entry' => $data['entry'],
        ]);

        return redirect()->route('daily-journals.index')->with('success', 'Journal entry added successfully.');
    }

    public function edit(DailyJournal $dailyJournal)
    {
        abort_if($dailyJournal->user_id !== Auth::id(), 403);

        return view('daily-journals.edit', compact('dailyJournal'));
    }

    public function update(Request $request, DailyJournal $dailyJournal)
    {
        abort_if($dailyJournal->user_id !== Auth::id(), 403);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'journal_date' => ['required', 'date'],
            'entry' => ['required', 'string'],
        ]);

        $dailyJournal->update($data);

        return redirect()->route('daily-journals.index')->with('success', 'Journal entry updated successfully.');
    }

    public function destroy(DailyJournal $dailyJournal)
    {
        abort_if($dailyJournal->user_id !== Auth::id(), 403);

        $dailyJournal->delete();

        return redirect()->route('daily-journals.index')->with('success', 'Journal entry deleted successfully.');
    }
}
