<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminSettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings', [
            'adminCount' => User::where('is_admin', true)->count(),
            'memberCount' => User::where('is_admin', false)->count(),
        ]);
    }
}
