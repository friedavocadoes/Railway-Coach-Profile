<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MaintenanceLog;
use App\Models\Coach;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function adminDashboard()
    {
        $logs = MaintenanceLog::with('coach')->get();
        $coaches = Coach::all();

        return view('dashboard.admin', compact('logs', 'coaches'));

    }

    /**
     * Show the technician dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function technicianDashboard()
    {
        $logs = MaintenanceLog::with('coach')->get();
        $coaches = Coach::all();

        return view('dashboard.technician', compact('logs', 'coaches'));

    }
}
