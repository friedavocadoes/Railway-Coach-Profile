<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function adminDashboard()
    {
        $logs = \App\Models\MaintenanceLog::with('coach')->get();
        $coaches = \App\Models\Coach::all();

        return view('dashboard.admin', compact('logs', 'coaches'));

    }

    /**
     * Show the technician dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function technicianDashboard()
    {
        $logs = \App\Models\MaintenanceLog::with('coach')->where('performed_by', auth()->user()->name)->get();
        $coaches = \App\Models\Coach::all();

        return view('dashboard.technician', compact('logs', 'coaches'));

    }
}
