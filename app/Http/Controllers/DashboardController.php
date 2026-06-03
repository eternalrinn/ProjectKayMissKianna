<?php

namespace App\Http\Controllers;

use App\Models\DailyJournal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $labels = [];
        $values = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $labels[] = now()->subDays($i)->format('M d');
            $values[] = DailyJournal::where('user_id', Auth::id())
                ->whereDate('journal_date', $date)
                ->count();
        }

        return view('dashboard', [
            'user' => Auth::user(),
            'userCount' => User::count(),
            'journalCount' => DailyJournal::count(),
            'myJournalCount' => DailyJournal::where('user_id', Auth::id())->count(),
            'chartLabels' => $labels,
            'chartValues' => $values,
        ]);
    }
}
