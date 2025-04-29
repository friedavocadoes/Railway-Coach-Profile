<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceLog;
use Illuminate\Http\Request;

class MaintenanceLogController extends Controller
{
    public function index()
    {
        $logs = MaintenanceLog::all();
        return view('maintenance_logs.index', compact('logs'));
    }

    public function create()
    {
        return view('maintenance_logs.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'coach_id' => 'required|exists:coaches,id',
        //     'maintenance_date' => 'required|date',
        //     'description' => 'required|string',
        //     'performed_by' => 'required|string',
        // ]);

        // MaintenanceLog::create($request->all());

        // return redirect()->route('maintenance-logs.index');

        $request->validate([
            'coach_id' => 'required|exists:coaches,id',
            'maintenance_date' => 'required|date',
            'performed_by' => 'required|string',
            'description' => 'required|string',
        ]);

        MaintenanceLog::create($request->all());

        return back()->with('success', 'Maintenance log added successfully!');

    }

    public function show(MaintenanceLog $maintenanceLog)
    {
        return view('maintenance_logs.show', compact('maintenanceLog'));
    }

    public function edit(MaintenanceLog $maintenanceLog)
    {
        return view('maintenance_logs.edit', compact('maintenanceLog'));
    }

    public function update(Request $request, MaintenanceLog $maintenanceLog)
    {
        $request->validate([
            'coach_id' => 'required|exists:coaches,id',
            'maintenance_date' => 'required|date',
            'description' => 'required|string',
            'performed_by' => 'required|string',
        ]);

        $maintenanceLog->update($request->all());

        return redirect()->route('maintenance-logs.index');
    }

    public function destroy(MaintenanceLog $maintenanceLog)
    {
        $maintenanceLog->delete();
        return redirect()->route('maintenance-logs.index');
    }
}
