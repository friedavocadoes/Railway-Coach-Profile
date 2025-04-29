<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::all();
        return view('coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('coaches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'coach_number' => 'required|unique:coaches,coach_number',
            'coach_type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Coach::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Coach created successfully!');
    }

    public function show(Coach $coach)
    {

        $maintenanceLogs = $coach->maintenanceLogs;
        return view('coaches.show', compact('coach', 'maintenanceLogs'));

    }

    public function edit(Coach $coach)
    {
        return view('coaches.edit', compact('coach'));
    }

    public function update(Request $request, Coach $coach)
    {
        $request->validate([
            'coach_number' => 'required|unique:coaches,coach_number,' . $coach->id,
            'coach_type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $coach->update($request->all());

        return redirect()->route('coaches.show', $coach->id)->with('success', 'Coach updated successfully!');

    }

    public function destroy(Coach $coach)
    {
        $coach->delete();
        return redirect()->route('coaches.index');
    }
}
