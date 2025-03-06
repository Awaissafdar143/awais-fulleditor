<?php

namespace App\Http\Controllers\package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Check if the authenticated user has the 'super' role.
        if (Auth::user()->role !== 'super') {
            abort(403, 'Unauthorized action.');
        }

        // Retrieve activity logs for the Seo model.
        // Here, we assume you used a log name of "seo" in your Seo model.
        $logs = Activity::where('log_name', 'seo')
            ->latest()
            ->paginate(10); // paginate if needed

        // Pass the logs to the view.
        return view('full-Admin-Panel.activity_logs.index', compact('logs'));
    }
}
