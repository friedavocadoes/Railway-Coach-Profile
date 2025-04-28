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
        // Logic for admin dashboard if needed
        return view('dashboard.admin'); // Return the admin dashboard view
    }

    /**
     * Show the technician dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function technicianDashboard()
    {
        // Logic for technician dashboard if needed
        return view('dashboard.technician'); // Return the technician dashboard view
    }
}
