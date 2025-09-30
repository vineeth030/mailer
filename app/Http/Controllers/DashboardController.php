<?php

namespace App\Http\Controllers;

use App\Models\EmailAnalytics;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Get analytics for all emails belonging to the authenticated user
        $totalSent = $user->emails()->whereNotNull('sent_at')->count();
        $totalOpened = EmailAnalytics::whereHas('email', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('opened', true)->count();

        $totalClicked = EmailAnalytics::whereHas('email', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('clicked', true)->count();

        $totalBounced = EmailAnalytics::whereHas('email', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('bounced', true)->count();

        return view('dashboard.index', compact('totalSent', 'totalOpened', 'totalClicked', 'totalBounced'));
    }
}